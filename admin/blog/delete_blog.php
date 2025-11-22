<?php
//Database Configuration File
include('../../config.php');

//Getting Post Values
$blog_id=$_POST['blog-id'];
// Query for Insertion
$sql="DELETE FROM blog WHERE blog_id='$blog_id'";

$query = $dbh->prepare($sql);
$query->execute();
if($query)
{
	echo "<br><br><div style='text-align:center; font-size:20px;'>";
    echo "Blog Deleted";
	echo "<br><br>";
	echo "<a href='edit-blog-list.php'> Go Back </a></div>" ;
	//exit();
}
else { echo "Could Not update"; }

echo $blog_id ;

?>