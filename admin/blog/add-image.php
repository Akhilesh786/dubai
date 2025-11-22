<!DOCTYPE html>

<html>

  <head>

    <title>Add Blog</title>

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">

    <meta charset="utf-8">

	

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

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

	<h2 class="text-center">ADD NEW IMAGE</h2>
	<hr>
<br><br>
    </div>

	<div class="col-md-12">
	
	<form action="addimage1.php" method="POST" enctype="multipart/form-data">
<div class="form-group">
<label for="usr">Add image</label>
<input type="file" name="image" class="form-control" required />
</div>

<input type="submit" value="S U B M I T" name="submit" style="width:100%;" class="btn btn-primary"/>
</form>

<br>
<br>
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

    <script>
	$(document).ready(function() {
  $('#upload-image').submit(function(e) {
    e.preventDefault();
    $.ajax({
       type: "POST",
       url: 'addimage1.php',
       data: $(this).serialize(),
       success: function(data)
       {
             document.getElementById("displaytext").innerHTML = data;
          
       }
   });
 });
});
    </script>

  </body>

</html>