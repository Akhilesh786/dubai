<?php
//Database Configuration File
include('../config.php');

//Getting Post Values
$blog_id=$_POST['blog-id'];
// Query for Insertion
$sql="DELETE FROM blog WHERE blog_id='$blog_id'";

$query = $dbh->prepare($sql);
$query->execute();
if($query)
{
$sql1="DELETE FROM blog_cate_blog WHERE blog_id='$blog_id'";

$query1 = $dbh->prepare($sql1);
$query1->execute();
header('Location: ../blog.php');
die;
}
else { echo "Could Not update"; }

echo $blog_id ;

?>