<?php

 include "../config.php";
 
 
 //print_r($_POST);
$id=$_POST["id"];
$type=$_POST["type"];
$name=$_POST["name"];


if($type==1){
	$thumb=$_POST["thumbnail_Clients"];
}else{
	$thumb=$_POST["thumbnail_Partners"];
}

$stmt = $dbh->prepare("UPDATE `Clients_and_Partners` SET `type`=:type,`thumbnail`=:thumb,`name`=:name WHERE `id`=:id ");
    
	$stmt->bindParam(':type', $type);	
	$stmt->bindParam(':name', $name);	
	$stmt->bindParam(':thumb', $thumb);	
	$stmt->bindParam(':id', $id);	
	
    $stmt->execute();    
	echo $stmt->rowCount();
	

	
	?>