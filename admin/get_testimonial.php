<?php

include("config.php");



$stmt=$dbh->query("SELECT * FROM `testimonial` ORDER BY `testimonial`.`position` ASC");

$tabs = array();
while ($result=$stmt->fetch()) {
  $tabs[] = $result;
}

header('Content-Type: application/json');
echo json_encode($tabs);
?>