<?php 
include "config.php"; 
session_start();
include "auth.php";
$stmt = $dbh->query("SELECT * FROM admin WHERE admin.id='$userid'");
$row=$stmt->fetch();
$name=$row['name'];
$email=$row['email'];
$password=$row['password'];

	
	$id=$_GET['id'];
	$stmtwork=$dbh->query("SELECT * FROM work WHERE work.id='$id'");	
	if($rowwork=$stmtwork->fetch(PDO::FETCH_ASSOC)) {	
	
	?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit WORK</title>

	
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel='stylesheet' href='https://unpkg.com/@yaireo/tagify/dist/tagify.css'>
<style>
.tags-input-wrapper{
    /* background: transparent; */
    padding: 10px;
    /* border-radius: 4px; */
    /* max-width: 400px; */
    border: 1px solid #ccc;
    display: block;
    width: 100%;
    /* height: calc(1.5em + 0.75rem + 2px); */
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #6e707e;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d1d3e2;
    border-radius: 0.35rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.tags-input-wrapper input{
    border: none;
    background: transparent;
    outline: none;
    width: 140px;
    margin-left: 8px;
}
.tags-input-wrapper .tag{
    display: inline-block;
    background-color: #767676;
    color: white;
    border-radius: 5px;
    padding: 0px 3px 0px 7px;
    margin-right: 5px;
    /* box-shadow: 0 5px 15px -2px rgba(250 , 14 , 126 , .7); */
}
.tags-input-wrapper .tag a {
    margin: 0 7px 3px;
    display: inline-block;
    cursor: pointer;
}
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
                        <h1 class="h3 mb-0 text-gray-800">ADD WORK <br><?php echo $work_cate; ?></h1>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Information</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
																
								<form method="POST" id="editwork">
								
								
                            <div class="form-group">
                                <label for="contact-name"><strong>HEAD IMAGE</strong></label> <br>
								<input type="file" class="photo-include" style="display:non" name="photo" id="photo" style="height:auto;"  />
								<input type="hidden" class="get-photo" name="work-poster" value="<?php echo $rowwork['work_image']; ?>" />
								<br />
								<span class="uploaded_image_display"><img src="../upload/<?php echo $rowwork['work_image']; ?>" class="img-thumbnail uploaded_image" style="height:150px; width:auto;" /></span>
  
                            </div>
							<div class="form-group">
							<label for="usr"><strong>WORK TITLE</strong></label>
							<input type="text" name="work-head" class="form-control" placeholder="Work Title"  value="<?php echo $rowwork['work_title']; ?>" required />
							<input type="hidden" name="work_id" class="form-control"  value="<?php echo $rowwork['id']; ?>" required />
							</div>
							
							<div class="form-group">
							<label for="usr"><strong>Client</strong></label>
							<input type="text" name="Client" class="form-control" value="<?php echo $rowwork['work_client']; ?>" placeholder="Enter Client" required />
							</div>
							
							<div class="form-group">
							<label for="usr"><strong>Team</strong></label>
							<input type="text" name="team" class="form-control" value="<?php echo $rowwork['work_team']; ?>" placeholder="Enter Team Member With Space" required />
							</div>
							
							<div class="form-group">
							<label for="Work Category"><strong>Service</strong></label>
							<input type="hidden" name="service" class="cate-display" value="<?php echo $rowwork['work_service']; ?>" >
							<div class="row">
							<?php $stmt = $dbh->query("SELECT * FROM `work_cate` ORDER BY `work_cate`.`work_id` ASC");
									while($row=$stmt->fetch()){ ?>
							         
							 <div class="col-md-2 mt-2">
							   <div class="form-check">
								  <input class="form-check-input checkbox" type="checkbox" name="service_" value="<?php echo $row['work_id']; ?>" id="defaultCheck<?php echo $row['work_id']; ?>" <?php echo cheked( $row['work_id'],$id,$dbh);?> >
								  <label class="form-check-label text-capitalize" for="defaultCheck<?php echo $row['work_id']; ?>">
									 <?php echo $row['name']; ?>
								  </label>
							   </div>
							   </div>
							<?php }?>
							</div>
							</div>
							<div class="form-group">
							<label for="usr"><strong>Date</strong></label>
							<input type="date" name="date" class="form-control" value="<?php echo $rowwork['entr_date']; ?>" required />
							</div>
	  
	  
							<hr>
							<h5>Enter Social Link</h5>
							<div class="form-group">
							<input type="text" name="twitter" class="form-control" placeholder="Enter Twitter Url" value="<?php echo $rowwork['work_twitter']; ?>" 	 />
							</div>
							<div class="form-group">
							<input type="text" name="facebook" class="form-control"  placeholder="Enter facebook Url" value="<?php echo $rowwork['work_facebook']; ?>" 	 />
							</div>
							<div class="form-group">
							<input type="text" name="instagram" class="form-control"  placeholder="Enter instagram Url" value="<?php echo $rowwork['work_Instagram']; ?>"  />
							</div>
							<div class="form-group">
							<input type="text" name="picsart" class="form-control" value="<?php echo $rowwork['work_picsart']; ?>" placeholder="Enter pinterest Url"  />
							</div>
							
							<div class="form-group">
							<label for="usr"><strong>WORK CONTENT</strong></label>
							<textarea id="editor" name="work-content" class="form-control" style="height:650px;" placeholder="Write Your Content Here" required ><?php echo $rowwork['work_desc']; ?>
							</textarea>
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
     $('.uploaded_image').attr("src","../upload/"+data);
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
<script>
		$(document).ready(function() {
  $('#editwork').submit(function(e) {
    e.preventDefault();
    $.ajax({
       type: "POST",
       url: 'add/edit_work.php',
       data: $(this).serialize(),
       success: function(data)
       { 
	 
	  if(data=="successfull"){
	  window.location.href="work_listing.php";
	  }else{
		  alert(data);
	  }
       }
   });
 });
});

</script>
  
  

  <script>
  $('.checkbox').click(function() {
var ravi = $('.checkbox:checked').map(function() {
    return this.value;
}).get().join(', ');

console.log(ravi);
$(".cate-display").attr("value",ravi);

});
</script>
  
  
</body>

</html>


<?php } 

function cheked( $work_id,$work_detail_id,$dbh){
	
	$stmt = $dbh->query("SELECT * FROM `work_work_cate` where `work_detail_id`='".$work_detail_id."' and `work_cate_id`='".$work_id."' " );
								$row=$stmt->fetch(PDO::FETCH_ASSOC);
								$count =$stmt->Rowcount();
								if($count==1){
									
									echo 'checked';
								}
	
	
	
	
}
?>