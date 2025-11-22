<?php include "../config.php";
if(isset($_REQUEST)){ 
$work_head=$_POST['work-head'];
$work_name=$_POST['work-head'];
$work_poster=$_POST['work-poster'];
$work_desc=$_POST['work-desc'];
$work_id=$_POST["work-id"];
$work_url=$_POST['work-url']; // str_replace(" ","-",$blog_head);


$stmt = $dbh->prepare("UPDATE work SET work.work_title=:work_title, work.work_desc=:work_description, work_image=:work_image, work.work_url=:work_url WHERE work.id=:work_id");
    
	$stmt->bindParam(':work_title', $work_head);	
	$stmt->bindParam(':work_image', $work_poster);
    $stmt->bindParam(':work_url', $work_url);    
    $stmt->bindparam(':work_description', $work_desc);
    $stmt->bindParam(':work_id', $work_id);
    $stmt->execute();    
	
	header('Location: ../edit-work.php?id='.$work_id);
die;
	}
	else
	{ 	
	echo "<span style='color:red;'><strong> Could Not Update This Blog</strong></span>";
	echo "<br>";
	echo $blog_head;
	echo "<br>";
	echo $blog_content;
	echo "<br>";
	echo $trn_date;
	}
	?>