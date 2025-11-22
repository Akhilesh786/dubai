<?php 

   if(isset($_FILES['image'])){
      $errors= array();
      $file_name =$_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      
      if($file_size > 90097152){
         $errors[]='File size must be excately 5 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploads/".$file_name);
		 echo "<br><br><div style='text-align:center'>";
         echo "<a href='https://www.ahappierme.org/admin/blog/uploads/".$file_name."' target='_blank'>https://www.ahappierme.org/admin/blog/uploads/".$file_name."</a> <br><br>Copy This URL<br><br><br>";
         echo "<a href='add-image.php'>Click here to add more image</a></div>"; 
	  }else{
         print_r($errors);
      }
   }
?>