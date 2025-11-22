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


                        <!-- Pie Chart -->
                        <div class="col-xl-3 col-lg-3" style="display:">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">User Details</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
										<a href="#" class="btn btn-primary btn-user btn-block" data-toggle="modal" data-target="#myModal">Add New User</a>
                                </div>
                            </div>
                        </div>
						
						
						<div class="col-xl-9 col-lg-9">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
								
									<div class="table-responsive mt-4">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
								<div class="row"><div class="col-sm-12">
								<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: auto">S.No</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: auto">Name</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: auto">Email</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: auto">Password</th>
                                    </tr>
									</thead>
									
												<?php
												 $i=0;
												$stmtuser = $dbh->query("SELECT * FROM admin EXCEPT SELECT * FROM admin WHERE admin.s_admin='1'");
while($rowuser=$stmtuser->fetch()) {
 ?>						
                                              <tbody>
						                        <tr role="row" class="odd">
                                                <td class="sorting_1"><?php echo ++$i; ?></td>
                                                <td><?php echo $rowuser['name'];?></td>
                                                <td><?php echo $rowuser['email'];?></td>
                                                <td><?php echo $rowuser['password'];?></td>
                                                <td>

														  
										<button class="btn btn-primary btn-user btn-block" data-toggle="modal" data-target="#myModal<?php echo $rowuser['id'];?>">Edit</button>
                                               
											   </td>
											   <td>
														  <form class="user" id="updatuser" action="delete/delete_admin_user.php" method="POST">
														  <input type="hidden" value="<?php echo $rowuser['id'];?>" name="id">
										<button class="btn btn-danger btn-user btn-block">Delete</button>
                                                           </form>
                                               </td>
                                                </tr>
											  </tbody>
											  
											  
											  
											  
						   <div class="modal fade login-model" id="myModal<?php echo $rowuser['id'];?>">
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
								    <form class="user update_admi" action="update/update_admin_user.php" method="POST">
														  <input type="hidden" value="<?php echo $rowuser['id'];?>" name="id">
                                        <div class="form-group">
                                            <input type="text" name="name" value="<?php echo $rowuser['name'];?>" class="form-control form-control-user" >
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" value="<?php echo $rowuser['email'];?>" class="form-control form-control-user" >
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="password" value="<?php echo $rowuser['password'];?>" class="form-control form-control-user" >
                                        </div>
										<input type="submit" class="btn btn-primary btn-user btn-block" value="Update"/>
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
  
  
											  
											  
											  <?php } ?>
															
											  											  
											  
											  
                                </table></div></div></div>
                            </div>
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
								    <form class="user" id="adduser" action="" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Full Name" class="form-control form-control-user" >
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Email" class="form-control form-control-user" >
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="password" placeholder="Password" class="form-control form-control-user" >
                                        </div>
										<input type="submit" class="btn btn-primary btn-user btn-block" value="Add"/>
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
  $('#adduser').submit(function(e) {
    e.preventDefault();
    $.ajax({
       type: "POST",
       url: 'add/add-user.php',
       data: $(this).serialize(),
       success: function(data)
       { if(data=='success') {
          window.location = 'add-user.php';
		  //console.log(data);
       } else if(data=='email'){
	     alert('email already registered');
	   }
	   }
   });
 });
});

</script>
<script>
		$(document).ready(function() {
  $('.update_admin').submit(function(e) {
    e.preventDefault();
    $.ajax({
       type: "POST",
       url: 'update/update_admin_user.php',
       data: $(this).serialize(),
       success: function(data)
       { if(data=='success') {
          window.location = 'add-user.php';
		  //console.log(data);
       } else if(data=='email'){
	     alert('Email already registered');
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

	
</body>

</html>