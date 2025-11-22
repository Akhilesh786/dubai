<?php include "../config.php";
error_reporting(0);
if(isset($_REQUEST)){ 



$department=$_POST['department']; 
$department_id=$_POST['department_id']; 
$profile=$_POST['profile'];
$job_description=$_POST['job_description'];
$date=date('F j, Y');
$status='1';

$career_id=$_POST['profile_id']; 

if($career_id){
	
	$stmt = $dbh->prepare("UPDATE `careers_listing` SET `department_id`=:department_id,`department`=:department,`profile`=:profile,`job_description`=:job_description,`date`=:date,`status`=:status WHERE `career_id`=:career_id");

 $stmt->bindParam(':department_id', $department_id);
 $stmt->bindParam(':department', $department);
 $stmt->bindParam(':profile', $profile);
 $stmt->bindParam(':job_description', $job_description);
 $stmt->bindParam(':date', $date);
 $stmt->bindParam(':status', $status);
 $stmt->bindParam(':career_id', $career_id);
 $stmt->execute();
 //$stmt->debugDumpParams(); 
echo $career_id;
	
}else{
$stmt = $dbh->prepare("INSERT INTO `careers_listing`(`department_id`,`department`, `profile`, `job_description`, `date`, `status`) VALUES(:department_id,:department,:profile,:job_description,:date,:status)");

 $stmt->bindParam(':department_id', $department_id);
 $stmt->bindParam(':department', $department);
 $stmt->bindParam(':profile', $profile);
 $stmt->bindParam(':job_description', $job_description);
 $stmt->bindParam(':date', $date);
 $stmt->bindParam(':status', $status);

 $stmt->execute();
 //$stmt->debugDumpParams(); 
 echo $id=$dbh->lastInsertId();
}
}?>