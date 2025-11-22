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

    <title>Admin-Careers Department</title>

	
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
             <?php include "navbar.php"; ?>
                <!-- End of Topbar -->

              <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        
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
                                    <h6 class="m-0 font-weight-bold text-primary">Certificate Information</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
								    
						<form method="POST" id="genrate_certificate">
	
							<div class="form-group">
							<label for="usr">Name</label>
							<input type="text" name="name" class="form-control" placeholder="Enter Name" value=""/>
							</div>
							<div class="form-group">
							<label for="usr">Date</label>
							<input type="date" name="date" class="form-control" />
							</div>
							<div class="form-group">
							<label for="usr">Line 1</label>
							<input type="text" name="line1" class="form-control" placeholder="Enter Line 1" maxlength ="46" />
							</div>
							<div class="form-group">
							<label for="usr">Line 2</label>
							<input type="text" name="line2" class="form-control" placeholder="Enter Line 2" maxlength ="46" />
							</div>
							<div class="form-group">
							<label for="usr">Skill</label>
							<input type="text" name="skill" class="form-control" placeholder="Enter comma speprated skill for i.e Opportunity Identification,Entrepreneurship" >
							</div>
							<div class="form-group">
							<label for="usr">Description</label>
							<input type="text" name="description" class="form-control" placeholder="Enter description about student" maxlength ="46" />
							</div>
							
							
							<input type="submit" value="S U B M I T" name="submit" style="width:100%;" class="btn btn-primary"/>

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
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script><script>
		$(document).ready(function() {
		  $('#genrate_certificate').submit(function(e) {
			e.preventDefault();
			$.ajax({
			   type: "POST",
			   url: 'genrate.php',
			   data: $(this).serialize(),
			   success: function(data)
			   { 
			   if(data){
				 window.location.href="view_certificate.php";
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
	



</body>

</html>