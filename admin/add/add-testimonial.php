<?php
session_start();
include '../config.php' ;

$testimonial_id=$_POST['testimonial_id'];
$name=$_POST['name'];
$testimonial_content=$_POST['testimonial_content'];
$profile=$_POST['profile'];
$company_name=$_POST['company_name'];

if($testimonial_id==0){

$stmt = $dbh->prepare("INSERT INTO `testimonial`(`company_name`, `name`, `testimonial_content`, `profile`) VALUES (:company_name,:name,:testimonial_content,:profile)");
  
 $stmt->bindParam(':company_name', $company_name);
 $stmt->bindParam(':name', $name);
 $stmt->bindParam(':testimonial_content', $testimonial_content);
 $stmt->bindParam(':profile', $profile);
 $stmt->execute();
 $run=$dbh->lastInsertId();
 if($run){
	 echo '1';
 }
}else{
	
	$stmt = $dbh->prepare("UPDATE `testimonial` SET `company_name`=:company_name,`name`=:name,`testimonial_content`=:testimonial_content,`profile`=:profile WHERE `id`=:testimonial_id");
  
 $stmt->bindParam(':company_name', $company_name);
 $stmt->bindParam(':name', $name);
 $stmt->bindParam(':testimonial_content', $testimonial_content);
 $stmt->bindParam(':profile', $profile);
 $stmt->bindParam(':testimonial_id', $testimonial_id);
 $stmt->execute();
 $run=$stmt->rowCount();
 if($run==1){
	 echo '1';
 }
	
	
}
?>