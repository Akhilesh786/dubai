<?php 

include '../config.php' ;
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      
         move_uploaded_file($file_tmp,"../../assets/images/".$file_name);
		 
		 
      $img_path="assets/images/".$file_name;
 $stmt = $dbh->prepare("UPDATE info SET logo=:logo WHERE info.id='1'");
	$stmt->bindParam(':logo', $img_path);	
    $stmt->execute();
    
	 
   header('Location: ../info.php');
die;
   }
?>