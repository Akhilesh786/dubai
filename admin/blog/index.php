<!DOCTYPE html>
<html>
  <head>
    <title>Place ID Finder</title>
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
	<h2 class="text-center">BLOG</h2><br><br>
    </div>
	<div class="col-md-12">	<a href="add-blog.php" style="width:100%;" class="btn btn-primary">ADD BLOG POST </a>	<br><br>	<a href="edit-blog-list.php" style="width:100%;" class="btn btn-primary">EDIT BLOG POST</a>	<br><br>	<a href="approve-comment.php" style="width:100%;" class="btn btn-primary">APPROVE COMMENT</a>
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
});
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAG6wX7egxtDlth16c9GexGYwgqBxKcAxs
&libraries=places&callback=initMap"
        async defer></script>
  </body>
</html>