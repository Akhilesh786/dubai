<?php
  session_start();
//Database Configuration File
include '../config.php' ;
$userid=$_POST['userid'];
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

 $stmt = $dbh->prepare("UPDATE user SET f_name=:name, password=:password, email=:email WHERE user.user_id='$userid'");
	$stmt->bindParam(':name', $name);	
	$stmt->bindParam(':password', $password);	
	$stmt->bindParam(':email', $email);	
    $stmt->execute();

echo "Update";

?>