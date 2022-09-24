<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$response = $client->get('https://dummyjson.com/products/category/skincare');
$code = $response->getStatusCode();
$body = $response->getBody();
$product_category= json_decode($body, true);
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
        <table class="table table-bordered">
            <thead class="table-dark">
               <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>  
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Thumbnail</th>
                </tr>
            </thead>

            <tbody>
            <?php
            foreach ($product_category['products'] as $product){
            ?>
                <tr>
                    <th scope="row" href="single-product.php"><?= $product['id']; ?></th>
                    <td><?= $product['title']; ?></td>
                    <td><?= $product['description']; ?></td>
                    <td><?= $product['price']; ?></td>
                    <td><?= $product['brand']; ?></td>
                    <td><?= $product['category']; ?></td>
                    <td><img src="<?= $product['thumbnail']; ?>" class="img-responsive" height="200px"></td>
                <tr>
            <?php
            }
            ?>
        </tbody>
      </table>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>