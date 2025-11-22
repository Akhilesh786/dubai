<?php 
include "config.php";
error_reporting(0);
$stmt=$dbh->query("SELECT placeid 
   FROM tiers limit 1");
while ($row = $stmt->fetch()){
echo $row['placeid'];
} 

 ?>