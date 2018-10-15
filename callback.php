<?php
$api_key = '7fd18b3b5e0562ac1d04e9716a2953f2';
$secret_key = '5a7cb865ca71d2528c56ef6a13b14411';

$store_host = 'https://devmetokyo.myshopify.com';
$oauth_url = $store_host . '/admin/oauth';

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
