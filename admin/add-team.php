<?php 
include "config.php"; 
session_start();
include "auth.php";


if($_GET["id"]){
$stmt=$dbh->query("SELECT * FROM team where id='".$_GET["id"]."' ");
									$row = $stmt->fetch();
									//print_r($row);
}
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
								    
						<form method="POST" id="adduser">
	
                            <div class="form-group">
                                <label for="contact-name">Photo</label><br> 
								<input type="file" class="photo-include" style="display:non" name="photo" id="photo" style="height:auto;"  />
								<input type="hidden" class="get-photo" name="photo"/ value="<?php echo $row["profile"]; ?>">
								<input type="hidden" class="edit" name="edit" value="<?php echo $_GET["id"]; ?>"/>
							<br />
								<span class="uploaded_image_display"></span></br><img src="../upload/team/<?php echo $row["profile"]; ?>" class="img-thumbnail uploaded_image" style="display:<?php if($_GET["id"]){ echo "block"; }else{ echo "none"; }?>; height:150px; width:auto;" />
  
							</div>
							<div class="form-group">
							<label for="usr">Full Name</label>
							<input type="text" name="name" class="form-control" placeholder="Full Name" value="<?php echo $row["name"];?>"/>
							</div>
							
							<div class="form-group">
							<label for="usr">designation	</label>
							<textarea name="designation" class="form-control" placeholder="Designation [use </br> for next line]" ><?php echo $row["designation"];?></textarea>
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
  $('#adduser').submit(function(e) {
    e.preventDefault();
    $.ajax({
       type: "POST",
       url: 'add/add_team.php',
       data: $(this).serialize(),
       success: function(data)
       { 
	   if(data==1){
	   window.location = 'team.php';
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
    url:"Team-image.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('.uploaded_image').show(500);
     $('.uploaded_image_display').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
		$('.uploaded_image_display').hide();
     $('.uploaded_image').show(500);
     $('.get-photo').attr("value",data);
     $('.uploaded_image').attr("src","../upload/team/"+data);
     $('#uploadvalue-preview').attr("src",data);
    }
   });
  }
 });
});

</script>



</body>

</html>