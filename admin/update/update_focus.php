<?php include "../config.php";
if(isset($_REQUEST)){ 
$id=$_POST['id'];
$blog_head=$_POST['blog-head'];
$blog_poster=$_POST['blog-poster'];
$blog_content=$_POST['blog-content']; 
$blog_url= str_replace(" ","-",$blog_head);
$trn_date=date("Y-m-d");

$stmt = $dbh->prepare("UPDATE focus SET focus.title=:blog_head, focus.image=:blog_poster, focus.text=:blog_content, focus.url=:url WHERE focus.id=:id");
    
	$stmt->bindParam(':blog_head', $blog_head);	
	$stmt->bindParam(':blog_poster', $blog_poster);
    $stmt->bindParam(':url', $blog_url);    
    $stmt->bindParam(':blog_content', $blog_content);
    $stmt->bindParam(':id', $id);
    $stmt->execute();    
	
	header('Location: ../edit-focus.php?id='.$id);
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