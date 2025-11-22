<?php 
include "config.php";

//print_r($_FILES);
//print_r($_POST);

$name=$_POST['name'];
$email=$_POST['email'];
$number=$_POST['number'];
$portfolio=$_POST['portfolio'];
$description="NULL";
$department_id=$_POST['department_id'];
$profile_id=$_POST['profile_id'];
$date=date('F j, Y');
$status='1';


 $imageFileType = strtolower(pathinfo($_FILES["curriculum"]["name"],PATHINFO_EXTENSION));


if($imageFileType != "docs" or $imageFileType != "pdf"  ) {}else{  echo "Docs & Pdf files are allowed."; exit;}
if ($_FILES["curriculum"]["size"] > 3000000 ) {
  echo "Sorry, your file is too large.";
  exit;
}
$temp = explode(".", $_FILES["curriculum"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);

if( move_uploaded_file($_FILES["curriculum"]["tmp_name"], "upload/curriculum_vita/" . $newfilename)) {
    $imageupload=1;
  }

if($imageupload==1){

$stmt = $dbh->prepare("INSERT INTO `career_form`( `department_id`, `listing_id`, `name`, `email`,`number`, `description`, `portfolio`, `document`, `date`,`status`)VALUES(:department_id,:listing_id,:name,:email,:number,:description,:portfolio,:document,:date,:status)");

 $stmt->bindParam(':department_id', $department_id);
 $stmt->bindParam(':listing_id', $profile_id);
 $stmt->bindParam(':name', $name);
 $stmt->bindParam(':email', $email);
 $stmt->bindParam(':number', $number);
 $stmt->bindParam(':description', $description);
 $stmt->bindParam(':portfolio', $portfolio);
 $stmt->bindParam(':document', $newfilename);
 $stmt->bindParam(':date', $date);
 $stmt->bindParam(':status', $status);
 $stmt->execute();
// $stmt->debugDumpParams();
 echo $id=$dbh->lastInsertId();
}

?>