<!DOCTYPE html>
<html  lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8">

<?php 
error_reporting(0);
include "admin/config.php";
$blog_url=$_GET['title'];  
$stmt = $dbh->query("SELECT * FROM blog WHERE blog.blog_url = '$blog_url' ");
$row=$stmt->fetch(); 
$blog_id=$row['blog_id'];
$tags=$row['tags'];
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!-- Stylesheets -->
 
<title>Awesomepanama | <?php echo $row['blog_head'] ?></title>
<base href="https://awesomepanama.com/" />

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/flatpickr.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/slick-theme.css">
<link rel="stylesheet" type="text/css" href="css/slick.css">

<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" contenft="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Preloader -->
      <div class="preloader"></div>
      <?php include('header.php'); ?>
       
<!-- Breadcrumb area start here -->
  <section class="page-title" style="background-image: url(images/background/page-title-bg.jpg);">
    <div class="auto-container">
      <div class="title-outer">
        <h1 class="title"><?php echo $row['blog_head'] ?></h1>
        <ul class="page-breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li>Blogs</li>
        </ul>
      </div>
    </div>
  </section>
<!-- Breadcrumb area end here -->



<!--Blog Details Start-->
<section class="blog-details pt-120 pb-120">
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-7">
				<div class="blog-details__left">
					<div class="blog-details__img">
						<img src="upload/blog/<?php echo $row['blog_head_image'] ?>" alt="">
						<div class="blog-details__date">
							<?php
							  $raw = $row['trn_date'] ?? '';
							  $day = '';
							  $month = '';
							  // Try strict Y-m-d parse first for safety
							  $dt = DateTime::createFromFormat('Y-m-d', $raw);
							  if ($dt && $dt->format('Y-m-d') === $raw) {
							      $day = $dt->format('j');   // Day without leading zero (e.g. "2", "15")
							      $month = $dt->format('M');  // Short month name (e.g. "Aug", "Dec")
							  } elseif ($raw && ($ts = strtotime($raw)) !== false) {
							      $day = date('j', $ts);
							      $month = date('M', $ts);
							  } else {
							      $day = '—';
							      $month = '—';
							  }
							?>
							<span class="day"><?php echo $day; ?></span>
							<span class="month"><?php echo $month; ?></span>
						</div>
					</div>
					<div class="blog-details__content">
						<h3 class="blog-details__title"><?php echo $row['blog_head'] ?></h3>
						<?php echo $row['blog_content'] ?>
					</div>
					<div class="blog-details__bottom">
						<p class="blog-details__tags"> <span>Tags</span>
						<?php 
						$links = array();
						$parts = explode(',', $tags);
						foreach ($parts as $tags)
						{ 
						?>
						 <a href="javascript:void(0);"><?php echo $tags;?></a> 
						 <?php } ?>
						 </p>
						<div class="blog-details__social-list"> 
							<a href="https://x.com/Awesome_panama"><i class="fa fa-x"></i></a>
							  <a href="https://www.linkedin.com/company/awesome-panama/"><i class="fab fa-linkedin-in"></i></a>
							   <a href="https://www.instagram.com/awesome_panama"><i class="fab fa-instagram"></i></a> </div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-5">
				<div class="sidebar">
					<!-- <div class="sidebar__single sidebar__search">
						<form action="#" class="sidebar__search-form">
							<input type="search" placeholder="Search here">
							<button type="submit"><i class="far fa-search"></i></button>
						</form>
					</div> -->
					<div class="sidebar__single sidebar__category">
						<h3 class="sidebar__title">Categories</h3>
						<?php $stmtblogcate = $dbh->query("SELECT * FROM  blog_cate WHERE status=1 ");
						?>
						<ul class="sidebar__category-list list-unstyled">
						<?php 	while($rowblogcate=$stmtblogcate->fetch()) { ?>
							<li><a href="javascript:void(0);"><?php echo $rowblogcate['blog_cate_name']; ?><span class="icon-right-arrow"></span></a> </li>
							<?php } ?>
						</ul>
					</div>
					<div class="sidebar__single sidebar__tags">
						<h3 class="sidebar__title">Tags</h3>
						
						<div class="sidebar__tags-list"> 
							<?php 
							$links = array();
							$parts = explode(',', $tags);
							foreach ($parts as $tags)
							{ 
						?>
							<a href="javascript:void(0)"><?php echo $tags;?></a> 
							<?php } ?>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include('footer.php'); ?>

    </div><!-- End Page Wrapper -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/bxslider.js"></script>
    <script src="js/slick-animation.min.js"></script>
    <script src="js/jquery.fancybox.js"></script>
    <script src="js/wow.js"></script>   
    <script src="js/appear.js"></script>
    <script src="js/mixitup.js"></script>
    <script src="js/flatpickr.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/gsap.min.js"></script>
    <script src="js/ScrollTrigger.min.js"></script>
    <script src="js/SplitText.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/knob.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/vanilla-tilt.js"></script>
    <script src="js/splitting.js"></script>
    <script src="js/splitType.js"></script>
    <script src="js/script-gsap.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/script.js"></script>
    <!-- form submit -->
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/jquery.form.min.js"></script>
    <script src="js/contact-custom.js"></script>
    

</body>

<!-- Mirrored from php.kodesolution.com/2025/consultez-php/news-details.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Oct 2025 16:30:36 GMT -->
</html>  