<!DOCTYPE html>
<html  lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8">
<title>Awesomepanama | Blogs</title>
<!-- Stylesheets -->
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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Preloader -->
      <div class="preloader"></div>
      <?php include('header.php'); ?>
<section class="page-title" style="background-image: url(images/background/page-title-bg.jpg);">
    <div class="auto-container">
      <div class="title-outer">
        <h1 class="title">Blogs</h1>
        <ul class="page-breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li>Blogs</li>
        </ul>
      </div>
    </div>
  </section>
<!-- Breadcrumb area end here -->



<!-- news-section -->
	<section class="blog-section pt-120 pb-90">
		<div class="auto-container">
      <div class="row g-4">
        <?php 
            $limit = 3;
            $query = "SELECT blog_id FROM blog";
            
            $s = $dbh->prepare($query);
            $s->execute();
            $total_results = $s->rowCount();
            $total_pages = ceil($total_results/$limit);
            
            if (!isset($_GET['page'])) {
                $page = 1;
            } else{
                $page = $_GET['page'];
            }
            
            $starting_limit = ($page-1)*$limit;
            $show  = "SELECT * FROM blog ORDER BY blog.blog_id DESC LIMIT $starting_limit, $limit";
            
            $r = $dbh->prepare($show);
            $r->execute();
            
            while($row = $r->fetch(PDO::FETCH_ASSOC)){
            ?> 
              <div class="col-md-6 col-xl-4 wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms">
                <div class="blog-block-two mb-30">
                  <div class="inner-box">
                    <div class="image-box">
                      <figure class="image">
                        <img src="upload/blog/<?php echo $row['blog_head_image'] ?>" alt="<?php echo $row['blog_head'] ?>">
                        <?php 
                          $raw = $row['trn_date'] ?? '';
                          $formatted = '';
                          // Try strict Y-m-d parse first for safety
                          $dt = DateTime::createFromFormat('Y-m-d', $raw);
                          if ($dt && $dt->format('Y-m-d') === $raw) {
                              $formatted = $dt->format('j F,Y'); 
                          } elseif ($raw && ($ts = strtotime($raw)) !== false) {
                              $formatted = date('j F,Y', $ts);
                          } else {
                              $formatted = htmlspecialchars($raw);
                          }
                        
                          ?>
                        <span class="tag"><?php echo $formatted; ?></span>
                      </figure>
                    </div>
                    <div class="content-box">
                      <ul class="info">
                        <li>
                          <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                              d="M7.10742 7.625C9.38086 7.625 11.2324 9.47656 11.2324 11.75C11.2324 12.1719 10.8809 12.5 10.4824 12.5H1.48242C1.06055 12.5 0.732422 12.1719 0.732422 11.75C0.732422 9.47656 2.56055 7.625 4.85742 7.625H7.10742ZM1.85742 11.375H10.084C9.89648 9.89844 8.63086 8.75 7.10742 8.75H4.85742C3.31055 8.75 2.04492 9.89844 1.85742 11.375ZM5.98242 6.5C4.31836 6.5 2.98242 5.16406 2.98242 3.5C2.98242 1.85938 4.31836 0.5 5.98242 0.5C7.62305 0.5 8.98242 1.85938 8.98242 3.5C8.98242 5.16406 7.62305 6.5 5.98242 6.5ZM5.98242 1.625C4.92773 1.625 4.10742 2.46875 4.10742 3.5C4.10742 4.55469 4.92773 5.375 5.98242 5.375C7.01367 5.375 7.85742 4.55469 7.85742 3.5C7.85742 2.46875 7.01367 1.625 5.98242 1.625Z"
                              fill="#1A4137" />
                          </svg>
                          <a href="javascript:void(0);">By Awesomepanama</a>
                        </li>
                      </ul>
                        <h4 class="title"><a href="blog-details/<?php echo $row['blog_url']; ?>"><?php echo $row['blog_head'] ?></a></h4>
                        <a class="btn-one-rounded mt-30" href="blog-details/<?php echo $row['blog_url']; ?>">Read More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
          <?php } ?>
      </div>
      <div class="pagination-wrapper centered mt-40">
        <div class="pagination"></div>
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
    <script src="js/pagination.js"></script>
    <script>
           $(function(){
              // server-side fallback
              var serverPage = <?php echo isset($page) ? (int)$page : 1; ?>;

              // Try to extract page from URL path (e.g. /blogs/3) or from query (?page=3)
              function getPageFromUrl(){
                var path = window.location.pathname.replace(/\/+$/,''); // trim trailing slash
                var parts = path.split('/');
                var idx = parts.lastIndexOf('blogs');
                if (idx !== -1 && parts.length > idx + 1) {
                  var p = parseInt(parts[idx + 1], 10);
                  if (!isNaN(p) && p > 0) return p;
                }
                var params = new URLSearchParams(window.location.search);
                var q = parseInt(params.get('page'), 10);
                if (!isNaN(q) && q > 0) return q;
                return null;
              }

              var autoPage = getPageFromUrl();
              var currentPage = autoPage || serverPage || 1;

              $('.pagination').pagination({
                items: <?php echo (int)$total_results;?>,
                itemsOnPage: <?php echo (int)$limit;?>,
                currentPage: currentPage,
                hrefTextPrefix : 'blogs/'
              });
            });
      </script>

</body>
<style>
  .sf-js-enabled{
    display: flex;
    gap: 11px;
  }
  .page-design{
    background: #4e7f94;
    padding: 4px;
    border-radius: 5px;
    width: auto;
  }
  .page-design .active{
    background: #e1713d;
    color: white ;
     padding: 4px;
    border-radius: 5px;
    width: auto;
  }
  .page-design .disabled{
    background: #e1713d;
    color: white ;
     padding: 4px;
    border-radius: 5px;
    width: auto;
  }
</style>
</html>  