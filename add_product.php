<?php
require_once('./config.php');

$mutation = '
mutation {
  productCreate(input:{
    descriptionHtml: "Infinity Display. The phone with an uninterrupted display. See photos and videos as you want to see them: showcased on a beautiful edge-to-edge screen.",
    title: "Samsung Galaxy S9 Plus (Lilac Purple, 64 GB) (6 GB RAM)",
    images: [{
      src: "https://images-na.ssl-images-amazon.com/images/I/719PHq579pL._SL1500_.jpg",
    },
    {
      src: "https://images-na.ssl-images-amazon.com/images/I/61gZIYJ9xlL._SY606_.jpg"
    }

    ],
    variants: {
       barcode: "ASIO45789R",
       inventoryQuantity: 10,
       price:"12"
    }
  }){
    product {
      descriptionHtml
      title
      images(first: 15){
        edges{
          node{
            originalSrc
          }
        }
      }
    }
  }
}
';

echo $mutation;

$options = [
  'http' => [
    'method' => 'POST',
    'header' => [
      'Content-Type: application/graphql',
      'X-Shopify-Access-Token: ' . '1fe161eb444b34d9230c864c01ce3f73'
    ],
    'content' => $mutation
  ]
];

$context = stream_context_create($options);
$contents = file_get_contents($store_host . '/admin/api/graphql.json', false, $context);

echo 'got here';

echo '<pre>';

print_r(json_decode($contents));
