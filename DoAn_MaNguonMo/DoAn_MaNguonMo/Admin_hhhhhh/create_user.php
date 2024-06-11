<?php
include './config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin từ form thêm mới người dùng
    $MaDN = $_POST['MaDN'];
    $TenDN = $_POST['TenDN'];
    $HoTen = $_POST['HoTen'];
    $Role = $_POST['Role'];
    $GioiTinh = $_POST['GioiTinh'];
    $DiaChi = $_POST['DiaChi'];
    $Email = $_POST['Email'];

    // Chuẩn bị câu truy vấn INSERT
    $sql = "INSERT INTO nguoidung (MaDN,TenDN, HoTen, Role, GioiTinh, DiaChi, Email) VALUES (:MaDN, :TenDN, :HoTen, :Role, :GioiTinh, :DiaChi, :Email)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':MaDN', $MaDN);
    $stmt->bindParam(':TenDN', $TenDN);
    $stmt->bindParam(':HoTen', $HoTen);
    $stmt->bindParam(':Role', $Role);
    $stmt->bindParam(':GioiTinh', $GioiTinh);
    $stmt->bindParam(':DiaChi', $DiaChi);
    $stmt->bindParam(':Email', $Email);

    // Thực thi câu truy vấn
    if ($stmt->execute()) {
        // Nếu thêm mới thành công, chuyển hướng người dùng về trang hiển thị danh sách người dùng
        header("Location: index3_admin.php");
        exit();
    } else {
        // Nếu có lỗi, hiển thị thông báo lỗi
        echo "Đã xảy ra lỗi khi thêm mới người dùng.";
    }
}
?>
