<?php 
   session_start();
   include "../auth.php";
   
   
   

   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <base href="https://awesomesauce.in/admin/">
      <title>Course listing -academy</title>
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
            include "./sidebar.php";
            ?>
         <!-- End of Sidebar -->
         <!-- Content Wrapper -->
         <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
               <?php include "../navbar.php"; ?>
               <!-- End of Topbar -->
               <div class="container-fluid">
                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                     <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                  </div>
                  <div class="row">
                     
                     <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                           <!-- Card Header - Dropdown -->
                           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">All Courses</h6>
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
                                                   <th >course_name</th>
                                                   <th >duration</th>
                                                   <th >Action</th>
                                                  </tr>
                                             </thead>
                                             <?php 
                                                include("./backend/database.php");
												  $database = new Database();
												 $data= $database->getData('course_detail', '*','', '', 'asc',''); 
												$i=0;
												 foreach ($data as $row) { ?>
                                             <tbody>
                                                <tr>
                                                   <td class="sorting_1"><?php echo $i++ ; ?></td>
                                                   <td><?php echo $row['course_name'] ; ?></td>
                                                   <td><?php echo $row['duration'] ; ?></td>
                                                   <td><a href="" class="btn btn-danger btn-user btn-block">Delete</a>
												   <a href="" class="btn btn-primary btn-user btn-block">Edit</button></a>
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