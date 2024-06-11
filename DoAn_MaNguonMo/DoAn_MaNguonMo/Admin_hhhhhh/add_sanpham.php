<?php
require 'config.php'; // Assuming you have a config.php file to set up your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $TenSP = $_POST['TenSP'];
    $MoTa = $_POST['MoTa'];
    $Gia = $_POST['Gia'];
    $SoLuongTon = $_POST['SoLuongTon'];
    $MaDM = $_POST['MaDM'];
    $MaNCC = $_POST['MaNCC'];
    $ChieuCao = $_POST['ChieuCao'];
    $DoNang = $_POST['DoNang'];

    // Handle file upload
    $HinhAnh = $_FILES['HinhAnh']['name'];
    $target_dir = "../images/image_cay/";
    $target_file = $target_dir . basename($HinhAnh);
    move_uploaded_file($_FILES['HinhAnh']['tmp_name'], $target_file);

    $sql = "INSERT INTO sanpham (TenSP, MoTa, Gia, SoLuongTon, MaDM, HinhAnh, MaNCC, ChieuCao, DoNang)
            VALUES (:TenSP, :MoTa, :Gia, :SoLuongTon, :MaDM, :HinhAnh, :MaNCC, :ChieuCao, :DoNang)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':TenSP', $TenSP);
    $stmt->bindParam(':MoTa', $MoTa);
    $stmt->bindParam(':Gia', $Gia);
    $stmt->bindParam(':SoLuongTon', $SoLuongTon);
    $stmt->bindParam(':MaDM', $MaDM);
    $stmt->bindParam(':HinhAnh', $HinhAnh);
    $stmt->bindParam(':MaNCC', $MaNCC);
    $stmt->bindParam(':ChieuCao', $ChieuCao);
    $stmt->bindParam(':DoNang', $DoNang);

    if ($stmt->execute()) {
        header('Location: index.php?message=add_success');
        exit();
    } else {
        echo "Error: Could not execute the query.";
    }
} else {
    echo "Invalid request method.";
}
?>


