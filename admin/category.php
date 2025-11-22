<?php 
include "config.php"; 
session_start();
include "auth.php";
$stmt = $dbh->query("SELECT * FROM admin WHERE admin.id='$userid'");
$row=$stmt->fetch();
$name=$row['name'];
$email=$row['email'];
$password=$row['password'];


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
                        <div class="col-xl-6 col-lg-6" style="display:">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
								    <form class="user" action="add/add_cate.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control form-control-user" placeholder="Category" required >
                                        </div>
										<input type="submit" name="submit" class="btn btn-primary btn-user btn-block" />
										<hr>
										<p id="login-error" class="text-uppercase" style="color:red"></p>
                                    </form>
                                </div>
                            </div>
                        </div>	
                        <!-- Pie Chart -->
                        <div class="col-xl-6 col-lg-6" style="display:">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Add Sub-Category</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
								    <form class="user" action="add/add_sub_cate.php" method="POST">
                                       
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control form-control-user" placeholder="Add Sub Category" required >
                                        </div>
										<input type="submit" name="submit" class="btn btn-primary btn-user btn-block" />
										<hr>
										<p id="login-error" class="text-uppercase" style="color:red"></p>
                                    </form>
                                </div>
                            </div>
                        </div>	
                        


                        <div class="col-xl-8 col-lg-8">
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
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: auto">Sub Category</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: auto">Action</th>
                                    </tr>
									</thead>
									
									<?php 
$i = 1; 
$stmt=$dbh->query("SELECT * FROM category");
while ($row = $stmt->fetch()){ 
$cate_id=$row['cate_id']; 
?>
									
                                              <tbody>
						                        <tr role="row" class="odd">
                                                <td class="sorting_1"><?php echo $i++ ; ?></td>
                                                <td><strong class="text-capitalize"><?php echo $row['name'] ; ?></strong>
												<hr>
								    <form class="user" action="add/add_sub_cate_id.php" method="POST">
                                       
                                        <div class="form-group">
										<label>Add a sub category</label>
										<select class="form-control  form-control-use" name="sub_id" required>
	                           <option></option>
									<?php 
$stmt1=$dbh->query("SELECT * FROM sub_category");
while ($row1 = $stmt1->fetch()){ ?>
        <option value="<?php echo $row1['sub_id']; ?>"><?php echo $row1['name']; ?></option>
		<?php } ?>
      </select>
                                         </div>
										 <input type="hidden" value="<?php echo $cate_id;?>" name="cate_id" />
										<input type="submit" name="submit" class="btn btn-success btn-user btn-block" style="padding: 6px;border-radius: 4px;font-weight: 600;letter-spacing: 1px;text-transform: uppercase;" />
										<hr>
										<p id="login-error" class="text-uppercase" style="color:red"></p>
                                    </form>
												
												</td>
												
												
												
                                                <td>
													  <ul>
												<?php
												
                                                   $stmtsub=$dbh->query("SELECT * FROM sub_cate, sub_category WHERE sub_cate.cate_id='$cate_id' AND sub_cate.sub_id=sub_category.sub_id");
                                                      while ($rowsub = $stmtsub->fetch()){ 
													  
													  ?>
													  <li><?php echo $rowsub['name']; ?> <a href="delete/delete_sub.php?sub_id=<?php echo $rowsub['sub_id'];?>&cate_id=<?php echo $cate_id;?>" class="" style="color:red;width: 20%;display: inline-block;padding: 0px;"> Remove </a></li>
													<?php  } 
													  ?>
													  </ul>
													  </td>
											    <td><form method="post" class="display_results" action="delete/delete_category.php" >
            <input type="hidden" name="cate_id" value="<?php echo $row['cate_id']; ?>" />
            <input type="submit" class="btn btn-google btn-block" style="width:100%;" value="Delete"/>
		  </form></td>
											   </tr>
											  </tbody>
											  <?php } ?>
											  
											  
											  
                                </table></div></div></div>
                            </div>
                                </div>
                            </div>
                        </div>	





                        <div class="col-xl-4 col-lg-4">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">All Sub Categories</h6>
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
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: auto">Action</th>
                                    </tr>
									</thead>
									
									<?php 
$i = 1; 
$stmt=$dbh->query("SELECT * FROM sub_category");
while ($row = $stmt->fetch()){ 
$cate_id=$row['sub_id']; 
?>
									
                                              <tbody>
						                        <tr role="row" class="odd">
                                                <td class="sorting_1"><?php echo $i++ ; ?></td>
                                                <td><strong class="text-capitalize"><?php echo $row['name'] ; ?></strong>
												
												</td>
												
												
											    <td><form method="post" class="display_results" action="delete/delete_sub_category.php" >
            <input type="hidden" name="sub_id" value="<?php echo $row['sub_id']; ?>" />
            <input type="submit" class="btn btn-google btn-block" style="width:100%;" value="Delete"/>
		  </form></td>
											   </tr>
											  </tbody>
											  <?php } ?>
											  
											  
											  
                                </table></div></div></div>
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