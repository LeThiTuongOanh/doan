<?php
include "./config.php";

// Xử lý xóa sản phẩm
if(isset($_GET['id'])) {
    // Nhận ID của sản phẩm cần xóa
    $product_id = $_GET['id'];
    
    // Chuẩn bị truy vấn xóa
    $sql_delete = "DELETE FROM sanpham WHERE MASP = :id";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bindParam(':id', $product_id, PDO::PARAM_INT);
    
    // Thực thi truy vấn
    if($stmt_delete->execute()) {
        // Chuyển hướng người dùng sau khi xóa thành công
        header("Location: index_admin.php?message=delete_success");
        exit;
    } else {
        // Xử lý lỗi nếu có
        echo "Lỗi khi xóa sản phẩm.";
    }
}
?>

<!-- Mã HTML để hiển thị bảng sản phẩm -->
<table class="table">
    <!-- Các dòng dữ liệu sản phẩm -->
    <?php foreach ($user as $item): ?>
        <tr>
            <!-- Các cột dữ liệu của mỗi sản phẩm -->
            <!-- Đặt một cột mới với một liên kết "Xóa" -->
            <td><?php echo $item->MASP ?></td>
            <!-- Các cột dữ liệu khác -->
            <td><?php echo $item->TenSP ?></td>
            <!-- Các cột dữ liệu khác -->
            <!-- Thêm một cột cho liên kết "Xóa" -->
            <td><a href="delete_sanpham.php?id=<?php echo $item->MASP ?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?');">Xóa</a></td>
        </tr>
    <?php endforeach?>
</table>
