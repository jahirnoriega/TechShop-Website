<?php
require "config/database.php";
$id=$_POST["id"];
$nom=$_POST["nom"];
$des=$_POST["des"];
$pre=$_POST["pre"];
$img=$_POST["img"];
$cate=$_POST["cate"];
$records=$conn->prepare("UPDATE productos
                        SET nombre='".$nom."', descripcion='".$des."', precio='".$pre."', imagen='".$img."', categoria='".$cate."'
                        WHERE id='".$id."'");
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);
header("Location:editar.php");
?>