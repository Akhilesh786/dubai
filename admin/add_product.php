<?php include "config.php";

session_start();
error_reporting(0);

$product_name=$_POST['product_name'];
$short_desc=$_POST['short_desc'];
$full_desc=$_POST['full_desc'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
$featured=1;
$active=1;
$sub_id=$_POST['sub_list'];

$stmt = $dbh->prepare("INSERT INTO products (product_name, product_slug, short_description, full_description, price, quantity, is_featured, is_active)  
  VALUES (:product_name, 0, :short_description, :full_description, :price, :quantity, :is_featured, :is_active)");
  
 $stmt->bindParam(':product_name', $product_name);
 $stmt->bindparam(':short_description', $short_desc);
 $stmt->bindParam(':full_description', $full_desc);
 $stmt->bindParam(':price', $price);
 $stmt->bindParam(':quantity', $quantity);
 $stmt->bindParam(':is_featured', $featured);
 $stmt->bindParam(':is_active', $active);
 
 $stmt->execute();
 
 $last_id = $dbh->lastInsertId();
 $_SESSION["pro_id"]=$last_id;
 
 
$product_slug= str_replace(" ","-",$product_name)."-".$last_id;


 $stmt = $dbh->prepare("UPDATE products SET product_slug=:product_slug WHERE products.id='$last_id'");
	$stmt->bindParam(':product_slug', $product_slug);	
    $stmt->execute();
	
 
 $stmt1 = $dbh->prepare("INSERT INTO sub_pro (product_id, sub_id)  
  VALUES (:pro_id, :sub_id)");
  
 $stmt1->bindParam(':pro_id', $last_id);
 $stmt1->bindParam(':sub_id', $sub_id);
 
 $stmt1->execute();
 
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
        <link href="css/dropzone.css" rel="stylesheet" type="text/css">
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
                                    <h6 class="m-0 font-weight-bold text-primary">Website Information</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
								    <form action="add/add_image.php" class="dropzone" id="dropzonewidget">
                
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
                        <span>Copyright &copy; Your Website 2021</span>
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
    <script src="js/ckeditor.js"></script>
        <script src="js/dropzone.js" type="text/javascript"></script>



</body>

</html>