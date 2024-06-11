<?php
$sql = "SELECT * FROM donhang";
$stmt = $conn->prepare($sql);
$stmt->execute();

$user = $stmt->fetchAll(PDO::FETCH_OBJ);


$sql_total_revenue = "SELECT SUM(TongTien) AS TotalRevenue FROM donhang";
                  $stmt_total_revenue = $conn->prepare($sql_total_revenue);
                  $stmt_total_revenue->execute();
                  $row_total_revenue = $stmt_total_revenue->fetch(PDO::FETCH_ASSOC);
                  $totalRevenue = $row_total_revenue['TotalRevenue'];
?>

<table class="table">
    <tr>
        <td>MaDH</td>
        <td>MaDN</td>
        <td>NgayDat</td>
        <td>TongTien</td>
        <td>TrangThai</td>
    </tr>
    <?php foreach ($user as $item): ?>
        <tr>
            <td><?php echo $item->MaDH ?></td>
            <td><?php echo $item->MaDN ?></td>
            <td><?php echo $item->NgayDat ?></td>
            <td><?php echo $item->TongTien ?></td>
            <td><?php echo $item->TrangThai?></td>
            <td><a href="edit_donhang.php?id=<?php echo $item->MaDH ?>">Edit</a></td>
            <td><a href="delete_donhang.php?id=<?php echo $item->MaDH ?>">Delete</a></td>
            <td><a href="ctdh_donhang.php?id=<?php echo $item->MaDH ?>">Order Details</a></td>

        </tr>
    <?php endforeach?>
</table>
