<?php 
   include "config.php"; 
   session_start();
   include "auth.php";
   if($_GET["id"]){
$stmt=$dbh->query("SELECT * FROM careers_listing where career_id='".$_GET["id"]."' ");
									$row = $stmt->fetch();
									//print_r($row);

}
  $edit=@$_GET["edit"];
  
   $stmt_edit=$dbh->query("SELECT * FROM `carrer_description` where career_listing_id='".$_GET["id"]."' ");
   $row_edit = $stmt_edit->fetch();
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Admin - Career Description</title>
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
                     <h1 class="h3 mb-0 text-gray-800">ADD Career Description <br><?php echo $work_cate; ?></h1>
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
                              <form method="POST" id="addcareerdescription">
							  <input type="hidden" name="department_id" value="<?php echo $row["department_id"]; ?>">
							  <input type="hidden"  name="career_listing" value="<?php echo $row["career_id"]; ?>">
                              <input type="hidden"  name="edit" value="<?php echo $edit; ?>">
                                 <div class="form-group">
                                    <label for="usr"><strong>Responsibilities</strong></label>
                                    <textarea id="editor" name="responsibilities" class="form-control" style="height:650px;" placeholder="Write Your Content Here" required ><?php echo $row_edit["responsibilities"]; ?></textarea>
                                 </div>
                                 <div class="form-group">
                                    <label for="usr"><strong>Requirements</strong></label>
                                    <textarea id="editor1" name="requirements" class="form-control" style="height:650px;" placeholder="Write Your Content Here" required ><?php echo $row_edit["requirements"]; ?></textarea>
                                 </div>
                                 <div class="form-group">
                                    <label for="usr"><strong>Skills and Experience</strong></label>
                                    <textarea id="editor2" name="skills_experience" class="form-control" style="height:650px;" placeholder="Write Your Content Here" required ><?php echo $row_edit["skills_and_experience"]; ?></textarea>
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
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin-2.min.js"></script>
      <script src="js/ckeditor.js"></script>
     
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
         					'mediaEmbed',
         					'undo',
         					'redo',
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
         function MyCustomUploadAdapterPlugin( editor ) {
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                return new MyUploadAdapter( loader );
            };
         }
         ClassicEditor
         			.create( document.querySelector( '#editor1' ), {
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
         					'mediaEmbed',
         					'undo',
         					'redo',
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
         function MyCustomUploadAdapterPlugin( editor ) {
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                return new MyUploadAdapter( loader );
            };
         }
         ClassicEditor
         			.create( document.querySelector( '#editor2' ), {
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
         					'mediaEmbed',
         					'undo',
         					'redo',
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
         $('#addcareerdescription').submit(function(e) {
           e.preventDefault();
           $.ajax({
              type: "POST",
              url: 'add/add-careers-description.php',
              data: $(this).serialize(),
              success: function(data)
              { 
          // alert(data);
          if(data){
              //window.location.reload();

			  window.location.href="view_career_listing.php";
          }
              }
          });
         });
         });
         
      </script>
      
   </body>
</html>