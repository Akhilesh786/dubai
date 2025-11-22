<?php 
include "config.php"; 
session_start();
include "auth.php";


if($_GET["department_id"]){
$stmt=$dbh->query("SELECT * FROM carrer_department where department_id='".$_GET["department_id"]."' ");
									$row = $stmt->fetch();
									//print_r($row);
}

$edit=@$_GET["edit"];

$stmt_edit=$dbh->query("SELECT * FROM `careers_listing` where career_id='".$edit."' ");
									$row_edit = $stmt_edit->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin-Careers</title>

	
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
                                    <h6 class="m-0 font-weight-bold text-primary">Webaite Information</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
								    
						<form method="POST" id="add_list_careers">
	
							<div class="form-group">
							<label for="usr">Department</label>
							<input type="text" name="department" class="form-control" placeholder="Enter Department" value="<?php echo $row["department_name"];?>" readonly />
							</div>
							
							<input type="hidden" name="department_id" value="<?php echo $row["department_id"];?>"/>
							<input type="hidden" name="profile_id" value="<?php echo $row_edit["career_id"];?>"/>
							
							<div class="form-group">
							<label for="usr">Profile	</label>
							<textarea name="profile" class="form-control" placeholder="Enter Profile" ><?php echo $row_edit["profile"];?></textarea>
							</div>
							<div class="form-group">
							<label for="usr">Job Description	</label>
							<textarea name="job_description" class="form-control" placeholder="Enter Job Description" ><?php echo $row_edit["job_description"];?></textarea>
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
  $('#add_list_careers').submit(function(e) {
    e.preventDefault();
    $.ajax({
       type: "POST",
       url: 'add/add_list_careers.php',
       data: $(this).serialize(),
       success: function(data)
       { 
	   if(data){
		   <?php if($edit){?>
		   alert("Your Listing Updated");
		  
	       window.location = 'add-careers-description.php?edit=1&id='+data;
		   
		   <?php }else{?>
		   alert("Added In Your Listing.");
		  
	       window.location = 'add-careers-description.php?id='+data;
		   <?php } ?>
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