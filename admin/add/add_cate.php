<?php
  session_start();
//Database Configuration File
include '../config.php' ;
$name=$_POST['name'];


$stmt = $dbh->prepare("INSERT INTO work_cate (name)  
  VALUES (:name)");
  
 $stmt->bindParam(':name', $name);
 
 $stmt->execute();
$count=$stmt->Rowcount();
echo $count;

?>