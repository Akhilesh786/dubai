<?php
include '../config.php' ;
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      
         move_uploaded_file($file_tmp,"../../cover/".$file_name);
		 
		 
	$head=$_POST['head'];
	$cover_id=$_POST['cover_id'];
	$imgpath=$_POST['img-path'];
	
	if(empty($file_name)) {
	$img_path=$imgpath; }
	else {
      $img_path="cover/".$file_name;
}

 $stmt = $dbh->prepare("UPDATE cover SET image=:image, head=:head WHERE cover.id='$cover_id'");
	$stmt->bindParam(':image', $img_path);	
	$stmt->bindParam(':head', $head);	
    $stmt->execute();
	 
   header('Location: ../cover.php');
die;
   }