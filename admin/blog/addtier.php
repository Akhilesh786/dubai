<?php 
include "config.php";
error_reporting(0);
if(isset($_REQUEST)){
$address=$_POST['address'];
$placeid=$_POST['placeid'];
$tier=$_POST['tier'];
if ($address == null){
echo "<span style='color:red;'>Please Select the <strong>PLACE</strong> from map.</span>";
}
elseif($tier== null){
echo "<span style='color:red;'>Please Select <strong>TIER</strong>.</span>";
}
else{
$stmt = $dbh->query("
SELECT placeid, tier
  FROM tiers
  WHERE tiers.placeid='$placeid'
");
$row = $stmt->fetch();
$gettier=$row['tier'];
if ($row == 0){

 $sql = "INSERT INTO tiers (address, placeid,tier)
    VALUES ('$address', '$placeid', '$tier')";
    // use exec() because no results are returned
    $dbh->exec($sql);
    echo "New address <span style='color:green;'><strong> ( ".$address." )</strong></span> has been recorded successfully on<span style='color:green;text-transform:capitalize'><strong> ".$tier."</strong></span> .";
	}
	else{
	echo "Address with<span style='color:red;'><strong> ".$address."</strong> </span>is already registered on<span style='color:red;text-transform:capitalize'><strong> ".$gettier."</strong></span> .";
	
	}}}
    ?>