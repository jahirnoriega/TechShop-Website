<?php
require "config/database.php";
$id=$_GET["id"];
$records=$conn->prepare("DELETE FROM productos WHERE id= $id");
$records->execute();
$results = $records->fetchAll(PDO::FETCH_ASSOC);
header("Location:editar.php");
?>