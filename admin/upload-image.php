<?php
error_reporting(0);
//upload.php
if($_FILES["file"]["name"] != '')
{
 $test = explode('.', $_FILES["file"]["name"]);
 $ext = end($test);
 $name =time() . '_' . $_FILES["file"]["name"] ;
 $location = "../upload/".$name;  
 move_uploaded_file($_FILES["file"]["tmp_name"], $location);
 echo $name;
} 
if($_FILES["blog"]["name"] != '')
{
 $test = explode('.', $_FILES["blog"]["name"]);
 $ext = end($test);
 $name =time() . '_' . $_FILES["blog"]["name"] ;
 $location = "../upload/blog/".$name;  
 move_uploaded_file($_FILES["blog"]["tmp_name"], $location);
 echo $name;
} 
if($_FILES["testimonial"]["name"] != '')
{
 $test = explode('.', $_FILES["testimonial"]["name"]);
 $ext = end($test);
 $name ='Testimonial' . '_' . $_FILES["testimonial"]["name"] ;
 $location = "../upload/".$name;  
 move_uploaded_file($_FILES["testimonial"]["tmp_name"], $location);
 echo $name;
} 
?>