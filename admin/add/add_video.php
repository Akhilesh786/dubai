<?php
  session_start();
//Database Configuration File
include '../config.php' ;
$video=$_POST['video'];


$stmt = $dbh->prepare("INSERT INTO video (path)  
  VALUES (:path)");
  
 $stmt->bindParam(':path', $video);
 
 $stmt->execute();

header('Location: ../video.php');
die;
?>