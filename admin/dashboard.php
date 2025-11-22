<?php 
include "config.php"; 
session_start();
include "auth.php";
$stmt = $dbh->query("SELECT * FROM admin WHERE admin.id='$userid'");
$row=$stmt->fetch();
$name=$row['name'];
$email=$row['email'];
$password=$row['password'];
$s_admin=$row['s_admin'];
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-9 col-lg-7">
						
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5" style="display:">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">User Details</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
								    <form class="user">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control form-control-user" value="<?php echo $name; ?>" readonly >
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control form-control-user" value="<?php echo $email; ?>" readonly >
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="password" class="form-control form-control-user" value="<?php echo $password; ?>" readonly >
                                        </div>
										<a href="#" class="btn btn-primary btn-user btn-block" data-toggle="modal" data-target="#myModal">Edit</a>
                                        <hr>
										<p id="login-error" class="text-uppercase" style="color:red"></p>
                                    </form>
                                </div>
                            </div>
                        </div>
						
						
						
						
						
						
						   <div class="modal fade login-model" id="myModal">
    <div class="modal-dialog login-model-dialog">
      <div class="modal-content card ">
      
        <!-- login Modal body -->
        <div class="modal-body login-body">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">User Details</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
								    <form class="user"  id="updateuser" action="" method="POST">
									<input type="hidden" value="<?php echo $userid ; ?>" name="userid" />
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control form-control-user" value="<?php echo $name; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" value="<?php echo $email; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="password" class="form-control form-control-user" value="<?php echo $password; ?>" >
                                        </div>
										<button class="btn btn-primary btn-user btn-block" data-toggle="modal" data-target="#myModal">Submit</button>
                                        <hr>
										<p id="login-error" class="text-uppercase" style="color:red"></p>
                                    </form>
                                </div>
                            </div>
	<p id="update-error" class="text-center"></p>
		</div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
		
          <button type="button" class="btn btn-danger login-close" data-dismiss="modal">Close</button>
        </div>
        
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script><script>
		$(document).ready(function() {
  $('#updateuser').submit(function(e) {
    e.preventDefault();
    $.ajax({
       type: "POST",
       url: 'update_user.php',
       data: $(this).serialize(),
       success: function(data)
       { 
          window.location = 'dashboard.php';
       }
   });
 });
});

</script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

	
</body>

</html>