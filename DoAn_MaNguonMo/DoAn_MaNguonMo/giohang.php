<?php
session_start();

// Xử lý khi thêm vào giỏ hàng
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_to_cart'])) {
        $MASP = $_POST['MASP'];
        $TenSP = $_POST['TenSP'];
        $Gia = $_POST['Gia'];
        $HinhAnh = $_POST['HinhAnh'];
        $DoNang = $_POST['DoNang']; // Kiểm tra và mặc định trọng lượng sản phẩm

        $item = array(
            'MASP' => $MASP,
            'TenSP' => $TenSP,
            'Gia' => $Gia,
            'HinhAnh' => $HinhAnh,
            'DoNang' => $DoNang,  // Lưu trọng lượng vào giỏ hàng
            'quantity' => 1
        );
        
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
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
        
        // Chuyển hướng để ngăn chặn việc gửi lại form
        header('Location: danhsachsanpham.php');
        exit();
    }

    // Xử lý khi xóa khỏi giỏ hàng
    if (isset($_POST['remove_from_cart'])) {
        $remove_index = $_POST['remove_index'];
        if (isset($_SESSION['cart'][$remove_index])) {
            unset($_SESSION['cart'][$remove_index]);
            // Sắp xếp lại chỉ số mảng sau khi xóa
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
        // Chuyển hướng để làm mới trang giỏ hàng
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }
}

// Hàm tính phí vận chuyển dựa trên trọng lượng
function calculate_shipping_fee($total_weight) {
    if ($total_weight <= 1) {
        return 30000; // 30,000 VND cho đơn hàng dưới 1kg
    } elseif ($total_weight <= 5) {
        return 50000; // 50,000 VND cho đơn hàng từ 1kg đến 5kg
    } else {
        return 100000; // 100,000 VND cho đơn hàng trên 5kg
    }
}

?>

<!DOCTYPE HTML>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="max-age=604800" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Tiêu đề trang web - mẫu html bootstrap</title>

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
    <!-- nội dung header -->
</header>

<section class="section-content padding-y">
    <div class="container">
        <div class="row">
            <main class="col-md-9">
                <div class="card">
                    <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                            <tr class="small text-uppercase">
                                <th scope="col">Sản phẩm</th>
                                <th scope="col" width="120">Số lượng</th>
                                <th scope="col" width="120">Giá</th>
                                <th scope="col" width="120">Cân Nặng</th>
                                <th scope="col" class="text-right" width="200"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $index => $item) {
                                    ?>
                                    <tr>
                                        <td>
                                            <figure class="itemside">
                                                <div class="aside"><img src="images/image_cay/<?php echo htmlspecialchars($item['HinhAnh']); ?>" class="img-sm"></div>
                                                <figcaption class="info">
                                                    <a href="#" class="title text-dark"><?php echo htmlspecialchars($item['TenSP']); ?></a>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" value="<?php echo $item['quantity']; ?>" min="1">
                                        </td>                                     
                                        <td>
                                            <div class="price-wrap">
                                                <var class="price"><?php echo htmlspecialchars($item['Gia']);?> vnđ</var>
                                            </div>
                                           
                                        </td>
                                        <td>
                                        <div class="price-wrap">
                                                <var class="price"><?php echo htmlspecialchars($item['DoNang']);?> Kg</var>
                                            </div>
                                        </td>
                                        
                                        <td class="text-right">
                                            <form action="" method="post" style="display: inline;">
                                                <input type="hidden" name="remove_index" value="<?php echo $index; ?>">
                                                <button type="submit" name="remove_from_cart" class="btn btn-light">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='4'>Không có sản phẩm nào trong giỏ hàng</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="card-body border-top">
                        <a href="danhsachsanpham.php" class="btn btn-light"><i class="fa fa-chevron-left"></i> Tiếp tục mua sắm</a>
                    </div>  
                </div> <!-- card.// -->
            </main> <!-- col.// -->
            <aside class="col-md-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Tổng trọng lượng:</dt>
                            <dd class="text-right"><?php 
                                $total_weight = 0;
                                if (isset($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $item) {
                                        $total_weight += $item['DoNang'] * $item['quantity'];
                                    }
                                }
                                echo htmlspecialchars($total_weight) . ' kg';
                            ?></dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Tổng:</dt>
                            <dd class="text-right"><?php 
                                $total_price = 0;
                                if (isset($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $item) {
                                        $total_price += $item['Gia'] * $item['quantity'];
                                    }
                                }
                                echo htmlspecialchars($total_price) . ' vnđ';
                            ?></dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Phí vận chuyển</dt>
                            <a href="banggiavanchuyen.php"><img style = "width: 18px; height: 18px;" src="images/icons/dau_cham_hoi.jpg" alt="">   </a>
                            <dd class="text-right">
                                <?php
                                $shipping_fee = calculate_shipping_fee($total_weight);
                                echo htmlspecialchars($shipping_fee) . ' vnđ';
                                ?>
                            </dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Tổng thanh toán:</dt>
                            <dd class="text-right"><strong><?php echo htmlspecialchars($total_price + $shipping_fee) . ' vnđ'; ?></strong></dd>
                        </dl>
                        <hr>
                        <a href="ds_hoadon.php" class="btn btn-primary float-md-right">Mua hàng <i class="fa fa-chevron-right"></i></a>
                       
                    </div> <!-- card-body.// -->
                </div> <!-- card .// -->
            </aside> <!-- col.// -->
        </div> <!-- row.// -->
    </div> <!-- container .//  -->
</section>

<?php include 'footer.php'; ?>
<!-- Script JavaScript -->
<script src="js/jquery-2.0.0.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $(".quantity").change(function(){
            var index = $(this).closest('tr').index();
            var quantity = $(this).val();
            var price = <?php echo json_encode($item['Gia']); ?>;
            var newPrice = quantity * price;

            $("#price_" + index).text(newPrice.toLocaleString('vi-VN') + " vnđ");
        });
    });
</script>
</body>
</html>

