<?php
include "../config.php" ;
$product_name=$_POST['product_name'];
$short_desc=$_POST['short_desc'];
$full_desc=$_POST['full_desc'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
$featured=1;
$active=1;
$sub_id=$_POST['sub_list'];
$product_id=$_POST['product_id'];

$stmt = $dbh->prepare("UPDATE products SET product_name=:product_name, short_description=:short_description, full_description=:full_description, price=:price, quantity=:quantity, is_featured=:is_featured, is_active=:is_active WHERE products.id='$product_id' ");
  
 $stmt->bindParam(':product_name', $product_name);
 $stmt->bindParam(':short_description', $short_desc);
 $stmt->bindParam(':full_description', $full_desc);
 $stmt->bindParam(':price', $price);
 $stmt->bindParam(':quantity', $quantity);
 $stmt->bindParam(':is_featured', $featured);
 $stmt->bindParam(':is_active', $active);
 
 $stmt->execute();
 
 
$product_slug= str_replace(" ","-",$product_name)."-".$product_id;


 $stmt2 = $dbh->prepare("UPDATE products SET product_slug=:product_slug WHERE products.id='$product_id'");
	$stmt2->bindParam(':product_slug', $product_slug);	
    $stmt2->execute();
	
 
 $stmt1 = $dbh->prepare("UPDATE sub_pro SET pro_id=:pro_id, sub_id=:sub_id");
  
 $stmt1->bindParam(':pro_id', $product_id);
 $stmt1->bindParam(':sub_id', $sub_id);
 
 $stmt1->execute();
 header('Location: ../edit-products.php?id='.$product_id);
die;
 ?>