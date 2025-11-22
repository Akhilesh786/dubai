<?php 
require_once("config.php");

// Code for checking email availabilty
if(!empty($_POST["address"])) {
$address= $_POST["address"];
$sql ="SELECT placeid, address FROM tiers WHERE tiers.placeid=:address";
$query= $dbh -> prepare($sql);
$query-> bindParam(':address', $address, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
echo "<span class='place-id-tier'> You have selected an exotic place</span>";
}
 else 
 {	
$ret="SELECT google_place_id FROM places where (google_place_id=:address)";
$queryt = $dbh -> prepare($ret);
$queryt->bindParam(':address',$address,PDO::PARAM_STR);
$queryt -> execute();
$results = $queryt -> fetchAll(PDO::FETCH_OBJ);
if($queryt -> rowCount() > 0)
{

echo "<span class='place-id-error'> existsssssssss</span>";
}

}

}

?>
