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
      <title>Testimonial</title>
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
                     <div class="col-xl-12 col-lg-12" style="display:">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Add New Testimonial</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
								   	<a target="_blank" href="add-testimonial.php" class="btn btn-primary ">Add</a>
									<a target="_blank" href="manage_testimonial.php" class="btn btn-primary ">Manage Testimonial</a>
									
                                </div>
                            </div>
                        </div>
                     <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                           <!-- Card Header - Dropdown -->
                           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">All Testimonial</h6>
                           </div>
                           <!-- Card Body -->
                           <div class="card-body">
                              <div class="table-responsive mt-4">
                                 <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <table class="table table-bordered dataTable" id="dataTable" >
                                             <thead>
                                                <tr>
                                                   <th >S.No</th>
                                                   <th >Name</th>
                                                   <th >Company Name</th>
                                                   <th >Testimonial Content</th>
                                                   <th >Profile</th>
                                                   <th >Action</th>
                                                  
                                                </tr>
                                             </thead>
                                             <?php 
                                                $i = 1; 
                                                $stmt=$dbh->query("SELECT * FROM testimonial ORDER BY `testimonial`.`id` DESC");
                                                while ($row = $stmt->fetch()){ ?>
                                             <tbody>
                                                <tr>
                                                   <td class="sorting_1"><?php echo $i++ ; ?></td>
                                                   <td><?php echo $row['name'] ; ?></td>
                                                   <td><?php echo $row['company_name'] ; ?></td>
                                                   <td><?php echo $row['testimonial_content'] ; ?></td>
												   <td><img src="../upload/<?php echo $row['profile'] ; ?>" style="width: 200px;"></td>
                                                   <td><a href="delete/testimonial_delete.php?test_id=<?php echo $row['id'] ; ?>" class="btn btn-danger btn-user btn-block">Delete</a>
												   <a href="add-testimonial.php?edit=<?php echo $row['id'] ; ?>" class="btn btn-primary btn-user btn-block">Edit</button></a>
												</tr>
                                             </tbody>
                                             <?php } ?>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <footer class="sticky-footer bg-white">
               <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                     <span>Copyright &copy; Your Website 2020</span>
                  </div>
               </div>
            </footer>
         </div>
      </div>
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
      </a>
     
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	 
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <script src="js/sb-admin-2.min.js"></script>
   </body>
</html>