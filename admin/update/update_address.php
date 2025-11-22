<?php
  session_start();
//Database Configuration File
include '../config.php' ;
$address=$_POST['address'];
$city=$_POST['city'];
$country=$_POST['country'];
$pincode=$_POST['pincode'];

 $stmt = $dbh->prepare("UPDATE address SET address=:address, city=:city, country=:country, pincode=:pincode WHERE address.ad_id='1'");
	$stmt->bindParam(':address', $address);	
	$stmt->bindParam(':city', $city);	
	$stmt->bindParam(':country', $country);	
	$stmt->bindParam(':pincode', $pincode);	
    $stmt->execute();

header('Location: ../address.php');
die;
?>