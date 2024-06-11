<?php
include './config.php';

if(isset($_GET['id'])) {
    $userID = $_GET['id'];
    
    $sql = "DELETE FROM nguoidung WHERE MaDN = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $userID);
    if($stmt->execute()) {
        
        header("Location: index3_admin.php?message=delete_success");
        exit();
    } else {
        // Nếu có lỗi, hiển thị thông báo lỗi
        echo "Đã xảy ra lỗi khi xóa người dùng.";
    }
} else {
    // Nếu không có tham số id, hiển thị thông báo lỗi
    echo "Thiếu thông tin cần thiết để xóa người dùng.";
}
?>
