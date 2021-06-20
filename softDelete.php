<?php
require_once "connection.php";
    $queryString=$connection->prepare("UPDATE products SET status=? WHERE id=?");
    $id=$_GET["id"];
    $status=0;
    $queryString->execute([$status,$id]);
    header("Location: index.php");
