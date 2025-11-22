<?php 
   session_start();
   include "../auth.php";
   
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Add Sub Category</title>
      <base href="https://awesomesauce.in/admin/">
      <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="css/sb-admin-2.min.css" rel="stylesheet">
      <style>
         .ck-content{min-height:350px;}
      </style>
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
               <?php include "../navbar.php"; ?>
               <!-- End of Topbar -->
               <div class="container-fluid">
                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                     <h1 class="h3 mb-0 text-gray-800">Category Section</h1>
                  </div>
                  <div class="row">
                     <!-- Area Chart -->
                     <div class="col-xl-9 col-lg-7">
                     </div>
                     <!-- Pie Chart -->
                     <div class="col-xl-12 col-lg-12" style="display:">
                        <div class="card shadow mb-4">
                           <!-- Card Header - Dropdown -->
                           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">Enter Information</h6>
                           </div>
                           <!-- Card Body -->
						   
						   <div class="card-body mb-5">
						   <div class="d-sm-flex align-items-center justify-content-between mb-4">
							 <h1 class="h3 mb-0 text-gray-800">Add Category</h1>
						  </div>
                              <form method="POST" id="category">
							   
                                  <div class="form-group">
                                    <label for="usr"><strong>Name</strong></label>
                                    <input type="text" name="name" id="category_name" class="form-control"  placeholder="Name" required />
                                 </div>
                                
                                 <input type="submit" value="submit" name="submit" style="width:100%;" class="btn btn-primary"/>
                              </form>
                           </div>
                           <div class="card-body">
						   <div class="d-sm-flex align-items-center justify-content-between mb-4">
							 <h1 class="h3 mb-0 text-gray-800">Add Sub Category</h1>
						  </div>
                              <form method="POST" id="sub_category">
							   <div class="form-group">
                                    <label for="contact-name"><strong>HEAD IMAGE</strong></label> <br>
									<label for="contact-name"><strong>Please select 80*80 image for best view</strong></label> <br>
                                    <input type="file" class="photo-include" name="photo" id="photo" style="height:auto;" required />
                                    <input type="hidden" class="get-photo" name="profile">
                                    <br />
                                    <span class="uploaded_image_display">
									<img src="" class="img-thumbnail uploaded_image" style="height:150px; width:auto;" /></span>
                                 </div>
								 <div class="form-group">
                                    <label for="usr"><strong>Select Category</strong></label>
                                    <select name="course_category_id" class="form-control" >
									<?php 
										  include("./backend/database.php");
										  $database = new Database();
										 $data= $database->getData('course_category', '*','', '', 'asc',''); 
										// print_r($data);
										 foreach ($data as $item) {
											echo '<option value="'.$item['id'].'">'.$item['name'].'</option>'; 
											 
										 }
										 ?>									
									</select>
                                 </div>
                                  <div class="form-group">
                                    <label for="usr"><strong>Name</strong></label>
                                    <input type="text" name="name" class="form-control" value="" placeholder="Name" required />
                                 </div> 
                                 <div class="form-group">
                                    <label for="usr"><strong>Enter Short Description</strong></label>
                                    <textarea   maxlength="380" name="short_description" class="form-control" placeholder="Write Short Description" required ></textarea>
                                 </div>
                                
                                 <input type="submit" value="submit" name="submit" style="width:100%;" class="btn btn-primary"/>
                              </form>
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
                     <span>Copyright &copy; Your Website 2021</span>
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
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script><script>
         $(document).ready(function() {
         $('#sub_category').submit(function(e) {
           e.preventDefault();
		   var form_data = new FormData(this);
           form_data.append("action", "sub_category");
           $.ajax({
              type: "POST",
              url: '<?php echo $base_url; ?>backend/insert.php',
              data:form_data,
			  cache:false,
			  contentType: false,
			  processData: false,
              success: function(data)
              { 
			  alert(data);
			  if(data){
				   window.location.reload();
			  }
              }
          });
         });
		 $('#category').submit(function(e) {
           e.preventDefault();
		   var form_data = new FormData();
           form_data.append("action", "category");
		   form_data.append("name", $("#category_name").val());
           $.ajax({
              url: '<?php echo $base_url; ?>backend/insert.php',
              method:"POST",
             data: form_data,
             contentType: false,
             cache: false,
             processData: false,
              success: function(data)
              { 
			  alert(data);
			  if(data){
				   window.location.reload();
			  }
              }
          });
         });
         });
         
      </script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin-2.min.js"></script>
      <script src="js/ckeditor.js"></script>
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
             url:"<?php echo $base_url; ?>upload-image.php",
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
              $('.uploaded_image').attr("src",'<?php echo $base_url; ?>/images/logo_icon/'+data);
              $('#uploadvalue-preview').attr("src",data);
             }
            });
           }
          });
         });
         
      </script>
      
      
   </body>
</html>