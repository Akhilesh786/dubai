<?php
  session_start();
//Database Configuration File
include '../config.php' ;
$name=$_POST['info_name'];
$title=$_POST['info_title'];

 $stmt = $dbh->prepare("UPDATE info SET name=:name, title=:title WHERE info.id='1'");
	$stmt->bindParam(':name', $name);	
	$stmt->bindParam(':title', $title);	
    $stmt->execute();

header('Location: ../info.php');
die;
?>