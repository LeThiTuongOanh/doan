<?php
include 'connect.php'; // Bao gồm tệp kết nối PDO

$sql = "SELECT * FROM danhmuc";
$stmt = $conn->prepare($sql);
$stmt->execute();

$categories = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
<div class="container">
<section class="section-main padding-y">
<main class="card">
	<div class="card-body">

<div class="row">
    <aside class="col-lg col-md-2 flex-lg-grow-0">
        <nav class="nav-home-aside">
            <ul class="menu-category">
                <?php
                if ($categories) {
                    foreach ($categories as $category) {
                        echo '<li><a href="danhsachtheodanhmuc.php?danhmuc_id=' . htmlspecialchars($category->MaDM) . '">' . htmlspecialchars($category->TenDM) . '</a></li>';
                    }
                } else {
                    echo "<li><a href='#'>Không tìm thấy danh mục</a></li>";
                }
                ?>
            </ul>
        </nav>
    </aside> <!-- col.// -->
    <div class="col-md-9 col-xl-7 col-lg-7">
</div>