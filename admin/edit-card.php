<?php 
include "config.php"; 
session_start();
include "auth.php";
$c_id=$_GET['id'];
$stmt = $dbh->query("SELECT * FROM user WHERE user.u_id='$userid'");
$row=$stmt->fetch();
$name=$row['full_name'];
$email=$row['email'];
$password=$row['password'];


$stmt1 = $dbh->query("SELECT * FROM card WHERE card.c_id='$c_id'");
$row1=$stmt1->fetch();

 $_SESSION["cc_id"] = $row1['c_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

	
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/dropzone.css">
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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
                        <h1 class="h3 mb-0 text-gray-800">Edit Card Id "<?php echo $row1['card_id']; ?>"</h1>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-lg-3">
<div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit</h6>
                                </div>
                                <div class="card-body">
		  <form method="post" class="display_results" action="" >
            <input type="hidden" name="c_id" value="<?php echo $c_id; ?>" />
            <input type="hidden" name="edit_card" value="card" />
            <input type="submit" class="btn btn-facebook btn-block" style="width:100%;" value="Edit Card Information"/>
		  </form>
		  
		  
		  
		  <form method="post" class="display_results" action="" >
            <input type="hidden" name="c_id" value="<?php echo $c_id; ?>" />
            <input type="hidden" name="edit_card" value="social" />
            <input type="submit" class="btn btn-facebook btn-block" style="width:100%;" value="Edit Social Links"/>
		  </form>
		  
		  
		  
		  <form method="post" class="display_results" action="" >
            <input type="hidden" name="c_id" value="<?php echo $c_id; ?>" />
            <input type="hidden" name="edit_card" value="product" />
            <input type="submit" class="btn btn-facebook btn-block" style="width:100%;" value="Edit Product Photos"/>
		  </form>
		  
		  
		  
		  <form method="post" class="display_results" action="" >
            <input type="hidden" name="c_id" value="<?php echo $c_id; ?>" />
            <input type="hidden" name="edit_card" value="gallery" />
            <input type="submit" class="btn btn-facebook btn-block" style="width:100%;" value="Edit Gallery Photos"/>
		  </form>
		  
		  
		  
		  <form method="post" class="display_results" action="" >
            <input type="hidden" name="c_id" value="<?php echo $c_id; ?>" />
            <input type="hidden" name="edit_card" value="service" />
            <input type="submit" class="btn btn-facebook btn-block" style="width:100%;" value="Edit Services Photos"/>
		  </form>
		  
		  
		  
		  <form method="post" class="display_results" action="" >
            <input type="hidden" name="c_id" value="<?php echo $c_id; ?>" />
            <input type="hidden" name="edit_card" value="number" />
            <input type="submit" class="btn btn-facebook btn-block" style="width:100%;" value="Edit Phone Number"/>
		  </form>
		  

                                </div>
                            </div>
                        <!-- Area Chart -->

                        <!-- Pie Chart -->
						
						
								
						
						
						
                    </div>
					
					
					<div class="col-lg-9 order-2 order-lg-1">
                <div id="display"></div>
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
	<script>
	$(document).ready(function() {
  $('.display_results').submit(function(e) {
    e.preventDefault();
    $.ajax({
       type: "POST",
       url: 'display_card.php',
       data: $(this).serialize(),
       success: function(data)
       {
             document.getElementById("display").innerHTML = data;
          
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