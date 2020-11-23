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

// 주제(Topic)로 푸시 발송하는 방법

// 모든 사용자에게 보내기
// sendNotification("알림", "새로운 상품이 등록되었습니다.", ["url" => $url], "/topics/Notice", $server_key);

// iOS 사용자에게만 보내기
// sendNotification("알림", "iOS앱 새로 받으세요", ["url" => $url], "/topics/iOS", $server_key);

// Android 사용자에게만 보내기
// sendNotification("알림", "iOS앱 새로 받으세요", ["url" => $url], "/topics/Android", $server_key);

// 개별푸시
// sendNotification("알림", "1:1문의에 답변이 달렸습니다.", ["url" => $url], "사용자FCM-TOKEN", $server_key);

// 실제 토픽으로 푸시 발송하는 부분
//sendNotification("알림", "1:1문의가 등록되었습니다.", ["url" => $url], "/topics/iOS");
//sendNotification("알림", "1:1문의가 등록되었습니다.", ["url" => $url], "/topics/Android");

?>