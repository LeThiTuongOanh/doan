<?php
include './config.php';

$sql = "SELECT * FROM nguoidung";
$stmt = $conn->prepare($sql);
$stmt->execute();

$user = $stmt->fetchAll(PDO::FETCH_OBJ);



?>
<h3><a href="add_user.html">Thêm Mới</a></h3>
<?php
if(isset($_GET['message'])) {
    if($_GET['message'] == 'delete_success') {
        echo '<p class="success-message">Người dùng đã được xóa thành công.</p>';
    }
}
?>

<table class="table table-success table-striped">
    <tr>
        <td>MaDN</td>
        <td>TenDN</td>
        <td>HoTen</td>
        <td>Role</td>
        <td>GioiTinh</td>
        <td>DiaChi</td>
        <td>Email</td>
    </tr>
    <?php foreach ($user as $item): ?>
        <tr>
            <td><?php echo $item->MaDN; ?></td>
            <td><?php echo $item->TenDN; ?></td>
            <td><?php echo $item->HoTen; ?></td>
            <td><?php echo $item->Role; ?></td>
            <td><?php echo $item->GioiTinh; ?></td>
            <td><?php echo $item->DiaChi; ?></td>
            <td><?php echo $item->Email; ?></td>
            <td><a href="edit_user.php?id=<?php echo $item->MaDN; ?>">Edit</a></td>
            <td><a href="delete_user.php?id=<?php echo $item->MaDN; ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>