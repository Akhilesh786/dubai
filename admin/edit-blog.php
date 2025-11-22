<?php 
   include "config.php"; 
   $blog_id=$_GET['id'];
   $stmtblog=$dbh->query("SELECT * FROM blog WHERE blog.blog_id='$blog_id'");	
   if($rowblog=$stmtblog->fetch()) {	
   $tags=$rowblog['tags'];
   
   //get tags id
   
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Edit Blog</title>
      <base href="https://awesomepanama.com/admin/" >
      <!-- Custom fonts for this template-->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="css/sb-admin-2.min.css" rel="stylesheet">
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
                              <form method="POST" action="update/update_blog.php">
                                 <input type="hidden" value="<?php echo $blog_id ; ?>" name="blog-id" />
                                 <div class="form-group">
                                    <span>HEAD IMAGE</span>
                                    <input type="file" name="thumbnail1" id="photo">
                                    <input type="hidden" name="thumbnail" class="get-photo"  value="<?php echo $rowblog['blog_head_image'] ; ?>">
                                    <div class="uploaded_image">
                                    </div>
                                    <img src="../upload/blog/<?php echo $rowblog['blog_head_image'] ; ?>" class="img-thumbnail" style="height:150px; width:auto;" />
                                    <div id="response"></div>
                                 </div>
                                 <div class="form-group">
                                    <label for="usr">BLOG TITLE</label>
                                    <input type="text" name="blog-head" class="form-control" value="<?php echo $rowblog['blog_head'] ; ?>" placeholder="Blog Title" required />
                                 </div>
                                 <div class="form-group">
                                    <label for="usr"><strong>Short Description</strong></label>
                                    <textarea name="Short_description" maxlength="255" class="form-control"  placeholder="Short Description" ><?php echo $rowblog['blog_description'] ; ?></textarea>
                                 </div>
                                 <div class="form-group">
                                    <label for="usr">BLOG META KEYWORDS</label>
                                    <input type="text" name="blog-keyword" class="form-control" value="<?php echo $rowblog['blog_keyword'] ; ?>" placeholder="Blog Meta Keywords" required />
                                 </div>
                                 <!--  <div class="form-group">
                                    <label for="usr"><strong>SELECT CATEGORIES</strong></label>
                                    <input type="hidden" name="blog_cate" class="cate-display"/>
                                    
                                      <div class="row">
                                      <?php 
                                       //  $stmtblogcate = $dbh->query("SELECT * FROM blog_cate_blog, blog_cate WHERE blog_cate_blog.blog_cate_id=blog_cate.blog_cate_id AND blog_cate_blog.blog_id='$blog_id'");
                                         //while($rowblogcate=$stmtblogcate->fetch()) {
                                         
                                         ?>
                                       <div class="col-md-2 mt-2">
                                       <div class="form-check">
                                             <input class="form-check-input checkbox" type="checkbox" value="<?php// echo $rowblogcate['blog_cate_id']; ?>" id="defaultCheck<?php  //echo $rowblogcate['blog_cate_id']; ?>" checked >
                                             <label class="form-check-label text-capitalize" for="defaultCheck<?php// echo $rowblogcate['blog_cate_id']; ?>">
                                                <?php// echo $rowblogcate['blog_cate_name']; ?>
                                             </label>
                                          </div>
                                       </div>
                                       <?php //} ?>
                                       
                                      </div>
                                      <br>
                                    <hr>
                                    </div>-->
                                 <div class="form-group">
                                    <label for="usr">BLOG CONTENT</label>
                                    <textarea id="editor" name="blog-content" class="form-control" style="height:650px;" required ><?php echo $rowblog['blog_content'] ; ?>
                                    </textarea>
                                 </div>
                                 <div class="form-group">
                                    <label for="usr"><strong>ADD TAGS</strong></label>
                                    <input type="text" name="tags" class="form-control"  id="tag-input1" placeholder="Write your tags" value="blog, content" required />
                                    <strong>NOTE:</strong> Tags should be comma(,) separated.
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

     var _URL = window.URL || window.webkitURL;
    $('#photo').change(function () {
           var file = $(this)[0].files[0];

           img = new Image();
           var imgwidth = 0;
           var imgheight = 0;
           var maxwidth = 1920;
           var maxheight = 1080;

           img.src = _URL.createObjectURL(file);
           img.onload = function() {
                  imgwidth = this.width;
                  imgheight = this.height;
 
                   $("#width").text(imgwidth);$("#height").text(imgheight);  
                  
                  if(imgwidth >= maxwidth && imgheight == maxheight){
 
                       var form_data = new FormData();
                       

                       form_data.append("blog", document.getElementById('photo').files[0]);
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
							
							 $('.uploaded_image').hide();
							 $('.get-photo').attr("value",data);
							 $('.img-thumbnail').attr("src","../upload/blog/"+data);
						
							}
						   });
                  } else { 
				  
				  $("#response").text("Image size must be "+maxwidth+"X"+maxheight); }
           };
           

     }); });
         
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
         //Input tags
         (function () {
         
         "use strict";
         
         
         // Plugin Constructor
         var TagsInput = function (opts) {
           this.options = Object.assign(TagsInput.defaults, opts);
           this.init();
         };
         
         // Initialize the plugin
         TagsInput.prototype.init = function (opts) {
           this.options = opts ? Object.assign(this.options, opts) : this.options;
         
           if (this.initialized)
           this.destroy();
         
           if (!(this.orignal_input = document.getElementById(this.options.selector))) {
             console.error("tags-input couldn't find an element with the specified ID");
             return this;
           }
         
           this.arr = [];
           this.wrapper = document.createElement('div');
           this.input = document.createElement('input');
           init(this);
           initEvents(this);
         
           this.initialized = true;
           return this;
         };
         
         // Add Tags
         TagsInput.prototype.addTag = function (string) {
         
           if (this.anyErrors(string))
           return;
         
           this.arr.push(string);
           var tagInput = this;
         
           var tag = document.createElement('span');
           tag.className = this.options.tagClass;
           tag.innerText = string;
         
           var closeIcon = document.createElement('a');
           closeIcon.innerHTML = '&times;';
         
           // delete the tag when icon is clicked
           closeIcon.addEventListener('click', function (e) {
             e.preventDefault();
             var tag = this.parentNode;
         
             for (var i = 0; i < tagInput.wrapper.childNodes.length; i++) {
               if (tagInput.wrapper.childNodes[i] == tag)
               tagInput.deleteTag(tag, i);
             }
           });
         
         
           tag.appendChild(closeIcon);
           this.wrapper.insertBefore(tag, this.input);
           this.orignal_input.value = this.arr.join(',');
         
           return this;
         };
         
         // Delete Tags
         TagsInput.prototype.deleteTag = function (tag, i) {
           tag.remove();
           this.arr.splice(i, 1);
           this.orignal_input.value = this.arr.join(',');
           return this;
         };
         
         // Make sure input string have no error with the plugin
         TagsInput.prototype.anyErrors = function (string) {
           if (this.options.max != null && this.arr.length >= this.options.max) {
             console.log('max tags limit reached');
             return true;
           }
         
           if (!this.options.duplicate && this.arr.indexOf(string) != -1) {
             console.log('duplicate found " ' + string + ' " ');
             return true;
           }
         
           return false;
         };
         
         // Add tags programmatically 
         TagsInput.prototype.addData = function (array) {
           var plugin = this;
         
           array.forEach(function (string) {
             plugin.addTag(string);
           });
           return this;
         };
         
         // Get the Input String
         TagsInput.prototype.getInputString = function () {
           return this.arr.join(',');
         };
         
         
         // destroy the plugin
         TagsInput.prototype.destroy = function () {
           this.orignal_input.removeAttribute('hidden');
         
           delete this.orignal_input;
           var self = this;
         
           Object.keys(this).forEach(function (key) {
             if (self[key] instanceof HTMLElement)
             self[key].remove();
         
             if (key != 'options')
             delete self[key];
           });
         
           this.initialized = false;
         };
         
         // Private function to initialize the tag input plugin
         function init(tags) {
           tags.wrapper.append(tags.input);
           tags.wrapper.classList.add(tags.options.wrapperClass);
           tags.orignal_input.setAttribute('hidden', 'true');
           tags.orignal_input.parentNode.insertBefore(tags.wrapper, tags.orignal_input);
         }
         
         // initialize the Events
         function initEvents(tags) {
           tags.wrapper.addEventListener('click', function () {
             tags.input.focus();
           });
         
         
           tags.input.addEventListener('keydown', function (e) {
             var str = tags.input.value.trim();
         
             if (!!~[9, 13, 188].indexOf(e.keyCode))
             {
               e.preventDefault();
               tags.input.value = "";
               if (str != "")
               tags.addTag(str);
             }
         
           });
         }
         
         
         // Set All the Default Values
         TagsInput.defaults = {
           selector: '',
           wrapperClass: 'tags-input-wrapper',
           tagClass: 'tag',
           max: null,
           duplicate: false };
         
         
         window.TagsInput = TagsInput;
         
         })();
         
         var tagInput1 = new TagsInput({
         selector: 'tag-input1',
         duplicate: false,
         max: 50 });
         
         // var tagsinput=['The Bad Billy','ravi','jaiswal'];
         var tagsinput=[<?php 
            $links = array();
            $parts = explode(',', $tags);
            foreach ($parts as $tags)
            { ?>'<?php
            echo $tags;
            ?>', <?php
            }
            ?>
         ];
         tagInput1.addData(tagsinput);
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
<?php } ?>