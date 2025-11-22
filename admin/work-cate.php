<?php 
include "admin/config.php"; 
session_start();
include "auth.php";
$stmt = $dbh->query("SELECT * FROM admin WHERE admin.id='$userid'");
$row=$stmt->fetch();
$name=$row['name'];
$email=$row['email'];
$password=$row['password'];

$work_id=$_GET['id'];
$work_cate=$_GET['name'];
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
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $work_cate; ?></h1>
                    </div>

                    <div class="row">

                        <!-- Area Chart -->
                       <div class="col-xl-12 col-lg-12" style="display:">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Add </h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
								   	<a href="add-work.php?id=<?php echo $work_id;?>&name=<?php echo $work_cate ;?>" class="btn btn-primary btn-user btn-block">Click Here</a>
									
                                </div>
                            </div>
                        </div>
						

                        <!-- Pie Chart -->
                        <div class="col-xl-8 col-lg-8" style="display:">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">All Works</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
								    	<?php 
										$stmt=$dbh->query("SELECT * FROM work WHERE work.work_id='$work_id' ORDER BY `work`.`entr_date` DESC ");	 
	while ($row = $stmt->fetch()) { ?>    
    <!-- Blog Post -->      
	<div class="card mb-4 blog">        
	<img class="card-img-top" src="../upload/<?php echo $row['work_image']; ?>" alt="Card image cap" style="display:non; max-width:450px;">   
	<div class="card-body">           
	<h2 class="card-title blog-title">
	<?php echo $row['work_title']; ?>
	</h2>		
	<hr style="height:1px;"> 		
	<div style="display:flex;">   
	<a href="edit-work.php?id=<?php echo $row['id']; ?>" class="blog-link btn btn-primary">Edit This Work Post &rarr;</a>	
	&nbsp; &nbsp; 			
	<form method="POST" action="delete/delete_work.php">	
	<input type="hidden" value="<?php echo $row['id']; ?>" name="id" />
	<input type="hidden" value="<?php echo $work_cate; ?>" name="work-cate" />
	<input type="hidden" value="<?php echo $work_id; ?>" name="work-id" />	
	<input type="submit" value="Delete" name="submit" class="btn btn-danger" />	
	</form>		
	</div>       
	</div>      
    <div class="card-footer text-muted blog-date">    
	Posted on <strong><?php echo $row['entr_date']; ?></strong>  
	</div>  
	</div>		
	<?php } ?> 
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
    url:"upload-image.php",
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
     $('.uploaded_image').attr("src",data);
     $('#uploadvalue-preview').attr("src",data);
    }
   });
  }
 });
});

</script>
	
</body>

</html>