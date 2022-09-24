<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
  'base_uri' => 'https://dummyjson.com/'
]);
$id = $_GET["user_id"];
$response = $client->get('users/' . $id);
$code = $response->getStatusCode();
$body = $response->getBody();
$user = json_decode($body);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single User</title>
    <!-- Bootstrap CSS  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class = "container-fluid"> 
        <h1>Single User</h1>
        <table class ="table table-bordered">
            <thead class ="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Complete Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Blood Type</th>
                    <th>Image</th>
                </tr>
            </thead>

          <tbody class = "table table-success">
                <tr>
                    <th href="single-user.php"><?= $user->id ?></th>
                    <td><?=$user->firstName . ' '.  $user->lastName;?></td>
                    <td><?=$user->age;?></td>
                    <td><?=$user->gender;?></td>
                    <td><?=$user->email;?></td>
                    <td><?=$user->phone;?></td>
                    <td><?=$user->bloodGroup;?></td>
                    <td><?="<img width=100; height=100; src=" . $user->image .">";?></td>
                </tr>
           </tbody>
        </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>