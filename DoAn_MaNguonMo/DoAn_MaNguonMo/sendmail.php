<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
include 'ds_hoadon.php';
ob_start();
$mail = new PHPMailer(true);
try {
    // Cấu hình SMTP và các thông tin gửi mail
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'leele010101@gmail.com'; // Thay đổi thành email của bạn
    $mail->Password = 'hmwvuibkpjvcsvch'; // Thay đổi thành mật khẩu của bạn
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Địa chỉ người gửi và người nhận
    $mail->setFrom('leele010101@gmail.com', 'leele');
    $mail->addAddress('buihungphuong0218@gmail.com', 'Bui Hung Phuong');

    // Nội dung email
    $mail->isHTML(true);
    $mail->Subject = 'Chi tiết đơn hàng';

    // Tạo nội dung email với thông tin sản phẩm đã mua
    $message = '<h3>Chi tiết đơn hàng</h3>';
    $message .= '<table border="1">';
    $message .= '<tr><th>Sản phẩm</th><th>Số lượng</th><th>Giá</th><th>Trọng lượng</th><th>Hình ảnh</th><th>Tổng</th></tr>';
    foreach ($_SESSION['cart'] as $item) {
        $message .= '<tr>';
        $message .= '<td>' . htmlspecialchars($item['TenSP']) . '</td>';
        $message .= '<td>' . htmlspecialchars($item['quantity']) . '</td>';
        $message .= '<td>' . number_format(htmlspecialchars($item['Gia']), 0, ',', '.') . ' vnđ</td>';
        $message .= '<td>' . htmlspecialchars($item['DoNang']) . ' kg</td>';
        // Nhúng hình ảnh vào email
        $message .= '<td><img src="images/image_cay/' . $item['HinhAnh'] . '" alt="' . $item['TenSP'] . '" style="max-width: 100px;"></td>';
        $message .= '<td>' . number_format(htmlspecialchars($item['Gia'] * $item['quantity']), 0, ',', '.') . ' vnđ</td>';
        $message .= '</tr>';
    }
    $message .= '</table>';

    // Thêm thông tin về giá, phí vận chuyển và tổng thanh toán
    $message .= '<p><strong>Tổng giá trị sản phẩm:</strong> ' . number_format($total_price, 0, ',', '.') . ' vnđ</p>';
    $message .= '<p><strong>Phí vận chuyển:</strong> ' . number_format($shipping_fee, 0, ',', '.') . ' vnđ</p>';
    $message .= '<p><strong>Tổng thanh toán:</strong> ' . number_format($total_price + $shipping_fee, 0, ',', '.') . ' vnđ</p>';

    $mail->Body = $message;

    // Gửi email
    $mail->send();
    header('Location: xacnhan.php');
    exit();
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

ob_end_flush();
?>
