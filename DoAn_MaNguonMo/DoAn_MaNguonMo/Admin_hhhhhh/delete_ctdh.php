<?php
include "./config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Câu lệnh SQL để xóa dữ liệu
    $sql = "DELETE FROM ctdh WHERE MaCT = :id";
    
    // Chuẩn bị câu lệnh
    $stmt = $conn->prepare($sql);
    
    // Gán giá trị cho tham số :id
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    // Thực thi câu lệnh
    if ($stmt->execute()) {
        // Chuyển hướng về trang danh sách sau khi xóa thành công
        header("Location: index2_admin.php");
        exit();
    } else {
        echo "Lỗi khi xóa dữ liệu";
    }
} else {
    echo "Không có ID để xóa";
}
?>
