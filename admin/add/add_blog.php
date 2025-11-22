<?php include "../config.php";
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
if(isset($_REQUEST)){ 
$blog_head=$_POST['blog-head'];
$blog_description=$_POST['Short_description'];
$blog_keyword="Blog";
$blog_intro="intro";
$blog_poster=$_POST['thumbnail'];
$trn_date=date('F j, Y');
$blog_content=$_POST['blog-content'];
$blog_tags=$_POST['tags'];
$blog_cate=$_POST['blog_cate'];
$name="Awesomesauce Creative";
$user_id=$_POST["user_id"];
$string= str_replace('','-',$blog_head);
$blog_url=  preg_replace('/[^A-Za-z0-9\-]/', '-', $string); // Removes special chars.

$stmt = $dbh->prepare("INSERT INTO blog (blog_head, user_id, author, blog_head_image, blog_description, blog_keyword, blog_url, blog_intro, blog_content, tags, trn_date)  
  VALUES (:blog_head, :user_id, :author, :blog_head_image, :blog_description, :blog_keyword, :blog_url, :blog_intro, :blog_content, :tags, :trn_date)");
  
 $stmt->bindParam(':blog_head', $blog_head);
 $stmt->bindParam(':blog_head_image', $blog_poster);
 $stmt->bindparam(':blog_url', strtolower($blog_url));
 $stmt->bindParam(':blog_intro', $blog_intro);
 $stmt->bindparam(':blog_description', $blog_description);
 $stmt->bindParam(':blog_keyword', $blog_keyword);
 $stmt->bindParam(':blog_content', $blog_content);
 $stmt->bindParam(':tags', $blog_tags);
 $stmt->bindParam(':author', $name);
 $stmt->bindParam(':user_id', $user_id);
 $stmt->bindParam(':trn_date', $trn_date);
 $stmt->execute();
 $blog_id= $dbh->lastInsertId();
 
 $uniue_url=$blog_url.'-'.$blog_id;
 $stmtupdate = $dbh->prepare("UPDATE blog SET blog.blog_url=:blog_url WHERE blog.blog_id=:blog_id");
  $stmtupdate->bindParam(':blog_url', $uniue_url);
  $stmtupdate->bindParam(':blog_id', $blog_id);
   $stmtupdate->execute();    
 


 // blog category update
  $links = array();
$parts = explode(',', $blog_cate);
foreach ($parts as $blog_cate)
{
 
$stmtcateid = $dbh->prepare("INSERT INTO blog_cate_blog (blog_cate_id, blog_id)  
  VALUES (:blog_cate, :blog_id)");
  
 $stmtcateid->bindParam(':blog_cate', $blog_cate);
 $stmtcateid->bindParam(':blog_id', $blog_id);
 
 $stmtcateid->execute();
}

header('Location: ../blog.php');
die;
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
 

 

 
 ?>