<?php 
session_start();
include "auth.php";
error_reporting(0); // Set the appropriate error reporting level
include "config.php"; 

$id = $_POST["id"];
$stmt = $dbh->query("SELECT * FROM `Clients_and_Partners` WHERE id='" . $id . "'");
$row = $stmt->fetch();
$status = $row["status"]; 

if ($status == 0) {
    $stmt1 = $dbh->prepare("UPDATE `Clients_and_Partners` SET `status` = '1' WHERE `id` = :id");
} else {
    $stmt1 = $dbh->prepare("UPDATE `Clients_and_Partners` SET `status` = '0' WHERE `id` = :id");
}

$stmt1->bindParam(':id', $id);
$stmt1->execute();
echo $count = $stmt1->rowCount();
?>
