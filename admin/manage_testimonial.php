<?php 
   include "config.php"; 
   session_start();
   include "auth.php";
  
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Manage Testimonial Dashboard</title>
      <!-- Custom fonts for this template-->
      <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="css/sb-admin-2.min.css" rel="stylesheet">
	  <style>.ui-sortable-handle{
		  background: white;
    list-style-type: none;
    border-radius: 15px;
    padding: 22px;
    margin: 13px;
    color: blue;
	  }</style>
   </head>
   <body id="page-top">
      <!-- Page Wrapper -->
      <div id="wrapper">
         <!-- Sidebar -->
         <?php
            include "sidebar.php";
            ?>
         <!-- End of Sidebar -->
         <!-- Content Wrapper -->
         <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
               <?php include "navbar.php"; ?>
               <!-- End of Topbar -->
               <div class="container-fluid">
                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                     <h1 class="h3 mb-0 text-gray-800">Manage Testimonial Postion</h1>
                  </div>
                  <div class="row">
                     
                     <div class="col-xl-6 col-lg-6" style="display:">
                        <div class="row">
						<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">From Here You Can Manage Postion By Dragging Up and Down</h6>
                           </div>
                           <div class="col-xl-12 col-lg-12" id="tabs">
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
               <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                     <span>Copyright &copy; Your Website 2020</span>
                  </div>
               </div>
            </footer>
            <!-- End of Footer -->
         </div>
         <!-- End of Content Wrapper -->
      </div>
      <!-- End of Page Wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
      </a>
      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin-2.min.js"></script>
	  
    <script src="css/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="css/jquery-ui.css">
     
	<script>
  $(document).ready(function() {
    // Load the tabs from the server
    $.ajax({
      url: 'get_testimonial.php',
      dataType: 'json',
      success: function(tabs) {
        // Create the tabs dynamically
        $.each(tabs, function(index, tab) {
          $('<li>')
            .text(tab.company_name)
            .attr('data-id', tab.id)
            .appendTo('#tabs');
        });

        // Initialize the drag-and-drop functionality
        $('#tabs').sortable({
          axis: 'y',
          stop: function(event, ui) {
            // Get the current order of the tabs
            var order = [];
            $('#tabs li').each(function(index) {
              order.push($(this).attr('data-id'));
            });

            // Update the positions of the tabs in the database
            $.ajax({
              url: 'update_testimonial_page.php',
              method: 'POST',
              data: {
                order: order.join(',')
              },
              success: function() {
                console.log('Positions updated');
              },
              error: function() {
                console.log('Error');
              }
            });
          }
        });
      },
      error: function() {
        console.log('Error loading tabs');
      }
    });
  });
</script>
   </body>
</html>