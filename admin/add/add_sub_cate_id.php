<?php
  session_start();
//Database Configuration File
include '../config.php' ;
$cate_id=$_POST['cate_id'];
$sub_id=$_POST['sub_id'];

 
    
$stmt1 = $dbh->prepare("INSERT INTO sub_cate (cate_id, sub_id)  
  VALUES (:cate_id, :sub_id)");
  
 $stmt1->bindParam(':cate_id', $cate_id);
 $stmt1->bindParam(':sub_id', $sub_id);
 
 $stmt1->execute();


header('Location: ../category.php');
die;
?>