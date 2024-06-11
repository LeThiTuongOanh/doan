
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


<header class="section-header">
    <section class="header-main border-bottom">
        <div class="container">
    <div class="row align-items-center">
        <div class="col-xl-2 col-lg-12 col-md-12">
            <a href="page-index.html" class="brand-wrap">
                <img class="logo" src="images/logo1.png" width="100px" height="100px">
            </a> <!-- brand-wrap.// -->
        </div>
        <div class="col-xl-6 col-lg-7 col-md-6">
            <form action="#" class="search-header">
                <div class="input-group w-100">
                    <!-- <select class="custom-select border-right"  name="category_name">
                            <option value="">All type</option><option value="codex">Special</option>
                            <option value="comments">Only best</option>
                            <option value="content">Latest</option>
                    </select> -->
                    <input type="text" class="form-control" placeholder="Tìm Kiếm">
                    
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="submit">
                        <i class="fa fa-search"></i> Search
                      </button>
                    </div>
                </div>
            </form> <!-- search-wrap .end// -->
        </div> <!-- col.// -->
       
    </div> <!-- row.// -->
        </div> <!-- container.// -->
    </section> <!-- header-main .// -->
    
    </header> <!-- section-header.// -->
    



<?php include 'thanhcongcu.php'; ?>
<section class="py-3 bg-light">
  <div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
        <li class="breadcrumb-item"><a href="#">Danh mục con</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
    </ol>
  </div>
</section>
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg-white padding-y">
<div class="container">
<!-- ============================ ITEM DETAIL ======================== -->
<?php
if (isset($_GET['idsach'])) {
    $idsach_1 = $_GET['idsach'];
    $sql = "SELECT * FROM sanpham WHERE MASP = :idsach";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idsach', $idsach_1, PDO::PARAM_STR);
    $stmt->execute();
    $sanpham = $stmt->fetchAll(PDO::FETCH_OBJ);
} else {
    $sanpham = [];
}
?>
<?php if ($sanpham): ?>
    <?php foreach ($sanpham as $item): ?>
        <div class="row">
            <aside class="col-md-4">
                <div class="card">
                    <article class="gallery-wrap"> 
                        <div class="img-big-wrap">
                            <img src="images/image_cay/<?php echo htmlspecialchars($item->HinhAnh); ?>">
                        </div> <!-- slider-product.// -->
                        <div class="thumbs-wrap">
                        <a href="#" class="item-thumb"> <img src="images/image_cay/<?php echo htmlspecialchars($item->HinhAnh); ?>"></a>
                        <a href="#" class="item-thumb"> <img src="images/image_cay/<?php echo htmlspecialchars($item->HinhAnh); ?>"></a>
                        <a href="#" class="item-thumb"> <img src="images/image_cay/<?php echo htmlspecialchars($item->HinhAnh); ?>"></a>
                        <a href="#" class="item-thumb"> <img src="images/image_cay/<?php echo htmlspecialchars($item->HinhAnh); ?>"></a>         
                        </div> <!-- slider-nav.// -->
                    </article> <!-- gallery-wrap .end// -->
                </div> <!-- card.// -->
            </aside>
            <main class="col-md-6">
                <article class="product-info-aside">
                    <h2 class="title mt-3"><?php echo htmlspecialchars($item->TenSP); ?></h2>
                    <div class="rating-wrap my-3">
                        <ul class="rating-stars">
                            <li style="width:80%" class="stars-active"> 
                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                <i class="fa fa-star"></i> 
                            </li>
                            <li>
                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                <i class="fa fa-star"></i> 
                            </li>
                        </ul>
                        <small class="label-rating text-muted">132 reviews</small>
                        <small class="label-rating text-success"> <i class="fa fa-clipboard-check"></i> 154 orders </small>
                    </div> <!-- rating-wrap.// -->
                    <div class="mb-3"> 
                        <var class="price h4"><?php echo htmlspecialchars($item->Gia); ?></var> 
                        <span class="text-muted">USD 562.65 incl. VAT</span> 
                    </div> <!-- price-detail-wrap .// -->
                    <p><?php echo htmlspecialchars($item->MoTa); ?></p>
                    <dl class="row">
                        <dt class="col-sm-3">Thời gian giao hàng</dt>
                        <dd class="col-sm-9">Trong ngày</dd>
                        <dt class="col-sm-3">Số Lượng Sản Phẩm</dt>
                        <dd class="col-sm-9"><?php echo htmlspecialchars($item->SoLuongTon); ?></dd>
                    </dl>
                    <li>Độ nặng: <?php echo htmlspecialchars($item->DoNang); ?> kg</li>

                    <form id="add-to-cart-form" action="giohang.php" method="POST">
                        <input type="hidden" name="MASP" value="<?php echo htmlspecialchars($item->MASP); ?>">
                        <input type="hidden" name="TenSP" value="<?php echo htmlspecialchars($item->TenSP); ?>">
                        <input type="hidden" name="Gia" value="<?php echo htmlspecialchars($item->Gia); ?>">
                        <input type="hidden" name="HinhAnh" value="<?php echo htmlspecialchars($item->HinhAnh); ?>">
                        <input type="hidden" name="DoNang" value="<?php echo htmlspecialchars($item->DoNang); ?>">
                        <div class="form-row mt-4">
                            <div class="form-group col-md flex-grow-0">
                                <div class="input-group mb-3 input-spinner">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-light" type="button" id="button-plus"> + </button>
                                    </div>
                                    <input type="text" class="form-control" name="quantity" value="1">
                                    <div class="input-group-append">
                                        <button class="btn btn-light" type="button" id="button-minus"> &minus; </button>
                                    </div>
                                </div>
                            </div> <!-- col.// -->
                            <div class="form-group col-md">
                                <button type="submit" name="add_to_cart" class="btn btn-primary">
                                    <i class="fas fa-shopping-cart"></i> <span class="text">Thêm giỏ hàng</span>
                                </button>
                            </div> <!-- col.// -->
                        </div> <!-- row.// -->
                    </form>
                </article> <!-- product-info-aside .// -->
            </main> <!-- col.// -->
        </div> <!-- row.// -->
        <section class="section-name padding-y bg">
<div class="container">
<div class="row">
    <div class="col-md-8">
        <h5 class="title-description">Mô tả</h5>
        <p>
        <?php echo htmlspecialchars($item->MoTa); ?>
        </p>
        <ul class="list-check">
        <li>Chiều cao: <?php echo htmlspecialchars($item->ChieuCao); ?> cm</li>
        <li>Độ nặng: <?php echo htmlspecialchars($item->DoNang); ?> kg</li>
        
        </ul>
        <h5 class="title-description">Thông số</h5>
        <table class="table table-bordered">
            <!-- <tr> <th colspan="2"></th> </tr>
            <tr> <td>Type of energy</td><td>Lava stone</td> </tr>
            <tr> <td>Number of zones</td><td>2</td> </tr>
            <tr> <td>Automatic connection</td> <td> <i class="fa fa-check text-success"></i> Yes </td></tr> -->
           
            <tr> <td>Chiều cao</td><td> <?php echo htmlspecialchars($item->ChieuCao); ?></td></tr>
            <tr> <td>Độ nặng</td><td><?php echo htmlspecialchars($item->DoNang); ?> kg</li>
        </td> </tr>
    </table>

    <?php endforeach; ?>
<?php endif; ?>
<!-- ================ ITEM DETAIL END .// ================= -->
</div> <!-- container .//  -->
    </div>
    </div>
</section>


<!-- ========================= SECTION CONTENT END// ========================= -->
<!-- ========================= SECTION  ========================= -->
<div class="row-auto">
<?php include 'footer.php';    ?>
</div>
