
<?php
if (!isset($_SESSION)) session_start();

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Website title - bootstrap html template</title>

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

</head>
<body>


<?php include 'header.php'; ?>

<?php include 'thanhcongcu.php'; ?>

<!-- ========================= SECTION CONTENT ========================= -->
<?php
 // Bao gồm tệp kết nối PDO

    $sql = "SELECT * FROM danhmuc";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $danhmuc= $stmt->fetchAll(PDO::FETCH_OBJ);

?>



<section class="section-content padding-y">
<div class="container">

<nav class="row">

<?php 
if($danhmuc)
foreach($danhmuc as $item)
{
    ?>
    <div class="col-md-3">
			
			<div class="card card-category" >
			  <div class="card-img-top" >
              <img style="width: 100%; height:15rem;" src="images/image_cay/<?php echo $item->HinhAnhDM; ?>">
			  </div>
			  <div class="card-body">
			    <h4 class="card-title-center">
				<a  class="btn btn-outline-warning" style="padding: 1rem;margin-top: 2rem; width:20rem;" href="danhsachtheodanhmuc.php?danhmuc_id=<?php echo htmlspecialchars($item->MaDM); ?>">
                            <?php echo htmlspecialchars($item->TenDM); ?>
                    </a>
				</h4>
			    <!-- <ul class="list-menu">
			    	<li><a href="">Unisex T shirts</a></li>
					<li><a href="">Casual shirts</a></li>
					<li><a href="">Scherf Ice cream</a></li>
					
			    </ul> -->
			  </div>
			</div>
		</div> <!-- col.// -->
<?php
}


?>

		
	


</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->



<!-- ========================= SECTION SUBSCRIBE  ========================= -->
<section class="padding-y-lg bg-light border-top">
<div class="container">

<p class="pb-2 text-center">Delivering the latest product trends and industry news straight to your inbox</p>

<div class="row justify-content-md-center">
	<div class="col-lg-4 col-sm-6">
<form class="form-row">
		<div class="col-8">
		<input class="form-control" placeholder="Your Email" type="email">
		</div> <!-- col.// -->
		<div class="col-4">
		<button type="submit" class="btn btn-block btn-warning"> <i class="fa fa-envelope"></i> Subscribe </button>
		</div> <!-- col.// -->
</form>
<small class="form-text">We’ll never share your email address with a third-party. </small>
	</div> <!-- col-md-6.// -->
</div>
	

</div>
</section>
<!-- ========================= SECTION SUBSCRIBE END// ========================= -->


<!-- ========================= FOOTER ========================= -->
<?php include 'footer.php';  ?>
<!-- ========================= FOOTER END // ========================= -->

</body>
</html>