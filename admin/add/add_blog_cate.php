<?php
  session_start();
//Database Configuration File
include '../config.php' ;
$name=$_POST['name'];
$string= str_replace('','-',$name);
$blog_cate_slug=  preg_replace('/[^A-Za-z0-9\-]/', '', $string);

$stmt = $dbh->prepare("INSERT INTO blog_cate (blog_cate_name,blog_cate_slug)  
  VALUES (:name,:blog_cate_slug)");
  
 $stmt->bindParam(':name', $name);
 $stmt->bindParam(':blog_cate_slug', $blog_cate_slug);
 $stmt->execute();

header('Location: ../blog.php');
die;
?>