<?php include "config.php";
error_reporting(0);
if(isset($_REQUEST)){ 
$blog_head=$_POST['blog-head'];
$blog_description="Blog";
$blog_keyword="Blog";
$blog_poster=$_POST['blog-poster'];
$trn_date=date("Y-m-d");
$blog_content=$_POST['blog-content'];
$blog_url= str_replace(" ","-",$blog_head);
/*
$stmt = $dbh->prepare("INSERT INTO blog (blog_head, blog_head_image, blog_description, blog_keyword, blog_url, blog_intro, blog_content, trn_date)  
  VALUES (:blog_head, :blog_head_image, :blog_description, :blog_keyword, :blog_url, :blog_intro, :blog_content, :trn_date)");
  
 $stmt->bindParam(':blog_head', $blog_head);
 $stmt->bindParam(':blog_head_image', $blog_poster);
 $stmt->bindparam(':blog_url', $blog_url);
 $stmt->bindParam(':blog_intro', $blog_intro);
 $stmt->bindparam(':blog_description', $blog_description);
 $stmt->bindParam(':blog_keyword', $blog_keyword);
 $stmt->bindParam(':blog_content', $blog_content);
 $stmt->bindParam(':trn_date', $trn_date);
 $stmt->execute();
 
 echo "New Blog created successfully";
 echo "<a href='add-blog.php'> Go Back </a>" ;
 }
 else
 {
 echo "Not Entered " ;
 echo $blog_head;
 echo "<br>";
 echo $blog_content;
 echo "<br>";
 echo $trn_date;
 }
 
 */
 
 
 echo $blog_head;
 echo "<br>";
 echo $blog_content;
 echo "<br>";
 echo $blog_url;
 echo "<br>";
 echo $blog_poster;
 echo "<br>";
 echo $trn_date;
 ?>