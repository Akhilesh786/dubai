<?php 
include "config.php"; 
session_start();
include "auth.php";
$stmt = $dbh->query("SELECT * FROM user WHERE user.user_id='$userid'");
$row=$stmt->fetch();
$name=$row['f_name'];
$email=$row['email'];
$password=$row['password'];


$stmt1 = $dbh->query("SELECT * FROM info");
$row1=$stmt1->fetch();
$info_name=$row1['name'];
$info_title=$row1['title'];
$info_logo=$row1['logo'];
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
                                    <h6 class="m-0 font-weight-bold text-primary">Website Information</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
								    <?php 	
	$id=$_GET['id'];
	$stmt=$dbh->query("SELECT * FROM focus WHERE focus.id='$id'");	
	if($row=$stmt->fetch()) {	
	?>
	<form method="POST" action="update/update_focus.php">
	<input type="hidden" value="<?php echo $id ; ?>" name="id" />
	
                            <div class="form-group">
                                <label for="contact-name">Image</label> <br>
								<input type="file" class="photo-include" style="display:non" name="photo" id="photo" style="height:auto;" />
								<input type="hidden" class="get-photo" value="<?php echo $row['image'] ; ?>" name="blog-poster"/>
      <br /><br>
   <span class="uploaded_image_display"><img src="<?php echo $row['image'] ; ?>" class="img-thumbnail uploaded_image" style="display:non; max-width:450px;" /></span>
  
                            </div>
	
	<div class="form-group">
	<label for="usr">TITLE</label>
	<input type="text" name="blog-head" class="form-control" value="<?php echo $row['title'] ; ?>" placeholder="Blog Title" required />
	</div>
	
	
	
	<div class="form-group">
	<label for="usr">CONTENT</label>
	<textarea id="editor" name="blog-content" class="form-control" style="height:650px;" required ><?php echo $row['text'] ; ?>
	</textarea>
	</div>
<input type="submit" value="S U B M I T" name="submit" style="width:100%;" class="btn btn-primary"/>

</form>
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
<script>

	function MyCustomUploadAdapterPlugin( editor ) {
    editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
        return new MyUploadAdapter( loader );
    };
}
ClassicEditor
				.create( document.querySelector( '#editor' ), {
		extraPlugins: [ MyCustomUploadAdapterPlugin ],
					
				toolbar: {
					items: [
						'heading',
						'|',
						'bold',
						'italic',
						'link',
						'bulletedList',
						'numberedList',
						'|',
						'outdent',
						'indent',
						'|',
						'alignment',
						'fontFamily',
						'imageUpload',
						'blockQuote',
						'insertTable',
						'mediaEmbed',
						'undo',
						'redo',
						'code',
						'htmlEmbed',
						'specialCharacters'
					]
				},
				language: 'en',
				image: {
					toolbar: [
						'imageTextAlternative',
						'imageStyle:inline',
						'imageStyle:block',
						'imageStyle:side'
					]
				},
				table: {
					contentToolbar: [
						'tableColumn',
						'tableRow',
						'mergeTableCells'
					]
				},
					mediaEmbed: {previewsInData: true},
					licenseKey: '',
					
					
					
				} )
				.then( editor => {
					window.editor = editor;
			
					
					
					
				} )
				.catch( error => {
					console.error( 'Oops, something went wrong!' );
					console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
					console.warn( 'Build id: cribozb5127h-3owdj15imf8k' );
					console.error( error );
				} );
		
		</script>

<script>
class MyUploadAdapter {
    constructor(loader) {
        this.loader = loader;
    }

    upload() {
        return this.loader.file
            .then(uploadedFile => {
                return new Promise((resolve, reject) => {
                    const data = new FormData();
                    data.append('upload', uploadedFile);
                    $.ajax({
                        url: 'ckeditor-image.php',
                        type: 'POST',
                        data: data,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: response => {
                            resolve({
                                default: response.url
                            });
                        },
                        error: () => {
                            reject('Upload failed');
                        }
                    });
                });
            });
    }

    abort() {
    }
}
</script>
	
</body>

</html>