<?php 
include "config.php"; 
session_start();
include "auth.php";
$stmt = $dbh->query("SELECT * FROM admin WHERE admin.id='$userid'");
$row=$stmt->fetch();
$name=$row['name'];
$email=$row['email'];
$password=$row['password'];
$product_id=$_GET['id'];
$_SESSION['pro_id']=$product_id;
$stmtpro=$dbh->query("SELECT * FROM products WHERE products.id='$product_id' ");	 
	while ($rowpro = $stmtpro->fetch())  
        {
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
                        <div class="col-xl-8 col-lg-8" style="display:">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Website Information</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
								    
	<form method="POST" action="update/update_product.php">
	
	<div class="form-group">
	<label for="usr"><strong>Product Name</strong></label>
	<input type="text" name="product_name" class="form-control" value="<?php echo $rowpro['product_name']; ?>" placeholder="Product Name" required />
	</div>
	<div class="form-group">
	<label for="usr"><strong>Short Description</strong></label>
	<input type="text" name="short_desc" class="form-control" value="<?php echo $rowpro['short_description']; ?>" placeholder="Short Description" required />
	</div>
	<div class="form-group">
	<label for="usr"><strong>Price</strong></label>
	<input type="text" name="price" class="form-control" value="<?php echo $rowpro['price']; ?>" placeholder="Product Price" required />
	</div>
	
	<div class="form-group">
	<label for="usr"><strong>Quantity</strong></label>
	<input type="text" name="quantity" class="form-control" placeholder="Quantity" value="<?php echo $rowpro['quantity']; ?>" required />
	</div> 
	
	<div class="form-group">
										<label for="sel1"><strong>Select Category</strong></label>
      <select class="form-control  form-control-use" name="sub_list" required>
	                           <option></option>
									<?php 
$stmt=$dbh->query("SELECT * FROM sub_category");
while ($row = $stmt->fetch()){ ?>
        <option value="<?php echo $row['sub_id']; ?>" class="text-capitalize"><?php echo $row['name']; ?></option>
		<?php } ?>
      </select>
                                        </div>
	
<div class="form-check d-none">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" name="featured" value="1"><strong>Featured</strong>
  </label>
</div>

<div class="form-check d-none">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" name="active" value="1"><strong>Active</strong>
  </label>
</div>
	<br>
	
	<div class="form-group">
	<label for="usr"><strong>Full Description</strong></label>
	<textarea id="editor" name="full_desc" class="form-control" style="height:650px;" placeholder="Write Your Full Description Here" required ><?php echo $rowpro['full_description']; ?>
	</textarea>
	</div>
	<input type="hidden" value="<?php echo $product_id; ?>" name="product_id" />
<input type="submit" value="N E X T" name="submit" style="width:100%;" class="btn btn-primary"/>

</form>
                                </div>
                            </div>
                        </div>
						
                        <div class="col-xl-4 col-lg-4" style="display:">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Images</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
								    <form action="add/add_image.php" class="dropzone" id="dropzonewidget">
                
            </form>
<p><strong>NOTE :</strong> After Upload <a href="#" id="refresh_page">Refresh</a> this page.</p>			
			<hr>
			<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: auto">S.No</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: auto">Name</th>
										<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: auto">Add Images</th>
                                    </tr>
									</thead>
									
																 <?php
      $i=0;																 
 	  $stmt1=$dbh->query("SELECT * FROM product_images WHERE product_images.product_id='$product_id' ORDER BY `product_images`.`id` DESC ");	 
	while ($row1 = $stmt1->fetch())  {
	
	?>			
                                              <tbody>
						                        <tr role="row" class="odd">
                                                <td class="sorting_1"><?php echo ++$i ; ?></td>
                                                <td><img src="../product-image/<?php echo $row1['img'] ?>" style="max-width:100%"></td>
                                                <td>
												<form method="post" class="display_results" action="delete/delete_image.php">
            <input type="hidden" name="img_id" value="<?php echo $row1['id'];?>" />
			<input type="hidden" name="pro_id" value="<?php echo $product_id?>" />
            <input type="submit" class="btn btn-google btn-block" style="width:100%;" value="Delete">
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
		<script>
	$('#refresh_page').click(function() {
    location.reload();
});
</script>
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


<?php } ?>