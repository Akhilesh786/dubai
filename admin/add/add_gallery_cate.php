<?php
  session_start();
//Database Configuration File
include '../config.php' ;
$name=$_POST['name'];


$stmt = $dbh->prepare("INSERT INTO category (name)  
  VALUES (:name)");
  
 $stmt->bindParam(':name', $name);
 
 $stmt->execute();

header('Location: ../category.php');
die;
?>