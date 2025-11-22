<?php
  session_start();
//Database Configuration File
include "../config.php" ; 

$id=$_POST['cate_id'];

 $stmt = $dbh->query("DELETE FROM blog_cate WHERE blog_cate.blog_cate_id='$id'");
 
    $stmt->execute();

 header("Location: ../blog.php");
die;

?>