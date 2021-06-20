<?php
try {
    $connection=new PDO('mysql:host=sql11.freemysqlhosting.net;dbname=sql11420188;','sql11420188','Q8GH7rDKSE');

}catch (PDOException $exception){
    echo $exception->getMessage();
}
