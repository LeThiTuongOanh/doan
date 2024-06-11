<?php
// Kết nối cơ sở dữ liệu
include './config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lấy thông tin sản phẩm từ cơ sở dữ liệu
    $sql = "SELECT * FROM sanpham WHERE MASP = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        echo "Không tìm thấy sản phẩm.";
        exit;
    }
} else {
    echo "ID sản phẩm không hợp lệ.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Xử lý cập nhật sản phẩm
    $TenSP = $_POST['TenSP'];
    $MoTa = $_POST['MoTa'];
    $Gia = $_POST['Gia'];
    $SoLuongTon = $_POST['SoLuongTon'];
    $MaDM = $_POST['MaDM'];
    $HinhAnh = $_POST['HinhAnh'];
    $MaNCC = $_POST['MaNCC'];
    $ChieuCao = $_POST['ChieuCao'];
    $DoNang = $_POST['DoNang'];
    $HinhAnh1 = $_POST['HinhAnh1'];
    $HInhAnh2 = $_POST['HinhAnh2'];
    $HinhAnh3 = $_POST['HinhAnh3'];

    $sql_update = "UPDATE sanpham SET TenSP = :TenSP, MoTa = :MoTa, Gia = :Gia, SoLuongTon = :SoLuongTon, MaDM = :MaDM, HinhAnh = :HinhAnh, MaNCC = :MaNCC, ChieuCao = :ChieuCao, DoNang = :DoNang, HinhAnh1 = :HinhAnh1, HInhAnh2 = :HInhAnh2, HinhAnh3 = :HinhAnh3 WHERE MASP = :id";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bindParam(':TenSP', $TenSP);
    $stmt_update->bindParam(':MoTa', $MoTa);
    $stmt_update->bindParam(':Gia', $Gia);
    $stmt_update->bindParam(':SoLuongTon', $SoLuongTon, PDO::PARAM_INT);
    $stmt_update->bindParam(':MaDM', $MaDM);
    $stmt_update->bindParam(':HinhAnh', $HinhAnh);
    $stmt_update->bindParam(':MaNCC', $MaNCC);
    $stmt_update->bindParam(':ChieuCao', $ChieuCao);
    $stmt_update->bindParam(':DoNang', $DoNang);
    $stmt_update->bindParam(':HinhAnh1', $HinhAnh1);
    $stmt_update->bindParam(':HInhAnh2', $HInhAnh2);
    $stmt_update->bindParam(':HinhAnh3', $HinhAnh3);
    $stmt_update->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt_update->execute()) {
        header("Location: index_admin.php?message=update_success");
        exit;
    } else {
        echo "Cập nhật sản phẩm thất bại.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa sản phẩm</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3>Chỉnh sửa sản phẩm</h3>
    <form method="POST">
        <div class="form-group">
            <label>Tên sản phẩm:</label>
            <input type="text" name="TenSP" class="form-control" value="<?php echo htmlspecialchars($product['TenSP']); ?>">
        </div>

        <div class="form-group">
            <label>Mô tả:</label>
            <textarea name="MoTa" class="form-control"><?php echo htmlspecialchars($product['MoTa']); ?></textarea>
        </div>

        <div class="form-group">
            <label>Giá:</label>
            <input type="number" name="Gia" class="form-control" value="<?php echo htmlspecialchars($product['Gia']); ?>">
        </div>

        <div class="form-group">
            <label>Số lượng tồn:</label>
            <input type="number" name="SoLuongTon" class="form-control" value="<?php echo htmlspecialchars($product['SoLuongTon']); ?>">
        </div>

        <div class="form-group">
            <label>Mã danh mục:</label>
            <input type="text" name="MaDM" class="form-control" value="<?php echo htmlspecialchars($product['MaDM']); ?>">
        </div>

        <div class="form-group">
            <label>Hình ảnh:</label>
            <input type="text" name="HinhAnh" class="form-control" value="<?php echo htmlspecialchars($product['HinhAnh']); ?>">
        </div>

        <div class="form-group">
            <label>Mã nhà cung cấp:</label>
            <input type="text" name="MaNCC" class="form-control" value="<?php echo htmlspecialchars($product['MaNCC']); ?>">
        </div>

        <div class="form-group">
            <label>Chiều cao:</label>
            <input type="text" name="ChieuCao" class="form-control" value="<?php echo htmlspecialchars($product['ChieuCao']); ?>">
        </div>

        <div class="form-group">
            <label>Độ nặng:</label>
            <input type="text" name="DoNang" class="form-control" value="<?php echo htmlspecialchars($product['DoNang']); ?>">
        </div>

        <div class="form-group">
            <label>Hình ảnh 1:</label>
            <input type="text" name="HinhAnh1" class="form-control" value="<?php echo htmlspecialchars($product['HinhAnh1']); ?>">
        </div>

        <div class="form-group">
            <label>Hình ảnh 2:</label>
            <input type="text" name="HInhAnh2" class="form-control" value="<?php echo htmlspecialchars($product['HInhAnh2']); ?>">
        </div>

        <div class="form-group">
            <label>Hình ảnh 3:</label>
            <input type="text" name="HinhAnh3" class="form-control" value="<?php echo htmlspecialchars($product['HinhAnh3']); ?>">
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
