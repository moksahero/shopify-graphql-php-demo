<?php
$store_host = 'https://devmetokyo.myshopify.com';
$oauth_url = $store_host . '/admin/oauth';

$api_key = '7fd18b3b5e0562ac1d04e9716a2953f2';
$secret_key = '5a7cb865ca71d2528c56ef6a13b14411';

$redirect_url = 'http://shopifydemo/callback.php';
$scopes = 'write_products,write_orders,read_customers,read_products';

$redirect_url = $oauth_url . '/authorize?client_id=' . $api_key . '&scope=' . $scopes
. '&redirect_uri=' . $redirect_url . '&nonce=' . uniqid();

header('Location: '. $redirect_url);
die();

 ?>
