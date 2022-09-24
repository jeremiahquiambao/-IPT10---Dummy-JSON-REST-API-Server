<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$products = [
    'json' => ['id' => '4',
    'title' => 'Nitro 5',
    'description' => 'Get the storage you need to install all the best games and applications in your laptop. Enjoy bigger storage space that handle all the best games and laptop applications.',
    'price' => '1272',
    'brand' => 'Acer',
    'category' => 'Laptop',
    'thumbnail' => 'https://d1rlzxa98cyc61.cloudfront.net/catalog/product/cache/1801c418208f9607a371e61f8d9184d9/1/8/182730_2022.jpg'
      ]
];

$response = $client->delete('https://dummyjson.com/products/1');
$code = $response->getStatusCode();
$body = $response->getBody();
$product = json_decode($body);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class = "container-fluid"> 
        <table class ="table table-bordered border-dark">
            <thead class ="table-dark"> 

                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Gallery</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <th href="single-product.php"><?= $product->id ?></th>
                    <td><?= $product->title?></td>
                    <td><?= $product->description?></td>
                    <td><?= $product->price?></td>
                    <td><?= $product->brand?></td>
                    <td><?= $product->category?></td>
                    <td><?="<img width=110px; height=90x; src=" . $product->thumbnail .">";?></td>
                </tr>
            </tbody>
        </table>
</body>
</html>