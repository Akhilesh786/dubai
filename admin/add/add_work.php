<?php include "../config.php";
error_reporting(0);
if(isset($_REQUEST)){ 
$work_service=$_POST['service'];
$work_image=$_POST['work-poster'];
$work_title=$_POST['work-head'];
$work_client=$_POST['Client'];
$work_team=$_POST['team'];
$work_desc=$_POST['work-content'];
$work_twitter=$_POST['twitter'];
$work_facebook=$_POST['facebook'];
$work_Instagram=$_POST['instagram'];
$work_picsart=$_POST['picsart'];
$entr_date=$_POST['date'];
$string = str_replace(' ', '-', $work_title);


$stmt = $dbh->prepare("INSERT INTO `work`(`work_service`, `work_image`, `work_title`,`url_title`,`work_client`, `work_team`,`work_desc`, `work_twitter`, `work_facebook`, `work_Instagram`, `work_picsart`, `entr_date`)
  VALUES (:work_service,:work_image,:work_title,:url_title,:work_client,:work_team,:work_desc,:work_twitter,:work_facebook,:work_Instagram,:work_picsart,:entr_date)");
  
 $stmt->bindParam(':work_service', $work_service);
 $stmt->bindParam(':work_image', $work_image);
 $stmt->bindparam(':work_title', $work_title);
 $stmt->bindparam(':url_title', $string);
 $stmt->bindParam(':work_client',$work_client);
 $stmt->bindParam(':work_team', $work_team);
 $stmt->bindParam(':work_desc', $work_desc);
 $stmt->bindParam(':work_twitter', $work_twitter);
 $stmt->bindParam(':work_facebook', $work_facebook);
 $stmt->bindParam(':work_Instagram', $work_Instagram);
 $stmt->bindParam(':work_picsart', $work_picsart);
 $stmt->bindParam(':entr_date', $entr_date);
 $stmt->execute();
 $work_id = $dbh->lastInsertId();
 
 $parts = explode(',', $work_service);
				foreach ($parts as $service_cate)
				{
					$stmtcateid = $dbh->prepare("INSERT INTO `work_work_cate`(`work_detail_id`,`work_cate_id`) VALUES  (:work_detail_id, :work_cate_id)");
				   $stmtcateid->bindParam(':work_detail_id', $work_id);
				 $stmtcateid->bindParam(':work_cate_id', $service_cate);
				 
				 $stmtcateid->execute();
				// $stmtcateid->debugDumpParams();		
					
				 
			
				}

echo $work_id;

 }
 
 

 

 
 ?>