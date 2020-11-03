<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Push Server Key
//$url = "이동하고 싶은 URL";

//
// 푸시 발송 함수
//
function send_notification($title = "", $body = "", $customData = [], $to = "")
{
  $serverKey = "AAAA-3diAGk:APA91bGsuAdA1blA_2T0UwsBgBJPipL9JhKZVSF4cc9Q8QbKhIsNlszFqrF87miYFz0vRjiyiUcV7mnlpRwvTtl0DBJVixBqWnBJYYsXL5uf6tXwpT8LX0MhaeNrApHxZQNrkN5KtUn2";
  if($serverKey != ""){
    ini_set("allow_url_fopen", "On");
    $data =
      [
        "to" => $to,
        "notification" => [
          "body" => $body,
          "title" => $title,
        ],
        "data" => $customData
      ];
    
    $options = array(
      'http' => array(
        'method'  => 'POST',
        'content' => json_encode( $data ),
        'header'=>  "Content-Type: application/json\r\n" .
          "Accept: application/json\r\n" .
          "Authorization:key=".$serverKey
      )
    );
    
    $context  = stream_context_create( $options );
    $result = file_get_contents( "https://fcm.googleapis.com/fcm/send", false, $context );
    
    log_message('debug', '[push notification] req { title: '.$title.', body: '.$body.', customData: '.json_encode($customData).
      ', to: '.$to.'}, res: '.json_encode($result));
    return json_decode( $result );
  }
  return false;
}

//{
//  "multicast_id":3551738234649980707,
//  "success":1,
//  "failure":0,
//  "canonical_ids":0,
//  "results":[
//    {
//      "message_id":"1603799578504231"
//    }
//    ]
//}
//
// 실제 토픽으로 푸시 발송하는 부분
//
//sendNotification("알림", "1:1문의가 등록되었습니다.", ["url" => $url], "/topics/iOS");
//sendNotification("알림", "1:1문의가 등록되었습니다.", ["url" => $url], "/topics/Android");

// 개별기기에 발송
//sendNotification("알림", "1:1문의가 등록되었습니다.", ["url" => $url],
//  "cnIS_vGN3E-GhIvILZ5mM_:APA91bF-UZstyy4iLZ5_38OdN5r1qhLRK-v3W1Re1Bk8DRrf2JQ-McZwIxT1yYDbU0qIIJGk-W-fNlyOtiYFD2sXM9lHtWzW_PQV2BWi5jqwqPn0Mz8Ozlwqm6QM3REZLiyQSKgXZ-C5");

// test
//          send_notification("새상품이 등록되었습니다", "요가복 2탄이 나왔어요~",
//            ["url" => base_url().'home/shop/product?id=70'], "");
//          send_notification("새상품이 등록되었습니다", "요가복 2탄이 나왔어요~",
//            ["url" => base_url().'home/shop/product?id=70'],
//            "dJnpjJox20iqr7V3_7c0lW:APA91bFcvvSPtXvAQATrRtqG-czJoElhOSC3dWVwYiHdy2Hd-vMTqydS88uEoWHPnSpluIKZkQRxbdNh_L3CFBW1DzQM1xvLmmhfuJw857oBQIaNirqDX4gG9qeaPEB3f9fPdSY5jFFA");
?>