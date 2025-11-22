<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include("config.php");
include("auth.php");



$stmt=$dbh->query("SELECT * FROM `Clients_and_Partners` ORDER BY `Clients_and_Partners`.`position`");

$tabs = array();
while ($result=$stmt->fetch()) {
  $tabs[] = $result;
}

header('Content-Type: application/json');
echo json_encode($tabs);
?>