<?php
include "./config.php";
$sql = "SELECT * FROM ctdh";
$stmt = $conn->prepare($sql);
$stmt->execute();
$user = $stmt->fetchAll(PDO::FETCH_OBJ);
?>
<div class="container mt-5">
    <table class="table table-striped" border 2px>
        <thead class="thead-dark">
            <tr>
                <th>Mã Chi Tiết</th>
                <th>Mã Đơn Hàng</th>
                <th>Mã Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Giá</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user as $item): ?>
                <tr>
                    <td><?php echo $item->MaCT ?></td>
                    <td><?php echo $item->MaDH ?></td>
                    <td><?php echo $item->MaSP ?></td>
                    <td><?php echo $item->SoLuong ?></td>
                    <td><?php echo $item->Gia ?></td>
                    <td>
                        <a href="delete_ctdh.php?id=<?php echo $item->MaCT ?>" class="btn btn-danger" onclick="return confirm('Bạn muốn xóa dữ liệu này?');">Xóa</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
