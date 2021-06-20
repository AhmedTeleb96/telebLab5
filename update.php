<?php
require_once "connection.php";
if(isset($_POST["update"])&& !empty($_POST)){
$queryString=$connection->prepare("UPDATE products SET pro_name=?,prod_brand=?,prod_expiry_date =?,prod_availability=? WHERE id=?");
$pro_name=$_POST["pro_name"];
$prod_brand=$_POST["prod_brand"];
$prod_expiry_date=$_POST["prod_expiry_date"];
$prod_availability=$_POST["prod_availability"];
$id=$_POST["id"];
    $queryString->execute([$pro_name,$prod_brand,$prod_expiry_date,$prod_availability,$id]);
    header("Location: index.php");
}else{
    echo "error in form";
}


