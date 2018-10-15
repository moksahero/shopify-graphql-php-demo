<?php
require_once('./config.php');

$context = stream_context_create(
  array(
    'http' => array(
      'method'=> 'POST',
      'header'=> 'Content-type: application/json',
      'content' => json_encode(
        array(
          'client_id' => $api_key,
          'client_secret' => $secret_key,
          'code' => $_REQUEST['code']
        )
      )
    )
  )
);

$result_json = file_get_contents($oauth_url . '/access_token', false, $context);

$result = json_decode($result_json);

print_r($result);
?>
