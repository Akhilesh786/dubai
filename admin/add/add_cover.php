<?php
include '../config.php' ;
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      
         move_uploaded_file($file_tmp,"../../cover/".$file_name);
		 
		 
      $img_path="cover/".$file_name;
	$head=$_POST['head'];
$stmt = $dbh->prepare("INSERT INTO cover (image, head)  
  VALUES (:image, :head)");
 
	
 $stmt->bindParam(':head', $head);
 $stmt->bindParam(':image', $img_path);
 
 $stmt->execute();
	 
   header('Location: ../cover.php');
die;
   }