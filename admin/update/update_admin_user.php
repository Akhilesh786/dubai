<?php
  session_start();
//Database Configuration File
include '../config.php' ;
$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

 $stmt = $dbh->prepare("UPDATE admin SET name=:name, password=:password, email=:email WHERE admin.id='$id'");
	$stmt->bindParam(':name', $name);	
	$stmt->bindParam(':password', $password);	
	$stmt->bindParam(':email', $email);	
    $stmt->execute();

header('Location: ../add-user.php');
die;

?>