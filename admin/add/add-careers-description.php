<?php include "../config.php";
error_reporting(0);
if(isset($_REQUEST)){ 



$department_id=$_POST['department_id']; 
$career_listing=$_POST['career_listing']; 
$responsibilities=$_POST['responsibilities']; 
$requirements=$_POST['requirements']; 
$skills_experience=$_POST['skills_experience']; 

$date=date('F j, Y');
$status='1';
$edit=$_POST["edit"];
if($edit){


$stmt = $dbh->prepare("UPDATE `carrer_description` SET `career_departmet_id`=:department_id,`responsibilities`=:responsibilities,`requirements`=:requirements,`skills_and_experience`=:skills_experience,`date`=:date,`status`=:status WHERE `career_listing_id`=:career_listing");
 $stmt->bindParam(':department_id', $department_id);
 $stmt->bindParam(':responsibilities', $responsibilities);
$stmt->bindParam(':requirements', $requirements);
 $stmt->bindParam(':skills_experience', $skills_experience);
 $stmt->bindParam(':date', $date);
 $stmt->bindParam(':status', $status);
 $stmt->bindParam(':career_listing', $career_listing);
 $stmt->execute();
 //$stmt->debugDumpParams();
 echo $stmt->rowCount(); 
}
else{
	$stmt = $dbh->prepare("INSERT INTO `carrer_description`(`career_departmet_id`, `career_listing_id`, `responsibilities`, `requirements`, `skills_and_experience`, `date`, `status`) VALUES(:department_id,:career_listing,:responsibilities,:requirements,:skills_experience,:date,:status)");
	


 $stmt->bindParam(':department_id', $department_id);
 $stmt->bindParam(':career_listing', $career_listing);
 $stmt->bindParam(':responsibilities', $responsibilities);
$stmt->bindParam(':requirements', $requirements);
 $stmt->bindParam(':skills_experience', $skills_experience);
 $stmt->bindParam(':date', $date);
 $stmt->bindParam(':status', $status);
 $stmt->execute();
// $stmt->debugDumpParams();
 $id=$dbh->lastInsertId();
 }
 
}?>