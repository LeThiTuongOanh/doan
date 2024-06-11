<?php

//include 'connect.php'; 

$sql = "SELECT * FROM sanpham";
$stmt = $conn->prepare($sql);
$stmt->execute();

$categories = $stmt->fetchAll(PDO::FETCH_OBJ);

?>

<section class="padding-bottom-sm">

<header class="section-heading heading-line">
	<h4 class="title-section text-uppercase">Recommended items</h4>
</header>
<div class="row row-sx">
<?php
if ($categories) {
    $maxItems = 12; 
    $count = 0; 
    foreach ($categories as $item) {
        if ($count < $maxItems) {
?>

            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                <div class="card card-sm card-product-grid">
                    <a href="chitietsanpham.php?idsach=<?php echo $item->MASP ?>">
                        <div class="img-wrap"> 
                            <img src="images/image_cay/<?php echo $item->HinhAnh ?>"> 
                        </div>
                        <figcaption class="info-wrap">
                            <div class="title"> <?php echo $item->TenSP ?></div>
                            <div class="price mt-1"><?php echo $item->Gia ?> vnđ</div> <!-- price-wrap.// -->
                        </figcaption>
                    </a>
                </div>
            </div> <!-- col.// -->

<?php
            $count++;
        } else {
            break;
        }
    }
} else {
    echo "<li><a href='#'>Không tìm thấy danh mục</a></li>";
}
?>
</div> <!-- row.// -->

</section>
<!-- =============== SECTION ITEMS .//END =============== -->
