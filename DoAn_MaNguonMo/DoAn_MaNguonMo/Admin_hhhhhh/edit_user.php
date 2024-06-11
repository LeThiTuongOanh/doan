<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Sửa Thông Tin Người Dùng</h2>
        <?php
            include './config.php';

            // Lấy thông tin người dùng cần chỉnh sửa
            $userID = $_GET['id']; // Lấy id người dùng từ URL
            $sql = "SELECT * FROM nguoidung WHERE MaDN = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $userID);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_OBJ);
        ?>
        <form action="update_user.php" method="POST">
            <input type="hidden" name="MaDN" value="<?php echo $user->MaDN; ?>">
            <div class="form-group">
                <label for="TenDN">Tên đăng nhập:</label>
                <input type="text" id="TenDN" name="TenDN" class="form-control" value="<?php echo $user->TenDN; ?>">
            </div>
            <div class="form-group">
                <label for="HoTen">Họ và tên:</label>
                <input type="text" id="HoTen" name="HoTen" class="form-control" value="<?php echo $user->HoTen; ?>">
            </div>
            <div class="form-group">
                <label for="Role">Vai trò:</label>
                <input type="text" id="Role" name="Role" class="form-control" value="<?php echo $user->Role; ?>">
            </div>
            <div class="form-group">
                <label for="GioiTinh">Giới tính:</label>
                <input type="text" id="GioiTinh" name="GioiTinh" class="form-control" value="<?php echo $user->GioiTinh; ?>">
            </div>
            <div class="form-group">
                <label for="SĐT">Số điện thoại:</label>
                <input type="text" id="SĐT" name="SĐT" class="form-control" value="<?php echo $user->SĐT; ?>">
            </div>
            <div class="form-group">
                <label for="DiaChi">Địa chỉ:</label>
                <input type="text" id="DiaChi" name="DiaChi" class="form-control" value="<?php echo $user->DiaChi; ?>">
            </div>
            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="text" id="Email" name="Email" class="form-control" value="<?php echo $user->Email; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
