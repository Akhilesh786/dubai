<?php include "config.php" ; ?><!DOCTYPE html>
<html>
  <head>
    <title>Add Blog</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
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

    </style>	<style>.comment-form-container {	background: #F0F0F0;	border: #e0dfdf 1px solid;	padding: 20px;	border-radius: 2px;}.input-row {	margin-bottom: 20px;}.input-field {	width: 100%;	border-radius: 2px;	padding: 10px;	border: #e0dfdf 1px solid;}.btn-submit {	padding: 10px 20px;	background: #333;	border: #1d1d1d 1px solid;	color: #f0f0f0;	font-size: 0.9em;	width: 100px;	border-radius: 2px;    cursor:pointer;}ul {	list-style-type: none;}.comment-row {	border-bottom: #e0dfdf 1px solid;	margin-bottom: 15px;	padding: 15px;}.outer-comment {	background: #F0F0F0;	padding: 20px;	border: #dedddd 1px solid;}span.commet-row-label {	font-style: italic;}span.posted-by {	color: #09F;}.comment-info {	font-size: 0.8em;}.comment-text {    margin: 10px 0px;}.btn-reply {    font-size: 0.8em;    text-decoration: underline;    color: #888787;    cursor:pointer;}#comment-message {    margin-left: 20px;    color: #189a18;    display: none;}</style>
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
	<div class="col-md-12">	<?php 	$blog_id=$_GET['id'];	$stmt=$dbh->query("SELECT * FROM blog WHERE blog.blog_id='$blog_id'");	if($row=$stmt->fetch()) {    $stmt1 = $dbh->query("SELECT approve FROM tbl_comment WHERE tbl_comment.blog_id=$blog_id");	$row1=$stmt1->fetch();	$approve=$row1['approve'];	?>	<div style="display:f;">	<a href="approve-comment.php" class="btn btn-primary btn-fill">B A C K</a>
	<h2 class="text-center"><?php echo $row['blog_head'] ; ?></h2></div>	<hr>	<div style="width:100%;text-align:center;">	<img src="<?php echo $row['blog_head_image'] ; ?>" style="width:55%;margin:auto;"/>	</div>	<hr>	<p class="text-center"><?php echo $row['blog_intro']; ?></p>	<hr>
    </div>
	<div class="col-md-12">	<hr>    <div id="output" class="text-left"></div>
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
	
	
	
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script><script>            function postReply(commentId) {                $('#commentId').val(commentId);                $("#name").focus();            }	$(document).ready(function() {  $('#frm-comment').submit(function(e) {    e.preventDefault();    $.ajax({       type: "POST",       url: 'comment-add.php',       data: $(this).serialize(),       success: function(data)       { $('#responce').html(data);                 }   }); });});                        $(document).ready(function () {            	   listComment();            });            function listComment() {                $.post("comment-list.php?blog_id=<?php echo $blog_id ; ?>",                        function (data) {                               var data = JSON.parse(data);                                                        var comments = "";                            var replies = "";                            var item = "";                            var parent = -1;                            var results = new Array();                            var list = $("<ul class='outer-comment'>");                            var item = $("<li>").html(comments);                            for (var i = 0; (i < data.length); i++)                            {                                var commentId = data[i]['comment_id'];                                parent = data[i]['parent_comment_id'];                                if (parent == "0")                                {                                    comments = "<div class='comment-row'>"+                                    "<div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['comment_sender_name'] + " </span><span class='posted-by'>( " + data[i]['comment_sender_email'] + " )</span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['date'] + "</span></div>" +                                     "<div class='comment-text'>" + data[i]['comment'] + "</div>"+                                    "<div><span style='color:red'>Approved:</span><span style='text-transform:uppercase;font-size:18px;font-weight:600'> "+data[i]['approve']+"</span><br><div style='display:flex;'><form method='POST' action='approve-it.php'><input type='hidden' name='comment-id' value='"+ data[i]['comment_id'] +"' /> <input type='hidden' name='blog-id' value='<?php echo $blog_id ; ?>' /><input type='submit' value='Approve' class='btn-success' /></form>&nbsp; &nbsp;<form method='POST' action='disapprove-it.php'><input type='hidden' name='comment-id' value='"+ data[i]['comment_id'] +"' /> <input type='hidden' name='blog-id' value='<?php echo $blog_id ; ?>' /><input type='submit' value='Disapprove' class='btn-primary' /></form>&nbsp; &nbsp;<form method='POST' action='delete-comment.php'><input type='hidden' name='comment-id' value='"+ data[i]['comment_id'] +"' /> <input type='hidden' name='blog-id' value='<?php echo $blog_id ; ?>' /><input type='submit' value='Delete' class='btn-danger' /></form></div></div>"+                                    "</div>";                                    var item = $("<li>").html(comments);                                    list.append(item);                                    var reply_list = $('<ul>');                                    item.append(reply_list);                                    listReplies(commentId, data, reply_list);                                }                            }                            $("#output").html(list);                        });            }            function listReplies(commentId, data, list) {                for (var i = 0; (i < data.length); i++)                {                    if (commentId == data[i].parent_comment_id)                    {                        var comments = "<div class='comment-row'>"+                        " <div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['comment_sender_name'] + " </span> <span class='posted-by'>( " + data[i]['comment_sender_email'] + " )</span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['date'] + "</span></div>" +                         "<div class='comment-text'>" + data[i]['comment'] + "</div>"+                        "<div><span style='color:red'>Approved:</span><span style='text-transform:uppercase;font-size:18px;font-weight:600'> "+data[i]['approve']+"</span><br><div style='display:flex;'><form method='POST' action='approve-it.php'><input type='hidden' name='comment-id' value='"+ data[i]['comment_id'] +"' /> <input type='hidden' name='blog-id' value='<?php echo $blog_id ; ?>' /><input type='submit' value='Approve' class='btn-success' /></form>&nbsp; &nbsp;<form method='POST' action='disapprove-it.php'><input type='hidden' name='comment-id' value='"+ data[i]['comment_id'] +"' /> <input type='hidden' name='blog-id' value='<?php echo $blog_id ; ?>' /><input type='submit' value='Disapprove' class='btn-primary' /></form>&nbsp; &nbsp;<form method='POST' action='delete-comment.php'><input type='hidden' name='comment-id' value='"+ data[i]['comment_id'] +"' /> <input type='hidden' name='blog-id' value='<?php echo $blog_id ; ?>' /><input type='submit' value='Delete' class='btn-danger' /></form></div></div>"+                        "</div>";                        var item = $("<li>").html(comments);                        var reply_list = $('<ul>');                        list.append(item);                        item.append(reply_list);                        listReplies(data[i].comment_id, data, reply_list);                    }                }            }        </script><?php } ?>
    <script>
      // This sample uses the Place Autocomplete widget to allow the user to search
      // for and select a place. The sample then displays an info window containing
      // the place ID and other information about the place that the user has
      // selected.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });

        var input = document.getElementById('pac-input');

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        // Specify just the place data fields that you need.
        autocomplete.setFields(['place_id', 'geometry', 'name']);

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);

        var marker = new google.maps.Marker({map: map});

        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();

          var place = autocomplete.getPlace();

          if (!place.geometry) {
            return;
          }

          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
          }

          // Set the position of the marker using the place ID and location.
          marker.setPlace({
            placeId: place.place_id,
            location: place.geometry.location
          });

          marker.setVisible(true);
    
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-id'].textContent = place.place_id;
          infowindowContent.children['place-address'].textContent =
              place.formatted_address;
          infowindow.open(map, marker);
        });
      }
	  
	  
	  function myFunction() {
  var x = document.getElementById("pac-input").value;
  var y = document.getElementById("place-id").innerHTML;
  document.getElementById("selected-address").innerHTML = x;
        $('.echo').attr("value",x);
        $('.echo1').attr("value",y);
}


$(document).ready(function(){
    $('#form-tier').submit(function(){
        var data = $(this).serialize();

        $.ajax({
            url: "addtier.php",
            type: "POST",
            data: data,
            success: function( data )
            {
        
            document.getElementById("success").innerHTML = data;
            },
            error: function(){
                alert('ERRO');
            }
        });

        return false;
    });
}); function countChar(val) {        var len = val.value.length;          $('#charNum').text(150 - len);      };
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAG6wX7egxtDlth16c9GexGYwgqBxKcAxs
&libraries=places&callback=initMap"
        async defer></script>
  </body>
</html>