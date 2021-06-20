<?php
require_once "Product.php";
require_once "connection.php";


$queryString=$connection->prepare("select * from products WHERE status=0");
$queryString->execute();
$products=$queryString->fetchAll(PDO::FETCH_CLASS,'Product');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        h3{
            text-align: center;
            margin-top:10px;
            color: red;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <h3>Product Management System</h3>
        <a href="index.php"> Back to Home </a>
        <table class="table table-success table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Brand</th>
                <th scope="col">Expire Date</th>
                <th scope="col">Status</th>
                <th scope="col">manage</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product):?>
                <tr>
                    <th scope="row"><?= $product->Id?></th>
                    <td><?= $product->pro_name?></td>
                    <td><?= $product->prod_brand?></td>
                    <td><?= $product->prod_expiry_date?></td>
                    <td><?= $prod_availability=($product->prod_availability==1)?"Available":"Not Available";
                        "Status: ".$prod_availability?></td>
                    <td><a href="restoreDeletedProducts.php?id=<?= $product->Id?>"><i class="material-icons" style="color: darkred;">settings_backup_restore</i></a>|<a onclick="return confirm('Are you sure that you want to remove that product?')" href="delete.php?id=<?= $product->Id?>"><i class="material-icons" style="color: darkred;">disabled_by_default</i></a> </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>