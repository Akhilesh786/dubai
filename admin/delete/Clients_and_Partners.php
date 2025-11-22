<?php
  session_start();

include "../auth.php" ; 
include "../config.php" ; 

 $id=$_POST['id'];



$sql = "DELETE FROM `Clients_and_Partners` WHERE  id =:id";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id',$id, PDO::PARAM_INT);   
$stmt->execute();

header('location:../Clients_and_Partners.php');



?>