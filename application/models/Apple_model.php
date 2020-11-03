<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Apple_model extends CI_Model
{
  
  function __construct()
  {
    parent::__construct();
  }
  
  function encode($data) {
    $encoded = strtr(base64_encode($data), '+/', '-_');
    return rtrim($encoded, '=');
  }
  
  function generateJWT($kid, $iss, $sub) {
    $header = [
      'alg' => 'ES256',
      'kid' => $kid
    ];
  
    date_default_timezone_set("UTC");
    $body = [
      'iss' => $iss,
      'iat' => time(),
      'exp' => time() + 86400,
      'aud' => 'https://appleid.apple.com',
      'sub' => $sub
    ];
    
    $privKey = openssl_pkey_get_private(
      file_get_contents('/web/public_html/template/apple/AuthKey_RBR42WP3D5.pem')
    );
    
    if (!$privKey){
      return false;
    }
    
    $payload = $this->encode(json_encode($header)).'.'.$this->encode(json_encode($body));
    
    $signature = '';
    $success = openssl_sign($payload, $signature, $privKey, OPENSSL_ALGO_SHA256);
    if (!$success) {
      return false;
    }
    
    $raw_signature = $this->fromDER($signature, 64);
    
    return $payload.'.'.$this->encode($raw_signature);
  }
  
  /**
   * @param string $der
   * @param int    $partLength
   *
   * @return string
   */
  function fromDER(string $der, int $partLength)
  {
    $hex = unpack('H*', $der)[1];
    if ('30' !== mb_substr($hex, 0, 2, '8bit')) { // SEQUENCE
      throw new \RuntimeException();
    }
    if ('81' === mb_substr($hex, 2, 2, '8bit')) { // LENGTH > 128
      $hex = mb_substr($hex, 6, null, '8bit');
    } else {
      $hex = mb_substr($hex, 4, null, '8bit');
    }
    if ('02' !== mb_substr($hex, 0, 2, '8bit')) { // INTEGER
      throw new \RuntimeException();
    }
    $Rl = hexdec(mb_substr($hex, 2, 2, '8bit'));
    $R = $this->retrievePositiveInteger(mb_substr($hex, 4, $Rl * 2, '8bit'));
    $R = str_pad($R, $partLength, '0', STR_PAD_LEFT);
    $hex = mb_substr($hex, 4 + $Rl * 2, null, '8bit');
    if ('02' !== mb_substr($hex, 0, 2, '8bit')) { // INTEGER
      throw new \RuntimeException();
    }
    $Sl = hexdec(mb_substr($hex, 2, 2, '8bit'));
    $S = $this->retrievePositiveInteger(mb_substr($hex, 4, $Sl * 2, '8bit'));
    $S = str_pad($S, $partLength, '0', STR_PAD_LEFT);
    return pack('H*', $R.$S);
  }
  /**
   * @param string $data
   *
   * @return string
   */
  function preparePositiveInteger(string $data)
  {
    if (mb_substr($data, 0, 2, '8bit') > '7f') {
      return '00'.$data;
    }
    while ('00' === mb_substr($data, 0, 2, '8bit') && mb_substr($data, 2, 2, '8bit') <= '7f') {
      $data = mb_substr($data, 2, null, '8bit');
    }
    return $data;
  }
  /**
   * @param string $data
   *
   * @return string
   */
  function retrievePositiveInteger(string $data)
  {
    while ('00' === mb_substr($data, 0, 2, '8bit') && mb_substr($data, 2, 2, '8bit') > '7f') {
      $data = mb_substr($data, 2, null, '8bit');
    }
    return $data;
  }
  
  function refreshToken($email, $refresh_token)
  {
    $client_id = (DEV_SERVER ? 'me.foundy.dev.services' : 'me.foundy.services');
    $kid = 'RBR42WP3D5'; // apple private key
    $iss = 'SS5VZWK6ND'; // apple App ID(Team ID)
    $sub = $client_id;
    $jwt_client_secret = $this->generateJWT($kid, $iss, $sub);
  
    // refresh token
    $data = [
      'client_id' => $client_id,
      'client_secret' => $jwt_client_secret,
      'refresh_token' => $refresh_token,
      'grant_type' => 'refresh_token'
      //,'redirect_uri' => 'https://example-app.com/redirect'
    ];
  
    log_message('debug', '[apple_login] (refresh token of '.$email.') request : '.json_encode($data));
  
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://appleid.apple.com/auth/token');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
  
    log_message('debug', '[apple_login] (refresh token of '.$email.') response : '.$response);
  
    $response = json_decode($response);
    $access_token = $response->access_token;
    $token_type = $response->token_type;
    $expires_in = $response->expires_in;
//        $refresh_token = $response->refresh_token;
    $id_token = $response->id_token;
  
    log_message('debug', '[apple_login] (refresh token of '.$email.') access_token : '.$access_token.', token_type : '.$token_type.
      ', expires_in : '.$expires_in.', id_token : '.$id_token);
  }
}
