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

$response = $client->post('https://dummyjson.com/products/add', $products);
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
    <title>Add Product</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class = "container-fluid"> 
        <h1>Add Product</h1>
        <table class ="table table-bordered border-dark">
            <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Category</th>
                        <th scope="col">Gallery</th>
                    </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" href="single-product.php"><?= $product->id ?></th>
                    <td><?=$product->title?></td>
                    <td><?=$product->description?></td>
                    <td><?=$product->price?></td>
                    <td><?=$product->brand?></td>
                    <td><?=$product->category?></td>
                    <td><img src="<?=$product->thumbnail?>" width="100" length="100"></td>
                </tr>
            </tbody>
        </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>