<?php include "../config.php";
error_reporting(0);
if(isset($_REQUEST)){ 

$work_id=$_POST['work'];
$image=$_POST['work-poster'];


if($work_id){

$stmt = $dbh->prepare("INSERT INTO `work_home_view`(`work_id`, `image`)VALUES (:work_id,:image)");
  
 $stmt->bindParam(':work_id', $work_id);
 $stmt->bindParam(':image', $image);
 $stmt->execute();
 //$stmt->debugDumpParams();
 $work_id = $dbh->lastInsertId();
 
 

echo $work_id;
}

 }
 
 

 

 
 ?>