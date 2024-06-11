<?php
session_start();

function calculate_shipping_fee($total_weight) {
    if ($total_weight <= 1) {
        return 30000; // 30,000 VND cho đơn hàng dưới 1kg
    } elseif ($total_weight <= 5) {
        return 50000; // 50,000 VND cho đơn hàng từ 1kg đến 5kg
    } else {
        return 100000; // 100,000 VND cho đơn hàng trên 5kg
    }
}

// Start output buffering
$total_price = 0;
$total_weight = 0;

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $total_price += $item['Gia'] * $item['quantity'];
        $total_weight += $item['DoNang'] * $item['quantity'];
    }
}

$shipping_fee = calculate_shipping_fee($total_weight);
$total_amount = $total_price + $shipping_fee;

// Store the total amount in the session
$_SESSION['total_amount'] = $total_amount;
?>

<?php
?>
<!DOCTYPE HTML>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hóa Đơn - Chi Tiết Mua Hàng</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="css/ui.css" rel="stylesheet" type="text/css"/>
    <link href="css/responsive.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<header class="section-header">
    <!-- nội dung header -->
</header>

<section class="section-content padding-y">
    <div class="container">
         <!-- Đoạn mã hiển thị hóa đơn -->
        <h2>Hóa Đơn</h2>
        <div class="card">
            <div class="card-body">
                <h4>Chi Tiết Đơn Hàng</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Trọng lượng</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_price = 0;
                        $total_weight = 0;

                        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $item) {
                                $total_price += $item['Gia'] * $item['quantity'];
                                $total_weight += $item['DoNang'] * $item['quantity'];
                                ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($item['TenSP']); ?></td>
                                    <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                                    <td><?php echo number_format(htmlspecialchars($item['Gia']), 0, ',', '.'); ?> vnđ</td>
                                    <td><?php echo htmlspecialchars($item['DoNang']); ?> kg</td>
                                    <td><?php echo number_format(htmlspecialchars($item['Gia'] * $item['quantity']), 0, ',', '.'); ?> vnđ</td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='5'>Không có sản phẩm nào trong giỏ hàng</td></tr>";
                        }

                        $shipping_fee = calculate_shipping_fee($total_weight);
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">Tổng giá trị sản phẩm</td>
                            <td><?php echo number_format(htmlspecialchars($total_price), 0, ',', '.'); ?> vnđ</td>
                        </tr>
                        <tr>
                            <td colspan="4">Phí vận chuyển</td>
                            <td><?php echo number_format(htmlspecialchars($shipping_fee), 0, ',', '.'); ?> vnđ</td>
                        </tr>
                        <tr>
                            <td colspan="4"><strong>Tổng thanh toán</strong></td>
                            <td><strong><?php echo number_format(htmlspecialchars($total_price + $shipping_fee), 0, ',', '.'); ?> vnđ</strong></td>
                        </tr>
                    </tfoot>
                </table>
                        

                <!-- Form for Thanh toán khi nhận hàng -->
                <form action="sendmail.php" method="POST">
                    <button type="submit" class="btn btn-primary float-md-right">Thanh toán khi nhận hàng<i class="fa fa-chevron-right"></i></button>
                </form>

                <br>
                <br>
                <div>
                <?php // Thêm một nút thanh toán qua vnpay
                    echo '<a href="vnpay_php/index_vnpay.php" class="btn btn-primary float-md-right">Thanh toán qua vnpay<i class="fa fa-chevron-right"></i></a>';
                ?>
                </div>
            </div>
        </div>               
        <!-- Kết thúc đoạn mã hiển thị hóa đơn -->
    </div>
</section>
</body>
</html>
