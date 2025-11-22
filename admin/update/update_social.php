<?php
  session_start();
//Database Configuration File
include '../config.php' ;
$facebook=$_POST['facebook'];
$instagram=$_POST['instagram'];
$youtube=$_POST['youtube'];
$twitter=$_POST['twitter'];

 $stmt = $dbh->prepare("UPDATE social SET facebook=:facebook, instagram=:instagram, youtube=:youtube, twitter=:twitter WHERE social.id='1'");
	$stmt->bindParam(':facebook', $facebook);	
	$stmt->bindParam(':instagram', $instagram);	
	$stmt->bindParam(':youtube', $youtube);	
	$stmt->bindParam(':twitter', $twitter);	
    $stmt->execute();

header('Location: ../social.php');
die;
?>