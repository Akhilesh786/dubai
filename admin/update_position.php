<?php
session_start();
include "config.php";
include "auth.php";
$order = $_POST['order'];

$positions = explode(',', $order);
foreach ($positions as $index => $position) {
$stmt=$dbh->prepare("UPDATE Clients_and_Partners SET position =$index  WHERE id =$position ");
$stmt->execute();
$stmt->debugDumpParams();

}

?>