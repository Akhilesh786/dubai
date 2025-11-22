<?php include "../config.php";
error_reporting(0);
if(isset($_REQUEST)){ 

$edit=$_POST['edit'];
$name=$_POST['name']; 

$designation=$_POST['designation']; 
$photo=$_POST['photo'];
$date=date("Y-m-d");
$status='1';

if($edit){
	
	$stmt=$dbh->prepare("UPDATE `team` SET `name` = :name, `designation` = :designation, `profile` = :profile, `status` =:status,`time` =:time WHERE `id` =:id");
}else{

$stmt = $dbh->prepare("INSERT INTO  `team`(`name`, `designation`, `profile`, `status`, `time`)
  VALUES (:name, :designation, :profile, :status, :time)");
}
 $stmt->bindParam(':name', $name);
 $stmt->bindParam(':designation', $designation);
 $stmt->bindParam(':profile', $photo);
 $stmt->bindParam(':status', $status);
 $stmt->bindParam(':time', $date);
 if($edit){
 $stmt->bindParam(':id',$edit);
 }
 $stmt->execute();
 echo $count=$stmt->Rowcount();
}?>