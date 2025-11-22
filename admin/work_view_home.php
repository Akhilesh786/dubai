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
      <title>Dashboard</title>
      <!-- Custom fonts for this template-->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
                     <h1 class="h3 mb-0 text-gray-800">Work View Home</h1>
                  </div>
                  <div class="row">
                     <div class="col-xl-12 col-lg-12" style="display:">
                        <div class="card shadow mb-4">
                           <!-- Card Header - Dropdown -->
                           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">Add work</h6>
                           </div>
                           <!-- Card Body -->
                           <div class="card-body">
                              <form method="POST" id="add_work_cat">
                                 <div class="form-group">
                                    <label >Name</label>
                                    <select name="work" class="form-control" >
                                       <option value="">--Please select work--</option>
                                       <?php	$work_list = $dbh->query("SELECT * FROM work");
                                          while($work=$work_list->fetch()) { ?>
                                       <option value="<?php echo $work["id"];?>"><?php echo $work["work_title"];?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label for="contact-name"><strong>HEAD IMAGE</strong></label> <br>
                                    <span>Please Upload 710*710 For Best View</span>
                                    <input type="file" class="photo-include" style="display:non" name="photo" id="photo" style="height:auto;" required />
                                    <input type="hidden" class="get-photo" name="work-poster"/>
                                    <br />
                                    <span class="uploaded_image_display"><img src="" class="img-thumbnail uploaded_image" style="display:none; height:150px; width:auto;" /></span>
                                 </div>
                                 <input type="submit" value="S U B M I T" name="submit" style="width:100%;" class="btn btn-primary"/>
                              </form>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-6" style="display:">
                        <div class="row">
						<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">From Here You Can Delete</h6>
                           </div>
                           <div class="col-xl-12 col-lg-12" style="display:">
                              <?php
                                 $stmtwork = $dbh->query("SELECT b.work_title, a.* FROM `work_home_view`as a JOIN `work` as b ON a.`work_id`=b.`id`");
                                 while($rowwork=$stmtwork->fetch()) {
                                 
                                 ?>
                              <div class="col-xl-8 col-lg-8">
                                 <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row text-center align-items-center justify-content-between">
                                       <h6 class="m-0 font-weight-bold text-primary"><?php echo $rowwork['work_title']; ?></h6>
                                       <span class="close" onclick="delete_work('<?php echo $rowwork['id']; ?>')" style="cursor: pointer;">✗</span> 
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-6" style="display:">
                        <div class="row">
						<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">From Here You Can Manage Postion By Dragging</h6>
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
         $('#add_work_cat').submit(function(e) {
           e.preventDefault();
           $.ajax({
              type: "POST",
              url: 'add/add_work_view.php',
              data: $(this).serialize(),
              success: function(data)
              { 
         if(data){
          window.location.reload();
         }else{
          alert("please select work.")
         }
              }
          });
         });
         });
         
      </script>
      <script>
         $(document).ready(function(){
          $(document).on('change', '#photo', function(){
           var name = document.getElementById("photo").files[0].name;
           var form_data = new FormData();
           var ext = name.split('.').pop().toLowerCase();
           if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
           {
            alert("Invalid Image File");
           }
           var oFReader = new FileReader();
           oFReader.readAsDataURL(document.getElementById("photo").files[0]);
           var f = document.getElementById("photo").files[0];
           var fsize = f.size||f.fileSize;
           if(fsize > 2000000)
           {
            alert("Image File Size is very big");
           }
           else
           {
            form_data.append("file", document.getElementById('photo').files[0]);
            $.ajax({
             url:"upload-home-view-image.php",
             method:"POST",
             data: form_data,
             contentType: false,
             cache: false,
             processData: false,
             beforeSend:function(){
              $('.uploaded_image').show(500);
              $('.uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
             },   
             success:function(data)
             {
              $('.uploaded_image').show(500);
              $('.get-photo').attr("value",data);
              $('.uploaded_image').attr("src","../upload/homeviewimage/"+data);
              $('#uploadvalue-preview').attr("src",data);
             }
            });
           }
          });
         });
         
         
      </script>
      <script>
         function delete_work(id){
         	
         	
         				
         				
         				
         				var url="delete/delete_work_view_home.php";
         
         				 $.post(url,{"id":id},function(data){
         						  
         				
         					//alert(data);
         					if(data==1){
         						window.location.reload();
         					}else{
         						alert("something wents wrong.");
         					}
         				});
         	
         }
      </script>
	<script>
  $(document).ready(function() {
    // Load the tabs from the server
    $.ajax({
      url: 'get_tabs.php',
      dataType: 'json',
      success: function(tabs) {
        // Create the tabs dynamically
        $.each(tabs, function(index, tab) {
          $('<li>')
            .text(tab.work_title)
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
              url: 'update_tab_positions.php',
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