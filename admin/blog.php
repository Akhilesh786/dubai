<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>admin</title>
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
         <?php include 'sidebar.php'; ?>
         <!-- Content Wrapper -->
         <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
               <div class="container-fluid">
                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                     <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                  </div>
                  <div class="row">
                     <div class="col-xl-12 col-lg-12" style="display:">
                        <div class="card shadow mb-4">
                           <!-- Card Header - Dropdown -->
                           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">Add Blog Category</h6>
                           </div>
                           <!-- Card Body -->
                           <div class="card-body">
                              <form class="user" action="add/add_blog_cate.php" method="POST">
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
                     <!-- Area Chart -->
                     <div class="col-xl-12 col-lg-12" style="display:">
                        <div class="card shadow mb-4">
                           <!-- Card Header - Dropdown -->
                           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">Add New Blog</h6>
                           </div>
                           <!-- Card Body -->
                           <div class="card-body">
                              <a href="add-blog" class="btn btn-primary btn-user btn-block">Add Blog</a>
                           </div>
                        </div>
                     </div>
                     <!-- Pie Chart -->
                     <div class="col-xl-8 col-lg-8" style="display:">
                        <div class="card shadow mb-4">
                           <!-- Card Header - Dropdown -->
                           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">All Blogs</h6>
                           </div>
                           <!-- Card Body -->
                           <div class="card-body">
                              <?php 	
                              include 'config.php';
                              $stmt=$dbh->query("SELECT * FROM blog ORDER BY `blog`.`blog_id` DESC ");					
                              while ($row = $stmt->fetch()) { ?>    
                              <!-- Blog Post -->      
                              <div class="card mb-4 blog">
                                 <img class="card-img-top" src="../upload/blog/<?php echo $row['blog_head_image']; ?>" alt="Card image cap" style="display:non; max-width:450px;">   
                                 <div class="card-body">
                                    <h2 class="card-title blog-title text-capitalize">
                                       <?php echo $row['blog_head']; ?>
                                    </h2>
                                    <hr style="height:1px;">
                                    <p class="card-text blog-content">
                                       <?php // echo substr($row['blog_content'], 0, 200); ?>
                                    </p>
                                    <div style="display:flex;">
                                       <a href="edit-blog/<?php echo $row['blog_id']; ?>" class="blog-link btn btn-primary">Edit This Blog Post &rarr;</a>	
                                       &nbsp; &nbsp; 			
                                       <form method="POST" action="delete/delete_blog.php">	
                                          <input type="hidden" value="<?php echo $row['blog_id']; ?>" name="blog-id" />	
                                          <input type="submit" value="Delete" name="submit" class="btn btn-danger" />	
                                       </form>
                                    </div>
                                 </div>
                                 <div class="card-footer text-muted blog-date">    
                                    Posted on <strong><?php echo $row['trn_date']; ?></strong>  
                                 </div>
                              </div>
                              <?php } ?> 
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-4 col-lg-4">
                        <div class="card shadow mb-4">
                           <!-- Card Header - Dropdown -->
                           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">All Blog Categories</h6>
                           </div>
                           <!-- Card Body -->
                           <div class="card-body">
                              <div class="table-responsive mt-4">
                                 <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                             <thead>
                                                <tr role="row">
                                                   <th>S.No</th>
                                                   <th>Name</th>
                                                   <th>Action</th>
                                                </tr>
                                             </thead>
                                             <?php 
                                                $i = 1; 
                                                $stmtblogcate=$dbh->query("SELECT * FROM blog_cate");
                                                while ($rowblogcate = $stmtblogcate->fetch()){ 
                                                $blog_cate_id=$rowblogcate['blog_cate_id']; 
                                                ?>
                                             <tbody>
                                                <tr role="row" class="odd">
                                                   <td class="sorting_1"><?php echo $i++ ; ?></td>
                                                   <td><strong class="text-capitalize"><?php echo $rowblogcate['blog_cate_name'] ; ?></strong>
                                                   </td>
                                                   <td>
                                                      <form method="post" class="display_results" action="delete/delete_blog_cate.php" >
                                                         <input type="hidden" name="cate_id" value="<?php echo $rowblogcate['blog_cate_id']; ?>" />
                                                         <input type="submit" class="btn btn-google btn-block" style="width:100%;" value="Delete"/>
                                                      </form>
                                                   </td>
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
         </div>
      </div>
      <footer class="sticky-footer bg-white">
               <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                     <span>Copyright &copy; Your Website 2021</span>
                  </div>
               </div>
            </footer>
      
      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
        
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin-2.min.js"></script>
      
   </body>
</html>