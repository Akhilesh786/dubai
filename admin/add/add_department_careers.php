<?php include "../config.php";
error_reporting(0);
if(isset($_REQUEST)){ 



$department=$_POST['department']; 

$date=date('F j, Y');
$status=$_POST["status"];



$stmt = $dbh->prepare("INSERT INTO `carrer_department`(`department_name`, `date`, `status`) VALUES(:department,:date,:status)");

 $stmt->bindParam(':department', $department);
 $stmt->bindParam(':date', $date);
 $stmt->bindParam(':status', $status);

 $stmt->execute();
 echo $id=$dbh->lastInsertId();
}?>