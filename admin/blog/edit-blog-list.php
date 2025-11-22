<?php include "../../config.php" ;?><!DOCTYPE html>
<html>
  <head>
    <title>Edit Blog</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      .controls {
        background-color: #fff;
        border-radius: 2px;
        border: 1px solid transparent;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        box-sizing: border-box;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        height: 29px;
        margin-left: 17px;
        margin-top: 10px;
        outline: none;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      .controls:focus {
        border-color: #4d90fe;
      }
      .title {
        font-weight: bold;
      }
      #infowindow-content {
        display: none;
      }
      #map #infowindow-content {
        display: inline;
      }

    </style>
  </head>
  <body>
	
	<br>
	<div class="container">
	<div class="row">
	<div class="col-md-9"><span id="selected-address" class="text-center" style="vertical-align: -webkit-baseline-middle;"></span></div>
	</div>
	</div>
	<hr/>
	<div class="container">
	<div class="row">
	<div class="col-md-12">
	<h2 class="text-center">EDIT BLOG</h2>	<hr>		<a href="index.php" class="btn btn-primary btn-fill pull-right">B A C K</a>	<hr><br><br>
    </div>
	<div class="col-md-12">
	<div class="row about-row">
	<div class="about-container" style="width:100%;">
	<div class="col-md-12">	
	<?php 	  $stmt=$dbh->query("SELECT * FROM blog ORDER BY `blog`.`trn_date` DESC ");	 
	while ($row = $stmt->fetch()) { ?>    
    <!-- Blog Post -->      
	<div class="card mb-4 blog">        
	<img class="card-img-top" src="<?php echo $row['blog_head_image']; ?>" alt="Card image cap" style="display:none;">   
	<div class="card-body">           
	<h2 class="card-title blog-title">
	<?php echo $row['blog_head']; ?>
	</h2>		
	<hr style="height:1px;">           
	<p class="card-text blog-content">
	<?php echo $row['blog_intro']; ?>
	</p>		
	<div style="display:flex;">   
	<a href="edit-blog.php?id=<?php echo $row['blog_id']; ?>" class="blog-link btn btn-primary">Edit This Blog Post &rarr;</a>	
	&nbsp; &nbsp; 			
	<form method="POST" action="delete_blog.php">	
	<input type="hidden" value="<?php echo $row['blog_id']; ?>" name="blog-id" />	
	<input type="submit" value="Delete" name="submit" class="btn btn-danger" />	
	</form>		
	</div>       
	</div>      
    <div class="card-footer text-muted blog-date">    
	Posted on <strong><?php echo $row['trn_date']; ?></strong>  
	</div>  
	</div>		
	<?php } ?>    
    <!-- Pagination -->      
	<ul class="pagination justify-content-center mb-4" style="display:none">   
	<li class="page-item">         
	<a class="page-link" href="#">&larr; Older</a>   
	</li>        
	<li class="page-item disabled">    
	<a class="page-link" href="#">Newer &rarr;</a>   
	</li>
	</ul>	
	</div>
	</div>
	</div>
	
	</div>
	</div>
	</div>
	<hr/>
	
	<div class="container">
	<div class="row">
	<div class="col-md-12">
	<p id="success" class="text-center"></p>
	</div>
	</div>
	</div>
	
	
	
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  </body>
</html>