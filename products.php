<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$response = $client->get("products");
$code = $response->getStatusCode();
$body = $response->getBody();
$x = json_decode($body);

$products = $x->products;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
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
            <?php
            foreach ($products as $info):
            ?>
            <tr>
                <td><?=$info->id;?></td>
                <td><?=$info->title;?></td>
                <td><?=$info->description;?></td>
                <td><?=$info->price;?></td>
                <td><?=$info->brand;?></td>
                <td><?=$info->category;?></td>
                <td><?="<img width=110px; height=90px; src=" . $info->thumbnail .">";?></td>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>