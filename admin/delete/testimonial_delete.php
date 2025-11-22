<?php
  session_start();

include "../auth.php" ; 
include "../config.php" ; 

 $id=@$_GET['test_id'];



$sql = "DELETE FROM `testimonial` WHERE  id =:id";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id',$id, PDO::PARAM_INT);   
$stmt->execute();
$count=$stmt->Rowcount();
if($count){
	header("location:../testimonial.php");
}


?>