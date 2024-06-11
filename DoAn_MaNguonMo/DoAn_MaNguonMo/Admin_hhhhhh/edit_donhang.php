<?php
// Kết nối CSDL
//include('..\connect.php');
include('./config.php');


// Kiểm tra nếu có dữ liệu POST được gửi từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $MaDH = $_GET['id'];
    $MaDN = $_POST['MaDN'];
    $NgayDat = $_POST['NgayDat'];
    $TongTien = $_POST['TongTien'];
    $TrangThai = $_POST['TrangThai'];

    // Chuẩn bị câu lệnh SQL
    $sql = "UPDATE donhang SET MaDN=?, NgayDat=?, TongTien=?, TrangThai=? WHERE MaDH=?";

    // Chuẩn bị và thực thi truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->execute([$MaDN, $NgayDat, $TongTien, $TrangThai, $MaDH]);

    // Kiểm tra và hiển thị thông báo
    if ($stmt) {
        // Chuyển hướng về trang index
        header("Location: index2_admin.php");
        exit();
    } else {
        echo "Lỗi: " . $conn->errorInfo();
    }

} else {
    // Kiểm tra nếu có tham số MaDH được truyền qua URL
    if (isset($_GET['id'])) {
        // Lấy mã đơn hàng từ URL
        $MaDH = $_GET['id'];

        // Truy vấn để lấy thông tin đơn hàng cần sửa
        $query = "SELECT * FROM donhang WHERE MaDH=?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$MaDH]);

        // Kiểm tra xem có kết quả trả về không
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
            <!-- Form để hiển thị thông tin đơn hàng và cho phép sửa -->
            <div class="container mt-5">
                <h2 class="mb-4">Sửa Thông Tin Đơn Hàng</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . '?id=' . $row['MaDH']); ?>">
                    <div class="form-group">
                        <label for="MaDN">Mã doanh nghiệp:</label>
                        <input type="text" class="form-control" id="MaDN" name="MaDN" value="<?php echo $row['MaDN']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="NgayDat">Ngày đặt:</label>
                        <input type="text" class="form-control datepicker" id="NgayDat" name="NgayDat" value="<?php echo $row['NgayDat']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="TongTien">Tổng tiền:</label>
                        <input type="text" class="form-control" id="TongTien" name="TongTien" value="<?php echo $row['TongTien']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="TrangThai">Trạng thái:</label>
                        <select class="form-control" id="TrangThai" name="TrangThai">
                            <option value="Chờ xác nhận" <?php if ($row['TrangThai'] == 'Chờ xác nhận') echo 'selected'; ?>>Chờ xác nhận</option>
                            <option value="Chờ xử lý" <?php if ($row['TrangThai'] == 'Chờ xử lý') echo 'selected'; ?>>Chờ xử lý</option>
                            <option value="Đang xử lý" <?php if ($row['TrangThai'] == 'Đang xử lý') echo 'selected'; ?>>Đang xử lý</option>
                            <option value="Đang Vận Chuyển" <?php if ($row['TrangThai'] == 'Đang Vận Chuyển') echo 'selected'; ?>>Đang Vận Chuyển</option>
                            <option value="Đã Giao Hàng" <?php if ($row['TrangThai'] == 'Đã Giao Hàng') echo 'selected'; ?>>Đã Giao Hàng</option>
                            

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </form>
            </div>

            <!-- Thêm Bootstrap Datepicker CSS và JS -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
            <script>
                $(document).ready(function(){
                    $('.datepicker').datepicker({
                        format: 'yyyy-mm-dd',
                        autoclose: true,
                        todayHighlight: true
                    });
                });
            </script>
<?php
        } else {
            echo "Không tìm thấy đơn hàng.";
        }
    } else {
        echo "Mã đơn hàng không được xác định.";
    }
}
?>
