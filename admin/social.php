<?php 
include "config.php"; 
session_start();
include "auth.php";
$stmt = $dbh->query("SELECT * FROM user WHERE user.user_id='$userid'");
$row=$stmt->fetch();
$name=$row['f_name'];
$email=$row['email'];
$password=$row['password'];


$stmt1 = $dbh->query("SELECT * FROM info");
$row1=$stmt1->fetch();
$info_name=$row1['name'];
$info_title=$row1['title'];
$info_logo=$row1['logo'];
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
                        <div class="col-xl-12 col-lg-12" style="display:">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Social Media Links</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
								<?php 
$i = 1; 
$stmt1=$dbh->query("SELECT * FROM social");
while ($row1 = $stmt1->fetch()){ ?>
								    <form class="user">
                                        <div class="form-group">
										    <label>Facebook</label>
                                            <input type="text" name="email" class="form-control form-control-user" value="<?php echo $row1['facebook']; ?>" readonly >
                                        </div>
                                        <div class="form-group">
										    <label>Instagram</label>
                                            <input type="text" name="email" class="form-control form-control-user" value="<?php echo $row1['instagram']; ?>" readonly >
                                        </div>
                                        <div class="form-group">
										    <label>Youtube</label>
                                            <input type="text" name="email" class="form-control form-control-user" value="<?php echo $row1['youtube']; ?>" readonly >
                                        </div>
                                        <div class="form-group">
										    <label>Twitter</label>
                                            <input type="text" name="email" class="form-control form-control-user" value="<?php echo $row1['twitter']; ?>" readonly >
                                        </div>
										<a href="#" class="btn btn-primary btn-user btn-block" data-toggle="modal" data-target="#myModal">Edit</a>
                                        <hr>
										<p id="login-error" class="text-uppercase" style="color:red"></p>
                                    </form>
									<?php } ?>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Social Media Links</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
								<?php 
$i = 1; 
$stmt1=$dbh->query("SELECT * FROM social");
while ($row1 = $stmt1->fetch()){ ?>
								    <form class="user" method="POST" action="update/update_social.php">
                                        <div class="form-group">
										    <label>Facebook</label>
                                            <input type="text" name="facebook" class="form-control form-control-user" value="<?php echo $row1['facebook']; ?>" required >
                                        </div>
                                        <div class="form-group">
										    <label>Instagram</label>
                                            <input type="text" name="instagram" class="form-control form-control-user" value="<?php echo $row1['instagram']; ?>" required >
                                        </div>
                                        <div class="form-group">
										    <label>Youtube</label>
                                            <input type="text" name="youtube" class="form-control form-control-user" value="<?php echo $row1['youtube']; ?>" required >
                                        </div>
                                        <div class="form-group">
										    <label>Twitter</label>
                                            <input type="text" name="twitter" class="form-control form-control-user" value="<?php echo $row1['twitter']; ?>" required >
                                        </div>
										<input type="submit" class="btn btn-primary btn-user btn-block">
                                        <hr>
										<p id="login-error" class="text-uppercase" style="color:red"></p>
                                    </form>
									<?php } ?>
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
  
  
  
  
  
						
						   <div class="modal fade login-model" id="myModal1">
    <div class="modal-dialog login-model-dialog">
      <div class="modal-content card ">
      
        <!-- login Modal body -->
        <div class="modal-body login-body">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Logo</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
								    <form class="user" action="update/update_logo.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="file" name="image" required >
                                        </div>
										<input type="submit" name="submit" class="btn btn-primary btn-user btn-block" />
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
       url: 'update_info.php',
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