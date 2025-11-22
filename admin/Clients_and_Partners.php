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
    <title>Clients_and_Partners</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
  </head>
  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar --> <?php
	   include "sidebar.php";
	   ?>
      <!-- End of Sidebar -->
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content"> <?php include "navbar.php"; ?>
          <!-- End of Topbar -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Clients_and_Partners</h1>
            </div>
            <div class="row">
              <!-- Pie Chart -->
              <div class="col-xl-3 col-lg-3" style="display:">
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Clients and Partners Details</h6>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                    <a href="#" class="btn btn-primary btn-user btn-block" data-toggle="modal" data-target="#myModal">Add </a>
                  </div>
                </div>
                <div class="card shadow mb-4 mt-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Manage Client Postion</h6>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                    <a href="manage_postion_client.php" class="btn btn-primary btn-user btn-block" >Manage Postion </a>
                  </div>
                </div>
              </div>
              <div class="col-xl-9 col-lg-9">
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All Clients And Partners</h6>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                    <div class="table-responsive mt-4">
                      <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                          <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable">
                              <thead>
                                <tr>
                                  <th>S.No</th>
                                  <th>Type</th>
                                  <th>file</th>
                                  <th>Brand</th>
                                  <th>Action</th>
                                  <th>Delete</th>
                                </tr>
                              </thead>
                              <tbody> 
                                <?php
                                  $i=0;
                                  $stmtbanner = $dbh->query("SELECT * FROM Clients_and_Partners ");
                                    while($rowbanner=$stmtbanner->fetch()) {
                                    ?> 
                                <tr>
                                  <td class="sorting_1"> <?php echo ++$i; ?> </td>
                                  <td> <?php if($rowbanner['type']==1){ echo 'Client'; }else{ echo 'Partner'; }?> </td>
                                  <td>
                                    <a href="upload/clients_partners/<?php echo $rowbanner['thumbnail'];?>"> <?php echo $rowbanner['thumbnail'];?> </a>
                                  </td>
                                  <td> <?php echo $rowbanner['name']; ?> </td>
                                  <td>
                                  <a class="btn btn-primary"  href="editclient_and_patners.php?id=<?php echo $rowbanner['id'];?>">Edit </a></br></br>
                                  <button class="btn  <?php if($rowbanner['status']=="1"){ echo 'btn-primary'; }else{ echo 'btn-danger'; } ?>" onclick="button_status(<?php echo $rowbanner['id'] ?>)"><?php if($rowbanner['status']=="1"){ echo 'Active'; }else{ echo 'Deactive'; } ?></button>
                                  </td>
                                  <td>
                                    <form class="user" id="updatuser" action="delete/Clients_and_Partners.php" method="POST">
                                      <input type="hidden" value="<?php echo $rowbanner['id'];?>" name="id">
                                      <button class="btn btn-danger">Delete</button>
                                    </form>
                                  </td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade login-model" id="myModal">
                <div class="modal-dialog login-model-dialog">
                  <div class="modal-content card ">
                    <!-- login Modal body -->
                    <div class="modal-body login-body">
                      <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary">Clients_and_Partners Details</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                          <form class="user" id="addbanner" action="" method="POST">
                            <div class="form-group">
                              <input type="text" name="name" class="form-control" placeholder=" Enter Clients or Partners">
                            </div>
                            <div class="form-group" onchange="type();">
                              <select name="type" id="type" class="form-control ">
                                <option>--Select Banner Type--</option>
                                <option value="1">Clients</option>
                                <option value="2">Partners</option>
                              </select>
                            </div>
                            <div class="form-group photo1" style="display:none;">
                              <span>Upload Clients thumbnail :</span>
                              <input type="file" name="thumbnail" id="Clients">
                              <input type="hidden" name="thumbnail_Clients" class="get-Clients" value="">
                              <div class="uploaded_image"></div>
                              <img src="" class="img-thumbnail" style="height:150px; width:auto;" />
                            </div>
                            <div class="form-group video1" style="display:none;">
                              <span>Upload Partners thumbnail :</span>
                              <input type="file" name="thumbnail" id="Partners">
                              <input type="hidden" name="thumbnail_Partners" class="get-Partners" value="">
                              <div class="uploaded_video"></div>
                              <img src="" class="img-thumbnail1" style="height:150px; width:auto;" />
                            </div>
                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Add" />
                            <hr>
                            <p id="login-error" class="text-uppercase" style="color:red"></p>
                          </form>
                        </div>
                      </div>
                      <p id="update-error" class="text-center"></p>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger login-close" data-dismiss="modal">Close</button>
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
    <script>
      $(document).ready(function() {
        $('#addbanner').submit(function(e) {
          e.preventDefault();
          $.ajax({
            type: "POST",
            url: 'add/add_clients_partners.php',
            data: $(this).serialize(),
            success: function(data) {
              alert(data);
              if (data == 'success') {
                window.location.reload();
              }
            }
          });
        });
      });
    </script>
    <script>
      $(document).ready(function() {
            $('#Clients').change(function() {
              var form_data = new FormData();
              form_data.append("file", document.getElementById('Clients').files[0]);
              $.ajax({
                  url: "doc_upload.php",
                  method: "POST",
                  data: form_data,
                  contentType: false,
                  cache: false,
                  processData: false,
                  beforeSend: function() {
                    $('.uploaded_image').show(500);
                    $('.uploaded_image').html(" < label class = 'text-success' > Image Uploading... < /label>");
                      },
                      success: function(data) {
                        $('.uploaded_image').hide();
                        $('.get-Clients').attr("value", data);
                        $('.img-thumbnail').attr("src", "upload/clients_partners/" + data);
                      }
                  });
              }); $('#Partners').change(function() {
                var form_data = new FormData();
                form_data.append("file", document.getElementById('Partners').files[0]);
                $.ajax({
                    url: "doc_upload.php",
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                      $('.uploaded_video').show(500);
                      $('.uploaded_video').html(" < label class = 'text-success' > video Uploading... < /label>");
                        },
                        success: function(data) {
                          $('.uploaded_video').hide();
                          $('.get-Partners').attr("value", data);
                          $('.img-thumbnail1').attr("src", "upload/clients_partners/" + data);
                        }
                    });
                });
            });
    </script>
    <script>
      function type() {
        var type = $("#type").val();
        //alert(type);
        if (type == 1) {
          $(".get-Partners").removeAttr('value');
          $(".photo1").show();
          $(".video1").hide();
        } else {
          $(".get-Clients").removeAttr('value');
          $(".video1").show();
          $(".photo1").hide();
        }
      }
      function button_status(id){
          //alert(id);
          var url="client_update.php";
          $.post(url, {id:id, "action":'change_status'}).done(function(response){
             if(response==1){
              window.location.reload();
             }
          });
      }
    </script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
  </body>
</html>