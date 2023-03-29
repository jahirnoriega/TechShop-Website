<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "php_login_database";

try{
    $conn = new PDO("mysql:host=$server; dbname=$database;", $username, $password);
}catch(PDOException $error)  {
    die("Conexion fallida: ".$error->getMessege());
}

$conn = new PDO("mysql:host=$server; dbname=$database; charset=utf8",$username, $password);
$conn->exec("SET NAMES utf8");

?>