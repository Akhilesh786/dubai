<?php
  session_start();

include "../auth.php" ; 
include "../config.php" ; 

 $id=$_POST['id'];



$sql = "DELETE FROM `work_home_view` WHERE  id =:id";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id',$id, PDO::PARAM_INT);   
$stmt->execute();
echo $count=$stmt->Rowcount();



?>