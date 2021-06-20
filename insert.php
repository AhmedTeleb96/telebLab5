<?php
require_once "connection.php";

if(isset($_POST["insert"])&& !empty($_POST)){

    $queryString=$connection->prepare("INSERT INTO products (pro_name,prod_brand,prod_expiry_date,prod_availability,status)VALUES(?,?,?,?,?)");
    $productName=$_POST["productName"];
    $productBrand=$_POST["productBrand"];
    $productExpirationDate=$_POST["productExpirationDate"];
    $productAvailability=$_POST["productAvailability"];
    $status=1;

    if($queryString->execute([$productName,$productBrand,$productExpirationDate,$productAvailability,$status])){
                header("Location: index.php");
            }else{
                echo"failed to insert";
                header("Refresh: 2;URL=index.php");
            }
}else{
    echo"Error: You cann't access this page";
    header("Refresh: 3;URL=index.php");
}