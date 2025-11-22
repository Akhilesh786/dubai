<?php
//upload.php
if($_FILES["file"]["name"] != '')
{
 $test = explode('.', $_FILES["file"]["name"]);
 $ext = end($test);
 $name =time() . '_' . $_FILES["file"]["name"] ;
 $location = "./upload/clients_partners/".$name;  
 move_uploaded_file($_FILES["file"]["tmp_name"], $location);
 echo $name;
} 
?>