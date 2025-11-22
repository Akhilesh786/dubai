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

    <title>Admin -Career List</title>

	
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
                        <div class="col-xl-12 col-lg-12" style="display:">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Add New Department</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
								   	<a href="add_careers-department.php" class="btn btn-primary btn-user btn-block">Add Department</a>
									
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12">
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
								<table class="table table-bordered dataTable" id="dataTable">
                                    <thead>
                                        <tr role="row">
										<th >S.No</th>
										<th >Department Name</th>
										<th >Profile</th>
										<th >Action</th>
                                    </tr>
									</thead>
									
									<?php 
									$i = 0; 
									$stmt=$dbh->query("SELECT * FROM carrer_department  ORDER BY `carrer_department`.`department_id` DESC");
									while ($row = $stmt->fetch()){ 
									$i++ ;
									?>
									
                                              <tbody>
						                        <tr>
                                                <td><?php echo $i; ?></td>
                                               
                                                <td><?php echo $row['department_name']; ?></td>
                                                <td>
												<a href="view_career_profile.php?profile_id=<?php echo $row['department_id']; ?>" >View Profile(<?php echo profile($row["department_id"],$dbh); ?>)</a></td>
                                                <td><button id="status_change" class="<?php if($row['status']==1){ echo 'btn btn-primary btn-user btn-block';}else{ echo ' btn btn-danger btn-user btn-block';} ?>" onclick="status('<?php echo $row['department_id']; ?>');"><?php if($row['status']==1){ echo 'Active';}else{ echo 'Deactive';} ?></button></br>
													<a href="add-list-careers.php?department_id=<?php echo $row['department_id']; ?>" class="btn btn-primary btn-user btn-block">ADD Profile And Description </a>
                                                </td>
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

    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
	<script>
	
	function status(id){
   	
   	var url='add/action.php';
   
                    $.post(url,{"id":id,"action":"department_active"},function(data){
   						
						if(data=="btn btn-primary btn-user btn-block"){ $("#status_change").html("Active");}else{$("#status_change").html("Deactive");}
						
   						$("#status_change").removeClass()
   						$("#status_change").addClass(data);
   						
   				});
   	
   }
	
	
	
	</script>

	<?php 
		
		function profile($department_id,$dbh){
			
			$stmt=$dbh->query("SELECT * FROM `careers_listing` where  `department_id`='".$department_id."'");
									echo $row = $stmt->rowCount();
									
			
		}
	
	?>
</body>

</html>