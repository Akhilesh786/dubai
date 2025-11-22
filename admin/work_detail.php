<!DOCTYPE html>

<?php session_start();
             $project_id=$_SESSION['project_id'];
			 
			 ?>
<html class="no-js ptf-is--home-studio ptf-is--header-style-2 ptf-is--footer-style-2 ptf-is--custom-cursor ptf-is--footer-fixed" lang="en">
   <head>
      <meta charset="utf-8">
      <title>Awesomesauce</title>
      <meta name="description" content="Multipurpose HTML5 Template">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link rel="icon" type="image/png" href="assets/img/root/favicon.png">
      <link rel="stylesheet" href="assets/css/framework/bootstrap.css">
      <link rel="stylesheet" href="assets/css/framework/bootstrap-reboot.min.css">
      <link rel="stylesheet" href="assets/css/framework/bootstrap-grid.min.css">
      <link rel="stylesheet" href="assets/css/framework/bootstrap-utilities.min.css">
      <link rel="stylesheet" href="assets/css/ptf-plugins.min.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="assets/fonts/CerebriSans/style.css">
      <link rel="stylesheet" href="assets/fonts/LineIcons-PRO/WebFonts/Pro-Light/font-css/LinIconsPro-Light.css">
      <link rel="stylesheet" href="assets/fonts/LineIcons-PRO/WebFonts/Pro-Regular/font-css/LineIcons.css">
      <link rel="stylesheet" href="assets/fonts/Socicons/socicon.css">
      <link rel="stylesheet" href="assets/css/ptf-main.min.css">
      <link rel="stylesheet" href="assets/css/custom.css">
   </head>
   <body>
      <div class="ptf-site-wrapper animsition">
         <div class="ptf-site-wrapper__inner">
            <?php include "header.php" ;
			session_start();
             $project_id=$_SESSION['project_id'];
				 $stmt = $dbh->query("SELECT * FROM `work` where `id`='".$project_id."' ");
				$row=$stmt->fetch(PDO::FETCH_ASSOC);
				//print_r($row);
			?>
			<main class="ptf-main">
   <article class="ptf-page ptf-page--single-work-1">
      <section>
         <div class="ptf-spacer" style=" --ptf-xxl: 10rem; --ptf-md: 5rem;"></div>
         <div class="container-xxl">
            <div class="row">
               <div class="col-xl-6">
                  <div class="ptf-animated-block" data-aos="fade" data-aos-delay="0">
                     <h1 class="large-heading"><?php echo $row["work_title"]; ?></h1>
                     <div class="ptf-spacer" style=" --ptf-xxl: 5rem; --ptf-md: 2.5rem;"></div>
					 <?php if($row["work_twitter"]!=""){?>
                     <a class="ptf-social-icon ptf-social-icon--style-3 twitter" href="<?php echo $row["work_twitter"]; ?>" target="_blank"><i class="socicon-twitter"></i></a>
					 <?php } if($row["work_facebook"]!=""){?>
                     <a class="ptf-social-icon ptf-social-icon--style-3 facebook" href="<?php echo $row["work_facebook"]; ?>" target="_blank"><i class="socicon-facebook"></i></a>
					 <?php } if($row["work_Instagram"]!=""){?>
                     <a class="ptf-social-icon ptf-social-icon--style-3 instagram" href="<?php echo $row["work_Instagram"];?>" target="_blank"><i class="socicon-instagram"></i></a>
					 <?php } if($row["work_picsart"]!=""){?>
                     <a class="ptf-social-icon ptf-social-icon--style-3 pinterest" href="<?php echo $row["work_picsart"]; ?>" target="_blank"><i class="socicon-pinterest"></i></a>
					 <?php } ?>
                  </div>
                  <div class="ptf-spacer" style=" --ptf-lg: 4.375rem; --ptf-md: 2.1875rem;"></div>
               </div>
               <div class="col-xl-3">
                  <div class="ptf-spacer" style=" --ptf-xxl: 1.25rem;"></div>
                  <div class="ptf-animated-block" data-aos="fade" data-aos-delay="100">
                     <h5 class="fz-14 text-uppercase has-3-color fw-normal">Client</h5>
                     <div class="ptf-spacer" style=" --ptf-xxl: 1.25rem;"></div>
                     <p class="fz-20 lh-1p5 has-black-color"><?php echo $row['work_client']; ?></p>
                  </div>
                  <div class="ptf-spacer" style=" --ptf-xxl: 4.375rem; --ptf-md: 2.1875rem;"></div>
                  <div class="ptf-animated-block" data-aos="fade" data-aos-delay="200">
                     <h5 class="fz-14 text-uppercase has-3-color fw-normal">Services</h5>
                     <div class="ptf-spacer" style=" --ptf-xxl: 1.25rem;"></div>
                     <p class="fz-20 lh-1p5 has-black-color"><?php $single_arr = array();
												$stmt1 = $dbh->query("SELECT * FROM `work_cate` WHERE work_id IN(".$row['work_service'].")");
												while ($row1= $stmt1 -> fetch(PDO::FETCH_ASSOC)) {
													$single_arr[] = $row1['name'];       
												}
											 echo	$service=implode(',', $single_arr);?>
					</p>
                  </div>
               </div>
               <div class="col-xl-3">
                  <div class="ptf-spacer" style=" --ptf-xxl: 1.25rem;"></div>
                  <div class="ptf-animated-block" data-aos="fade" data-aos-delay="300">
                     <h5 class="fz-14 text-uppercase has-3-color fw-normal">Team</h5>
                     <div class="ptf-spacer" style=" --ptf-xxl: 1.25rem;"></div>
                     <p class="fz-20 lh-1p5 has-black-color"><?php echo $row['work_team']?></p>
                  </div>
                  <div class="ptf-spacer" style=" --ptf-xxl: 4.375rem; --ptf-md: 2.1875rem;"></div>
                  <div class="ptf-animated-block" data-aos="fade" data-aos-delay="400">
                     <h5 class="fz-14 text-uppercase has-3-color fw-normal">Date</h5>
                     <div class="ptf-spacer" style=" --ptf-xxl: 1.25rem;"></div>
                     <p class="fz-20 lh-1p5 has-black-color"><?php $yrdata= strtotime($row['entr_date']);
					 echo date('jS F Y', $yrdata);
					 
					 ?></p>
                  </div>
               </div>
            </div>
         </div>
         <div class="ptf-spacer" style=" --ptf-xxl: 6.25rem; --ptf-md: 3.125rem;"></div>
      </section>
      <section>
         <div class="container-xxl">
            <div class="ptf-animated-block" data-aos="fade" data-aos-delay="0">
               <?php echo $row['work_desc'];?>
            </div>
         </div>
      </section>
      
         <div class="ptf-post-navigation ptf-post-navigation--style-2">
            <div class="container"><span>Next Project</span><a class="h1 large-heading ptf-filled-link" href="portfolio-showcase-1.html">SPA Brand</a></div>
         </div>
      </section>
   </article>
</main>
		  </div>
         <?php include "footer.php"; ?>
      </div>
      <script src="assets/scripts/email-decode.min.js"></script>
      <script src="assets/scripts/ptf-plugins.min.js"></script>
      <script src="assets/scripts/ptf-helpers.js"></script>
      <script src="assets/scripts/ptf-controllers.min.js"></script>
	 <style>
	 .image{
		 text-align:center;
	 }
	 </style>
   </body>
</html>