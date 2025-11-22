<?php include "../config.php";

if(isset($_REQUEST)){ 

$work_id=$_POST['work_id']; 
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

$data=[
		 "work_service"=> $work_service,
		 "work_image"=> $work_image,
		 "work_title"=> $work_title,
		 "url_title"=>$string,
		 "work_client"=>$work_client,
		 "work_team" => $work_team,
		 "work_desc"=> $work_desc,
		 "work_twitter"=> $work_twitter,
		 "work_facebook" => $work_facebook,
		 "work_Instagram" => $work_Instagram,
		 "work_picsart" => $work_picsart,
		 "entr_date" => $entr_date,
		 "work_id" => $work_id,
	];

if($work_service !=""){
$delete=$dbh->prepare("DELETE FROM `work_work_cate` WHERE `work_detail_id`=:id");
$delete->bindParam(':id',$work_id);
$delete->execute();
}

$parts = explode(',', $work_service);
				foreach ($parts as $service_cate)
				{
					$stmtcateid = $dbh->prepare("INSERT INTO `work_work_cate`(`work_detail_id`,`work_cate_id`) VALUES  (:work_detail_id, :work_cate_id)");
				   $stmtcateid->bindParam(':work_detail_id', $work_id);
				 $stmtcateid->bindParam(':work_cate_id', $service_cate);
				 
				 $stmtcateid->execute();
				// $stmtcateid->debugDumpParams();		
					
				 
			
				}

$stmt = $dbh->prepare("UPDATE `work` SET `work_service`=:work_service,`work_image`=:work_image,`work_title`=:work_title,`url_title`=:url_title,`work_client`=:work_client,`work_team`=:work_team,`work_desc`=:work_desc,`work_twitter`=:work_twitter,`work_facebook`=:work_facebook,`work_Instagram`=:work_Instagram,`work_picsart`=:work_picsart,`entr_date`=:entr_date WHERE `id`=:work_id");
   
 
 $stmt->execute($data);
 //$stmt->debugDumpParams();

 $count = $stmt->Rowcount();

if($count==1){
	echo "successfull";
}else{
	echo 'something went`s wrong.';
}

 }
 
 

 

 
 ?>