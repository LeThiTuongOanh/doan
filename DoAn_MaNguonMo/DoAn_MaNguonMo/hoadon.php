<?php
session_start();
include 'connect.php'; // Include file kết nối cơ sở dữ liệu của bạn

function calculate_shipping_fee($total_weight) {
    if ($total_weight <= 1) {
        return 30000; // 30,000 VND cho đơn hàng dưới 1kg
    } elseif ($total_weight <= 5) {
        return 50000; // 50,000 VND cho đơn hàng từ 1kg đến 5kg
    } else {
        return 100000; // 100,000 VND cho đơn hàng trên 5kg
    }
}

if (!isset($_SESSION['MaDN'])) {
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header('Location: login.php');
    exit();
}


if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $total_weight = 0;
    $total_price = 0;

    // Tính tổng trọng lượng và tổng giá
    foreach ($_SESSION['cart'] as $item) {
        $total_weight += $item['DoNang'] * $item['quantity'];
        $total_price += $item['Gia'] * $item['quantity'];
    }

    // Tính phí vận chuyển
    $shipping_fee = calculate_shipping_fee($total_weight);

    // Tính tổng thanh toán
    $total_payment = $total_price + $shipping_fee;

    // Giả sử `MaDN` là mã khách hàng và lấy từ session hoặc bất kỳ đâu bạn lưu thông tin khách hàng
    $MaDN = $_SESSION['MaDN']; 

    // Thêm vào bảng `donhang`
    $sql_donhang = "INSERT INTO donhang (MaDN, NgayDat, TongTien, TrangThai) VALUES (?, NOW(), ?, 'Chờ xử lý')";
    $stmt_donhang = $conn->prepare($sql_donhang);
    $stmt_donhang->bindParam(1, $MaDN, PDO::PARAM_INT);
    $stmt_donhang->bindParam(2, $total_payment, PDO::PARAM_INT);
    $stmt_donhang->execute();
    $MaDH = $conn->lastInsertId(); // Lấy ID đơn hàng vừa thêm

    // Thêm vào bảng `ctdh`
    $sql_ctdh = "INSERT INTO ctdh (MaDH, MaSP, SoLuong, Gia) VALUES (?, ?, ?, ?)";
    $stmt_ctdh = $conn->prepare($sql_ctdh);

    foreach ($_SESSION['cart'] as $item) {
        $stmt_ctdh->bindParam(1, $MaDH, PDO::PARAM_INT);
        $stmt_ctdh->bindParam(2, $item['MASP'], PDO::PARAM_INT);
        $stmt_ctdh->bindParam(3, $item['quantity'], PDO::PARAM_INT);
        $stmt_ctdh->bindParam(4, $item['Gia'], PDO::PARAM_INT);
        $stmt_ctdh->execute();
    }

    // Xóa giỏ hàng sau khi thêm đơn hàng thành công
    unset($_SESSION['cart']);

    // Chuyển hướng đến trang xác nhận đơn hàng hoặc trang chủ
    header('Location: xacnhan.php');
    exit();
} else {
    // Nếu giỏ hàng trống, chuyển hướng về trang giỏ hàng
    header('Location: giohang.php');
    exit();
}
?>
