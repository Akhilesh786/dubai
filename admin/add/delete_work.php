<?php 
include "../config.php";

$id=$_GET['id'];

$sql = "DELETE FROM `work` WHERE  id =:id";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id',$id, PDO::PARAM_INT);   
$stmt->execute();
$count=$stmt->Rowcount();
if($count){
	header("location:../work_listing.php");
}


?>