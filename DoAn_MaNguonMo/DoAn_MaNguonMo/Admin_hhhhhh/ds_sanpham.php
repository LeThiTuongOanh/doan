<?php
// Số lượng sản phẩm hiển thị trên mỗi trang
$records_per_page = 10;

// Tính tổng số sản phẩm
$sql_count = "SELECT COUNT(*) AS total FROM sanpham";
$stmt_count = $conn->prepare($sql_count);
$stmt_count->execute();
$row_count = $stmt_count->fetch(PDO::FETCH_ASSOC);
$total_records = $row_count['total'];

// Tính tổng số trang
$total_pages = ceil($total_records / $records_per_page);

// Xác định trang hiện tại
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

// Giới hạn sản phẩm lấy từ cơ sở dữ liệu
$start = ($current_page - 1) * $records_per_page;

// Lấy danh sách sản phẩm cho trang hiện tại
$sql = "SELECT * FROM sanpham LIMIT :start, :records_per_page";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':start', $start, PDO::PARAM_INT);
$stmt->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
<h3><a href="add_sanpham.html   ">Thêm Mới</a></h3>
<?php
if(isset($_GET['message'])) {
    if($_GET['message'] == 'delete_success') {
        echo '<p class="success-message">Người dùng đã được xóa thành công.</p>';
    }
}
?>

<table class="table">
    <tr>
        <td>MASP</td>
        <td>TenSP</td>
        <td>MoTa</td>
        <td>Gia</td>
        <td>SoLuongTon</td>
        <td>MaDM</td>
        <td>HinhAnh</td>
        <td>MaNCC</td>
        <td>ChieuCao</td>
        <td>DoNang</td>
    </tr>
    <?php foreach ($user as $item): ?>
        <tr>
            <td><?php echo $item->MASP ?></td>
            <td><?php echo $item->TenSP ?></td>
            <td><?php echo $item->MoTa ?></td>
            <td><?php echo $item->Gia ?></td>
            <td><?php echo $item->SoLuongTon; ?></td>
            <td><?php echo $item->MaDM ?></td>
            <td><img src="../images/image_cay/<?php echo htmlspecialchars($item->HinhAnh);?>" width=60px;></td>
            <td><?php echo $item->MaNCC ?></td>
            <td><?php echo $item->ChieuCao; ?></td>
            <td><?php echo $item->DoNang ?></td>
            <td><a href="edit_sanpham.php?id=<?php echo $item->MASP ?>"style="color:red">Edit</a></td>
            <td><a href="delete_sanpham.php?id=<?php echo $item->MASP ?>">Delete</a></td>
        </tr>
    <?php endforeach?>
</table>
<nav class="mb-4" aria-label="Page navigation sample">
  <ul class="pagination">
    <li class="page-item <?php if($current_page == 1) echo 'disabled'; ?>"><a class="page-link" href="?page=<?php echo ($current_page - 1); ?>">Previous</a></li>
    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <li class="page-item <?php if($i === $current_page) echo 'active'; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php endfor; ?>
    <li class="page-item <?php if($current_page == $total_pages) echo 'disabled'; ?>"><a class="page-link" href="?page=<?php echo ($current_page + 1); ?>">Next</a></li>
  </ul>
</nav>