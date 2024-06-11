<?php
// Kết nối CSDL
include('./config.php');

// Biến lưu thông báo
$message = "";

// Mảng lựa chọn trạng thái
$statusOptions = array("Chưa xử lý", "Đang xử lý", "Đã giao hàng");

// Kiểm tra nếu có dữ liệu POST được gửi từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $MaDN = $_POST['MaDN'];
    $NgayDat = $_POST['NgayDat'];
    $TongTien = $_POST['TongTien'];
    $TrangThai = $_POST['TrangThai'];

    // Chuẩn bị câu lệnh SQL để chèn dữ liệu mới vào cơ sở dữ liệu
    $sql = "INSERT INTO donhang (MaDN, NgayDat, TongTien, TrangThai) VALUES (?, ?, ?, ?)";

    // Chuẩn bị và thực thi truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->execute([$MaDN, $NgayDat, $TongTien, $TrangThai]);

    // Kiểm tra và hiển thị thông báo
    if ($stmt) {
        $message = "Thêm đơn hàng thành công.";
        // Chuyển hướng về trang chủ sau khi thêm thành công
        header("refresh:2; url=index_admin.php");
    } else {
        $message = "Lỗi: " . $conn->errorInfo();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Đơn Hàng</title>
    <style>
        .message {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>Thêm Đơn Hàng</h2>
    <!-- Hiển thị thông báo -->
    <?php if (!empty($message)): ?> 
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="MaDN">Mã Doanh Nghiệp:</label><br>
        <input type="text" id="MaDN" name="MaDN"><br>
        <label for="NgayDat">Ngày Đặt:</label><br>
        <input type="date" id="NgayDat" name="NgayDat"><br>
        <label for="TongTien">Tổng Tiền:</label><br>
        <input type="text" id="TongTien" name="TongTien"><br>
        <label for="TrangThai">Trạng Thái:</label><br>
        <select id="TrangThai" name="TrangThai">
            <?php foreach ($statusOptions as $option): ?>
                <option value="<?php echo $option; ?>"><?php echo $option; ?></option>
            <?php endforeach; ?>
        </select><br><br>
        <input type="submit" value="Thêm">
    </form>
</body>
</html>
