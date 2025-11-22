<?php 
include "../config.php";
if($_POST["action"]==="department_active"){
	
 $id=$_POST["id"];
 
 $stmt=$dbh->query("SELECT * FROM carrer_department where department_id='".$id."' ");
								$row = $stmt->fetch();
								$status=$row["status"];
								
								if($status==1){
									$stmt_update = $dbh->prepare("UPDATE `carrer_department` SET `status` = '0' WHERE `carrer_department`.`department_id` ='".$id."'");
									 $stmt_update->execute();
									 $count=$stmt_update->rowCount(); 
									 if($count==1){
										$stmt_profile = $dbh->prepare("UPDATE `careers_listing` SET `status` = '0' WHERE `careers_listing`.`department_id` ='".$id."'");
										 $stmt_profile->execute();
										 $count_profile=$stmt_profile->rowCount();  
										 echo 'btn btn-danger btn-user btn-block';
									 }
									
								}else{
									$stmt_update = $dbh->prepare("UPDATE `carrer_department` SET `status` = '1' WHERE `carrer_department`.`department_id` ='".$id."'");
									 $stmt_update->execute();
									 $count=$stmt_update->rowCount(); 
									 if($count==1){
										$stmt_profile = $dbh->prepare("UPDATE `careers_listing` SET `status` = '1' WHERE `careers_listing`.`department_id` ='".$id."'");
										 $stmt_profile->execute();
										  $count_profile=$stmt_profile->rowCount();  
										  echo 'btn btn-primary btn-user btn-block';
										 
									 }
									
								}
	
	
}if($_POST["action"]==="profile_active"){
	
 $id=$_POST["id"];
 
 $stmt=$dbh->query("SELECT * FROM `careers_listing` where career_id='".$id."' ");
								$row = $stmt->fetch();
								$status=$row["status"];
								
								if($status==1){
									$stmt_update = $dbh->prepare("UPDATE `careers_listing` SET `status` = '0' WHERE `careers_listing`.`career_id` ='".$id."'");
									 $stmt_update->execute();
									 $count=$stmt_update->rowCount(); 
									 if($count==1){
										$stmt_profile = $dbh->prepare("UPDATE `carrer_description` SET `status` = '0' WHERE `carrer_description`.`career_listing_id` ='".$id."'");
										 $stmt_profile->execute();
										 $count_profile=$stmt_profile->rowCount();  
										 echo 'btn btn-danger btn-user btn-block';
									 }
									
								}else{
									
									$stmt_update = $dbh->prepare("UPDATE `careers_listing` SET `status` = '1' WHERE `careers_listing`.`career_id` ='".$id."'");
									 $stmt_update->execute();
									 $count=$stmt_update->rowCount(); 
									 if($count==1){
										$stmt_profile = $dbh->prepare("UPDATE `carrer_description` SET `status` = '1' WHERE `carrer_description`.`career_listing_id` ='".$id."'");
										 $stmt_profile->execute();
										 $count_profile=$stmt_profile->rowCount();  
										 echo 'btn btn-primary btn-user btn-block';
									 }
									
								}
	 
	
}



?>