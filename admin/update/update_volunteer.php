<?php
  session_start();
//Database Configuration File
include '../config.php' ;
$id=$_POST['id'];
$approve=$_POST['approve'];

 $stmt = $dbh->prepare("UPDATE volunteer SET approve=:approve WHERE volunteer.id='$id'");
	$stmt->bindParam(':approve', $approve);	
    $stmt->execute();

header('Location: ../volunteer.php');
die;
?>