<?php 
include "../config.php";

$id=$_GET['id'];

$sql = "UPDATE `team` SET `status`='0' WHERE  id =:id";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id',$id, PDO::PARAM_INT);   
$stmt->execute();
$count=$stmt->Rowcount();
if($count){
	header("location:../team.php");
}


?>