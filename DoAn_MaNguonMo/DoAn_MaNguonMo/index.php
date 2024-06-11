
<?php
if (!isset($_SESSION)) session_start();

// Check if the user is logged in
if (isset($_SESSION['TenDN'])) {
    $username = $_SESSION['TenDN'];
    echo "<p>Welcome, $username!</p>";
} else {
    echo "<p>Please log in to continue.</p>";
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">

<!-- jQuery -->
<script src="js/jquery-2.0.0.min.js" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!-- Font awesome 5 -->
<link href="fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

<!-- custom style -->
<link href="css/ui.css" rel="stylesheet" type="text/css"/>
<link href="css/responsive.css" rel="stylesheet" type="text/css" />

<!-- custom javascript -->
<script src="js/script.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>

</head>
<body>

<?php include 'header.php'; ?>
<?php include 'thanhcongcu.php'; ?>




<div class="container">
<!-- ========================= SECTION MAIN  ========================= -->
<section class="section-main padding-y">
<main class="card">
	<div class="card-body">
<div class="row">

<div class="col-8">
	

<!-- ================== COMPONENT SLIDER  BOOTSTRAP  ==================  -->
<div id="carousel1_indicator" class="slider-home-banner carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel1_indicator" data-slide-to="0" class="active"></li>
    <li data-target="#carousel1_indicator" data-slide-to="1"></li>
    <li data-target="#carousel1_indicator" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/image_cay/Monstera-deliciosa.webp" alt="First slide"> 
    </div>
    <div class="carousel-item">
      <img src="images/image_cay/Cay-kim-ngan.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img src="images/image_cay/trauba.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 

<!-- ==================  COMPONENT SLIDER BOOTSTRAP end.// ==================  .// -->	

	</div> <!-- col.// -->
	<div class="col-4 d-none d-lg-block flex-grow-1">
		<aside class="special-home-right">
			<h6 class="bg-blue text-center text-white mb-0 p-2">Danh mục phổ biến</h6>
			
			<div class="card-banner border-bottom">
			  <div class="py-3" style="width:80%">
			    <h6 class="card-title">Hoa Lan</h6>
			    <a href="#" class="btn btn-secondary btn-sm"> Source now </a>
			  </div> 
			  <img src="images/image_cay/lan1.jpg" height="80" class="img-bg">
			</div>

			<div class="card-banner border-bottom">
			  <div class="py-3" style="width:80%">
			    <h6 class="card-title">Cây thủy sinh </h6>
			    <a href="#" class="btn btn-secondary btn-sm"> Source now </a>
			  </div> 
			  <img src="images/image_cay/traubathuysinh.jpg" height="80" class="img-bg">
			</div>

			<div class="card-banner border-bottom">
			  <div class="py-3" style="width:80%">
			    <h6 class="card-title">Cây bonsai</h6>
			    <a href="#" class="btn btn-secondary btn-sm"> Source now </a>
			  </div> 
			  <img src="images/image_cay/caybonsai.jpg" height="80" class="img-bg">
			</div>

		</aside>
	</div> <!-- col.// -->
</div>


</div> <!-- row.// -->


<!-- ========================= SECTION MAIN END// ========================= -->




<!-- =============== SECTION ITEMS =============== -->


<?php include 'sanpham_recommend.php' ?>




<!-- =============== SECTION SERVICES =============== -->


<!-- =============== SECTION SERVICES .//END =============== -->


<header class="section-heading heading-line">
	<h4 class="title-section">Tô điểm cho ngôi nhà bạn</h4>
</header>
<article class="my-4">
	<img src="images/image_cay/trangtrinha.jpg" class="w-100" height=30%;>
</article>
</div>  
<!-- container end.// -->

<!-- ========================= SECTION SUBSCRIBE  ========================= -->
<section class="section-subscribe padding-y-lg">
<div class="container">

<p class="pb-2 text-center text-white">Delivering the latest product trends and industry news straight to your inbox</p>

<div class="row justify-content-md-center">
	<div class="col-lg-5 col-md-6">
<form class="form-row">
		<div class="col-md-8 col-7">
		<input class="form-control border-0" placeholder="Your Email" type="email">
		</div> <!-- col.// -->
		<div class="col-md-4 col-5">
		<button type="submit" class="btn btn-block btn-warning"> <i class="fa fa-envelope"></i> Subscribe </button>
		</div> <!-- col.// -->
</form>
<small class="form-text text-white-50">We’ll never share your email address with a third-party. </small>
	</div> <!-- col-md-6.// -->
</div>
	

</div>
</section>
<!-- ========================= SECTION SUBSCRIBE END// ========================= -->
</div> <!-- card-body.// -->
</main> <!-- card.// -->

</section>
<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
  intent="WELCOME"
  chat-title="Test_box_ai"
  agent-id="64c1f532-6d82-4513-b8d6-f4e86a04aa37"
  language-code="vi"
></df-messenger>
<!-- ========================= FOOTER ========================= -->
<?php  include 'footer.php';?>
<!-- ========================= FOOTER END // ========================= -->



</body>
</html>