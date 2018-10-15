<?php
require_once('./config.php');

$scopes = 'write_products,write_orders,read_customers,read_products';

$redirect_url = $oauth_url . '/authorize?client_id=' . $api_key . '&scope=' . $scopes
. '&redirect_uri=' . $callback_url . '&nonce=' . uniqid();

header('Location: '. $redirect_url);
die();

 ?>
