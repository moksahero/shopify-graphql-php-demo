<?php
require_once('./config.php');

$query = '{ shop { name } }';

$options = [
  'http' => [
    'method' => 'POST',
    'header' => [
      'Content-Type: application/graphql',
      'X-Shopify-Access-Token: ' . '787034afe88f89aed6f6779020ee647e'
    ],
    'content' => $query
  ]
];

$context = stream_context_create($options);
$contents = file_get_contents($store_host . '/admin/api/graphql.json', false, $context);
print_r(json_decode($contents));
