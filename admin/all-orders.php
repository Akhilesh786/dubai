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
                        <div class="col-xl-12 col-lg-12">
						   <div class="col-md-12 order-md-1">
          <h4 class="mb-3">All Orders</h4>
		  </h3>
		  
			<br>
			<br>
			<?php  
			error_reporting(0);
			// get orders from user id
			 $stmtorders = $dbh->query("SELECT * FROM orders");
			 while ($roworders=$stmtorders->fetch())
			 { 
			$i=0;
			 $order_no=$roworders['order_no'];
			 $total_price=$roworders['total_price'];
			 $buyer_id=$roworders['user_id'];
			 $address_id=$roworders['address_id'];
			 
			 $stmtaddress = $dbh->query("SELECT * FROM address WHERE address.address_id='$address_id'");
			 $rowaddress=$stmtaddress->fetch();
			 
			 $stmtuser = $dbh->query("SELECT * FROM user WHERE user.id='$buyer_id'");
			 $rowuser=$stmtuser->fetch();
			    ?>
				
				
			<div class="card">
  <div class="card-header"><strong style="color:#000;letter-spacing: 1px;font-weight: 900;">Order No: <?php echo $roworders['order_no'];?></strong></div>
   <div class="card-body">
   <p class="text-capitalize"><strong><?php echo $rowuser['f_name']." ".$rowuser['l_name'];?></strong></p>
   <p class="text-capitalize"><strong><?php echo $rowaddress['address'];?></strong></p>
   <p class="text-capitalize"><strong><?php echo $rowaddress['address2'];?></strong></p>
   <p class="text-capitalize"><strong><?php echo $rowaddress['city'].", ".$rowaddress['country'].", ".$rowaddress['zip_code'];?>.</strong></p>
   <p class="text-capitalize"><strong><?php echo $rowuser['phone'];?></strong></p>
   
    <table class="table table-bordered table table-striped">
    <thead>
      <tr class="table-primary">
        <th>Item No</th>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
  <?php
			 $stmtdetails = $dbh->query("SELECT * FROM order_details WHERE order_details.order_no='$order_no'");
			 while ($rowdetails=$stmtdetails->fetch())
			{
			  $product_id=$rowdetails['product_id'];
			  
			
			?>
			
 
      <tr>
        <td><?php echo ++$i ; ?></td>
        <td><?php echo $rowdetails['product_name'];?></td>
        <td>Rs. <?php echo moneyFormatIndia($rowdetails['product_price']);?>/-</td>
        <td><?php echo $rowdetails['qty'];?></td>
        <td>Rs. <?php echo moneyFormatIndia($rowdetails['total_price']);?>/-</td>
      </tr>

			
					<?php }  ?> 
    </tbody>
  </table>
  </div>  <div class="card-footer"><strong>Rs. <?php echo moneyFormatIndia($roworders['total_price']);?>/-</strong><strong style="float:right;">Ordered On: <?php echo $roworders['created_at'];?></strong>
 
 </div>
</div>

<br>
<?php } ?>
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