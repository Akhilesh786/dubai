<?php 
include "config.php";
$c_id=$_POST['c_id'];
$edit_card=$_POST['edit_card'];

if($edit_card=="card"){

include "edit/card_info.php";

} else if($edit_card=="social") {

include "edit/social_info.php";

} else if($edit_card=="product") {

include "edit/product.php";

} else if($edit_card=="gallery") {

include "edit/gallery.php";

} else if($edit_card=="service") {

include "edit/service.php";

} else if($edit_card=="number") {

include "edit/number.php"; 

}

?>