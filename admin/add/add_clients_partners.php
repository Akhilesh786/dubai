<?php
  session_start();
//Database Configuration File
include '../config.php' ;

$type=$_POST["type"];
$name=$_POST["name"];

if($type==1){
	$thumb=$_POST["thumbnail_Clients"];
}else{
	$thumb=$_POST["thumbnail_Partners"];
}




$stmt = $dbh->prepare("INSERT INTO `Clients_and_Partners`(`type`, `thumbnail`,`name`) VALUES (:type,:thumbnail,:name)");
  
 $stmt->bindParam(':type', $type);
 $stmt->bindParam(':thumbnail', $thumb);
 $stmt->bindParam(':name', $name);


 
 $stmt->execute();
$count=$stmt->rowCount();
if($count==1){
 echo "success";
}

?>