<?php
if (!isset($_SESSION)) session_start();

include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['Username']);
    $password = trim($_POST['Password']);
    $password = md5($password);
    $stmt = $conn->prepare("SELECT MaDN, TenDN, MatKhau, Role FROM nguoidung WHERE TenDN=:username");
    $stmt->bindParam(':username', $username , PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
   
    if ($result) {
        if (strcmp( $password, $result['MatKhau']) == 0) {
            $_SESSION['TenDN'] = $result['TenDN'];
            $_SESSION['Role'] = $result['Role'];

            if (isset($result['MaDN'])) { // Kiểm tra khóa 'MaDN' tồn tại trong $result
                $_SESSION['MaDN'] = $result['MaDN'];
            }

            if ($result['Role'] == 'ADMIN') {
                header("Location: Admin_hhhhhh/index_admin.php");
                
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "Invalid username or password";
    }
}
?>
