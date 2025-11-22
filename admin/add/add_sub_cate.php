<?php
  session_start();
//Database Configuration File
include '../config.php' ;
$name=$_POST['name'];


$stmt = $dbh->prepare("INSERT INTO sub_category (name)  
  VALUES (:name)");
  
 $stmt->bindParam(':name', $name);
 
 $stmt->execute();
 $last_id = $dbh->lastInsertId();
 
/* if (isset($last_id)) {
 
    
$stmt1 = $dbh->prepare("INSERT INTO sub_cate (cate_id, sub_id)  
  VALUES (:cate_id, :sub_id)");
  
 $stmt1->bindParam(':cate_id', $cate_id);
 $stmt1->bindParam(':sub_id', $last_id);
 
 $stmt1->execute();
 
 
 }
*/

header('Location: ../category.php');
die;
?>