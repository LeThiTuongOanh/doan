<?php
session_start(); 
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Danh sách sản phẩm</title>
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

<section class="section-content padding-y">
<div class="container">

<?php
if (isset($_GET['danhmuc_id'])) {
	$danhmuc_id = $_GET['danhmuc_id'];
    $sql = "SELECT * FROM sanpham WHERE MaDM = :danhmuc_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':danhmuc_id', $danhmuc_id, PDO::PARAM_STR);
    $stmt->execute();
    $sanpham = $stmt->fetchAll(PDO::FETCH_OBJ);

} else {
    $sanpham = [];
}
?>

<header class="mb-3">
    <div class="form-inline">
        <strong class="mr-md-auto">Sản phẩm</strong>
    </div>
</header>

<div class="row">
    <?php
    if ($sanpham) {
        foreach ($sanpham as $item) {
            ?>
            <div class="col-md-3">
                <figure class="card card-product-grid">
                <a href="chitietsanpham.php?idsach=<?php echo $item->MASP?>">
                    <div class="img-wrap">
                        <img src="images/image_cay/<?php echo htmlspecialchars($item->HinhAnh); ?>">
                    </div> <!-- img-wrap.// -->
                    <figcaption class="info-wrap">
                        <a href="#" class="title mb-2"><?php echo htmlspecialchars($item->TenSP); ?></a>
                        <div class="price-wrap">
                            <span class="price"><?php echo htmlspecialchars($item->Gia); ?></span>                   
                            <small class="text-muted">/1 sản phẩm</small>
                        </div> <!-- price-wrap.// -->
                        <p class="mb-2">4 Pieces <small class="text-muted">(Min Order)</small></p>
                        <hr>
                        <p class="mb-3">
                            <span class="tag"><i class="fa fa-check"></i> Verified</span>
                            <span class="tag">3 Years</span>
                            <span class="tag">70 reviews</span>
                            <span class="tag">Russia</span>
                        </p>
                     
                    </figcaption>
                </figure>
            </div> <!-- col.// -->
            <?php
        }
    } else {
        echo "<p>Không có sản phẩm nào trong danh mục này.</p>";
    }
    ?>
</div> <!-- row end.// -->

</div> <!-- container .//  -->
</section>
<?php include 'footer.php'; ?>
</body>
</html>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $MASP = $_POST['MASP'];
    $TenSP = $_POST['TenSP'];
    $Gia = $_POST['Gia'];
    $HinhAnh = $_POST['HinhAnh'];
    $DoNang = $_POST['DoNang'];

    $item = array(
        'MASP' => $MASP,
        'TenSP' => $TenSP,
        'Gia' => $Gia,
        'HinhAnh' => $HinhAnh,
        'DoNang' => $DoNang,
        'quantity' => 1
    );

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Check if the product is already in the cart
    $found = false;
    foreach ($_SESSION['cart'] as &$cart_item) {
        if ($cart_item['MASP'] == $MASP) {
            $cart_item['quantity']++;
            $found = true;
            break;
        }
    }

    if (!$found) {
        $_SESSION['cart'][] = $item;
    }
    
    // Redirect to the cart page
    header('Location: giohang.php');
    exit();
}
?>
