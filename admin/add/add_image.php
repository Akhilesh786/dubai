<?php
include "../config.php" ;
session_Start();
$pro_id=$_SESSION["pro_id"];
$target_dir = "../../product-image/";
$target_file = basename($_FILES["file"]["name"]);


if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name'])) {
    $status = 1;
	$display_order=1;	
	$is_featured=1;
$stmt = $dbh->prepare("INSERT INTO product_images (product_id, img, display_order, is_featured)  
  VALUES (:product_id, :img, :display_order, :is_featured)");
 
	
 $stmt->bindParam(':product_id', $pro_id);
 $stmt->bindParam(':img', $target_file);
 $stmt->bindParam(':display_order', $display_order);
 $stmt->bindParam(':is_featured', $is_featured);
 
 $stmt->execute();

	
}
