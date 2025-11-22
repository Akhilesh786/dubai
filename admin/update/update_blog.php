<?php include "../config.php";
if(isset($_REQUEST)){ 
$blog_id=$_POST['blog-id'];
$blog_description=$_POST['Short_description'];
$blog_keyword=$_POST['blog-keyword'];
$blog_head=$_POST['blog-head'];
$blog_poster=$_POST['thumbnail'];
$blog_intro="intro";
$blog_content=$_POST['blog-content']; 
$blog_tags=$_POST['tags'];
$string= str_replace('','-',$blog_head);
$blog_url=  preg_replace('/[^A-Za-z0-9\-]/', '-', $string); // Removes special chars.
$uniue_url=strtolower($blog_url.'-'.$blog_id);
$trn_date=date('F j, Y');

$stmt = $dbh->prepare("UPDATE blog SET blog.blog_head=:blog_head,blog.tags=:blog_tags,blog.blog_intro=:blog_intro, blog.blog_description=:blog_description, blog.blog_keyword=:blog_keyword, blog.blog_head_image=:blog_head_image, blog.blog_url=:blog_url, blog.blog_content=:blog_content, blog.trn_date=:trn_date WHERE blog.blog_id=:blog_id");
    
	$stmt->bindParam(':blog_head', $blog_head);	
	$stmt->bindParam(':blog_head_image', $blog_poster);
    $stmt->bindParam(':blog_url', $uniue_url);    
    $stmt->bindparam(':blog_description', $blog_description);
    $stmt->bindParam(':blog_keyword', $blog_keyword);
	$stmt->bindParam(':blog_intro', $blog_intro);
    $stmt->bindParam(':blog_content', $blog_content);
    $stmt->bindParam(':blog_tags', $blog_tags);
    $stmt->bindParam(':trn_date', $trn_date);
    $stmt->bindParam(':blog_id', $blog_id);
    $stmt->execute();    
	
	header('Location: ../edit-blog.php?id='.$blog_id);
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