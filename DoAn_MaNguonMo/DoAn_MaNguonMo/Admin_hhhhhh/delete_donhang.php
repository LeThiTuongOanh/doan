<?php
// Include file config.php
include('./config.php');

// Kiểm tra nếu có dữ liệu GET được gửi từ URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Lấy ID đơn hàng từ URL
    $MaDH = $_GET['id'];

    // Chuẩn bị câu lệnh SQL để xóa đơn hàng
    $sql = "DELETE FROM donhang WHERE MaDH = :MaDH";

    // Chuẩn bị và thực thi truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':MaDH', $MaDH, PDO::PARAM_INT);

    if($stmt->execute()) {
        // Nếu xóa thành công, hiển thị thông báo và chuyển hướng về trang chủ sau 2 giây
        $message = "Đơn hàng đã được xóa thành công.";
        $redirect_url = "index2_admin.php";
    } else {
        // Nếu xóa không thành công, hiển thị thông báo lỗi
        $message = "Lỗi xóa đơn hàng: " . $stmt->errorInfo()[2];
    }
} else {
    // Nếu không có ID đơn hàng được cung cấp, hiển thị thông báo lỗi
    $message = "Không tìm thấy đơn hàng cần xóa.";
}

// Gắn thẻ HTML cho thông báo
$message_html = '<div style="padding: 20px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px; margin-bottom: 20px;">' . $message . '</div>';
// Thực hiện chuyển hướng
header("refresh:2; url=$redirect_url");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa Đơn Hàng</title>
</head>
<body>
    <h2 style="margin-bottom: 20px;">Thông báo</h2>
    <?php echo $message_html; ?>
    <p>Đang chuyển hướng...</p>
</body>
</html>
