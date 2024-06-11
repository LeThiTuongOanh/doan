<?php 
//include 'connect.php'; 
session_start(); 
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <!-- head content -->
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

    <div class="card mb-3">
        <div class="card-body">
            <hr>
            <section class="section-content padding-y">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">Filter by</div> <!-- col.// -->
                        <div class="col-md-10"> 
                            <ul class="list-inline">
                                <form method="GET" action="danhsachsanpham.php" class="form-inline">
                                    <label class="mr-2">Giá</label>
                                    <input class="form-control form-control-sm" name="min_price" placeholder="Min" type="number" value="<?php echo isset($_GET['min_price']) ? $_GET['min_price'] : ''; ?>">
                                    <span class="px-2"> - </span>
                                    <input class="form-control form-control-sm" name="max_price" placeholder="Max" type="number" value="<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : ''; ?>">
                                    <button type="submit" class="btn btn-sm btn-light ml-2">Lọc</button>
                                </form>
                            </ul>
                        </div> <!-- col.// -->
                    </div> <!-- row.// -->
                </div> <!-- card-body .// -->
            </div> <!-- card.// -->
        </div> <!-- container .//  -->
    </section>

    <section class="section-content padding-y">
        <div class="container">
            <header class="mb-3">
                <div class="form-inline">
                    <strong class="mr-md-auto">Sản phẩm</strong>
                </div>
            </header>

            <?php  
            // Pagination logic
            $limit = 12; // Number of entries to show in a page.
            if (isset($_GET["page"])) { 
                $page  = $_GET["page"]; 
            } else { 
                $page = 1; 
            };  

            $start_from = ($page-1) * $limit;  
            

            // Lấy giá trị min_price và max_price từ GET
            $min_price = isset($_GET['min_price']) ? $_GET['min_price'] : 0;
            $max_price = isset($_GET['max_price']) ? $_GET['max_price'] : PHP_INT_MAX;

            // Query to fetch total number of records with price filter
            $sql = "SELECT COUNT(*) FROM sanpham WHERE Gia BETWEEN :min_price AND :max_price";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':min_price', $min_price, PDO::PARAM_INT);
            $stmt->bindParam(':max_price', $max_price, PDO::PARAM_INT);
            $stmt->execute();
            $total_records = $stmt->fetchColumn();
            $total_pages = ceil($total_records / $limit);

            // Query to fetch the desired records with price filter
            $sql = "SELECT * FROM sanpham WHERE Gia BETWEEN :min_price AND :max_price LIMIT :start_from, :limit";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':min_price', $min_price, PDO::PARAM_INT);
            $stmt->bindParam(':max_price', $max_price, PDO::PARAM_INT);
            $stmt->bindParam(':start_from', $start_from, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            $sanpham = $stmt->fetchAll(PDO::FETCH_OBJ);
            ?>

            <div class="row">
                <?php
                if ($sanpham) {
                    foreach ($sanpham as $item) {
                        ?>
                        <div class="col-md-3">
                            <a href="chitietsanpham.php?idsach=<?php echo $item->MASP?>">
                                <figure class="card card-product-grid">
                                    <div class="img-wrap">
                                        <img src="images/image_cay/<?php echo htmlspecialchars($item->HinhAnh); ?>">
                                    </div> <!-- img-wrap.// -->
                                    <figcaption class="info-wrap text-center" style="font-size: 16px;">
                                        <a href="chitietsanpham.php?idsach=<?php echo $item->MASP?>" class="title mb-2"><?php echo htmlspecialchars($item->TenSP); ?></a>
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
                                        <div class="price-wrap">
                                        Giá:  <span class="price"><?php echo number_format($item->Gia, 0, ',', '.') ?> VNĐ</span>


                                        </div> <!-- price-wrap.// -->
                                        <form action="danhsachsanpham.php" method="post">
                                            <input type="hidden" name="MASP" value="<?php echo $item->MASP; ?>">
                                         
                                            <input type="hidden" name="TenSP" value="<?php echo $item->TenSP; ?>">
                                           
                                            <input type="hidden" name="Gia" value="<?php echo $item->Gia; ?>">
                                            <input type="hidden" name="HinhAnh" value="<?php echo $item->HinhAnh; ?>">
                                            <input type="hidden" name="DoNang" value="<?php echo $item->DoNang; ?>">
                                            <button type="submit" name="add_to_cart" class="btn btn-outline-primary"><i class="fa fa-shopping-cart"></i> Mua hàng </button>
                                        </form>
                                    </figcaption>
                                </figure>
                            </a>
                        </div> <!-- col.// -->
                        <?php
                    }
                } else {
                    echo "<p>Không có sản phẩm nào trong danh mục này.</p>";
                }
                ?>
            </div> <!-- row end.// -->

<!-- 
            Cập nhật pagination: Đảm bảo rằng các liên kết phân trang cũng bao gồm các tham số min_price và max_price để giữ lại bộ lọc khi người dùng chuyển trang. -->

            <!-- Pagination -->
            <nav class="mb-4" aria-label="Page navigation sample">
                <ul class="pagination">
                    <?php
                    if($page > 1){
                        echo '<li class="page-item"><a class="page-link" href="danhsachsanpham.php?page='.($page - 1).'&min_price='.$min_price.'&max_price='.$max_price.'">Previous</a></li>';
                    } else {
                        echo '<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>';
                    }

                    for ($i=1; $i<=$total_pages; $i++) {
                        if ($i == $page) {
                            echo '<li class="page-item active"><a class="page-link" href="#">'.$i.'</a></li>';
                        } else {
                            echo '<li class="page-item"><a class="page-link" href="danhsachsanpham.php?page='.$i.'&min_price='.$min_price.'&max_price='.$max_price.'">'.$i.'</a></li>';
                        }
                    }

                    if($page < $total_pages){
                        echo '<li class="page-item"><a class="page-link" href="danhsachsanpham.php?page='.($page + 1).'&min_price='.$min_price.'&max_price='.$max_price.'">Next</a></li>';
                    } else {
                        echo '<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>';
                    }
                    ?>
                </ul>
            </nav>

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
