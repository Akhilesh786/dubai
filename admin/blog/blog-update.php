<?php include "config.php";
if(isset($_REQUEST)){ 
$blog_id=$_POST['blog-id'];
$blog_url=$_POST['blog-url'];
$blog_description=$_POST['blog-description'];
$blog_keyword=$_POST['blog-keyword'];
$blog_head=$_POST['blog-head'];
$blog_poster=$_POST['blog-poster'];
$blog_intro=$_POST['blog-intro'];
$trn_date=$_POST['blog-date'];
$blog_content=$_POST['blog-content']; 

$stmt = $dbh->prepare("UPDATE blog SET blog.blog_head=:blog_head,blog.blog_intro=:blog_intro, blog.blog_description=:blog_description, blog.blog_keyword=:blog_keyword, blog.blog_head_image=:blog_head_image, blog.blog_url=:blog_url, blog.blog_content=:blog_content, blog.trn_date=:trn_date WHERE blog.blog_id=:blog_id");
    
	$stmt->bindParam(':blog_head', $blog_head);	
	$stmt->bindParam(':blog_head_image', $blog_poster);
    $stmt->bindParam(':blog_url', $blog_url);    
    $stmt->bindparam(':blog_description', $blog_description);
    $stmt->bindParam(':blog_keyword', $blog_keyword);
	$stmt->bindParam(':blog_intro', $blog_intro);
    $stmt->bindParam(':blog_content', $blog_content);
    $stmt->bindParam(':trn_date', $trn_date);
    $stmt->bindParam(':blog_id', $blog_id);
    $stmt->execute();    
	
	header("Location: edit-blog.php?id=$blog_id");
    die;
	}
	else
	{ 	
	echo "<span style='color:red;'><strong> Could Not Update This Blog</strong></span>";
	echo "<br>";
	echo $blog_head;
	echo "<br>";
	echo $blog_content;
	echo "<br>";
	echo $trn_date;
	}
	?>