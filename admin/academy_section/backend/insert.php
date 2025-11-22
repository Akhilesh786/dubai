<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
include("./database.php");

if($_POST["action"]=="category"){
	
	$name=$_POST["name"];
	
	$data=array('name'=>$name);
	$database = new Database();
    $database->insertData('course_category', $data);
	
}if($_POST["action"]=="sub_category"){
	$data=array('name'=>$_POST["name"],'course_category_id'=>$_POST["course_category_id"],'description'=>$_POST["short_description"],'icon'=> $_POST["profile"]);
	$database = new Database();
    $database->insertData('course_sub_category', $data);
	}
if($_POST["action"]=="course_category_id"){
	$data=array('course_category_id'=>$_POST["course_category_id"]);
	$database = new Database();
   $data=$database->getData('course_sub_category','*', $data);
	
	foreach ($data as $item) {
		echo '<option value="'.$item['id'].'">'.$item['name'].'</option>'; 
			 }
	}
	if($_POST["action"]=="add_work"){
	$data=array('course_name'=>$_POST["course_name"],'trainers'=>$_POST["trainers"],'duration'=>$_POST["duration"],'credit'=> $_POST["credit"],'seats'=> $_POST["seats"],'about_courese'=> $_POST["about_courese"],'course_category_id'=> $_POST["course_category_id"],'course_sub_category_id'=> $_POST["course_sub_category_id"]);
	$database = new Database();
    $database->insertData('course_detail', $data);
	}



?>
