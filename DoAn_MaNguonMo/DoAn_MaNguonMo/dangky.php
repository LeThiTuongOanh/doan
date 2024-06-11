<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>
	.ection-conten padding-y {
    background-image: url('nen.webp'); /* Thay 'hinh-nen.jpg' bằng đường dẫn đến hình ảnh của bạn */
    height: 100vh; /* 100% của chiều cao viewport */
    width: 100vw; /* 100% của chiều rộng viewport */
    background-position: center; /* Căn giữa hình nền */
    background-repeat: no-repeat; /* Không lặp lại hình nền */
	background-position: center;background-size: cover; /* Điều chỉnh kích thước hình nền để phủ kín */
}

.error {color: #FF0000;}
</style>
<title>Website title - bootstrap html template</title>

<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">

<!-- jQuery -->
<script src="js/jquery-2.0.0.min.js" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!-- Font awesome 5 -->
<link href="fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

<!-- custom style -->
<link href="css/ui.css" rel="stylesheet" type="text/css"/>
<link href="css/responsive.css" rel="stylesheet" type="text/css" />

<!-- custom javascript -->
<script src="js/script.js" type="text/javascript"></script>

</head>
<body>

<?php
session_start();
include 'connect.php'; // Kết nối đến cơ sở dữ liệu

// Biến lưu trữ thông tin lỗi
$nameErr = $emailErr = $genderErr = $websiteErr =$passErr= $HotenErr= $SdtErr= $DiaChiErr="";
$name = $email = $gender = $comment = $website = $sdt = $diachi = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
      $nameErr = "Nhập username";
    } else {
      $name = test_input($_POST["username"]);
    }
    
    if (empty($_POST["password"])) {
      $passErr = "Vui lòng nhập mật khẩu";
    } else {
      $password = test_input($_POST["password"]);
    }
    if (empty($_POST["hoten"])) {
        $HotenErr = "Vui lòng nhập họ tên";
      } else {
        $hoten = test_input($_POST["hoten"]);
      }
      if (empty($_POST["email"])) {
        $emailErr = "Vui lòng nhập email";
      } else {
        $email = test_input($_POST["email"]);
      }
    if (empty($_POST["sdt"])) {
        $SdtErr = "Vui lòng nhập SĐT";
      } else {
        $sdt = test_input($_POST["sdt"]);
      }
    if (empty($_POST["diachi"])) {
        $DiaChiErr = "Vui lòng nhập địa chỉ";
      } else {
        $diachi = test_input($_POST["diachi"]);
      }

    if (empty($_POST["gender"])) {
        $genderErr = "Chọn giới tính";
      } else {
        $gender = test_input($_POST["gender"]);
      }

    // Nếu không có lỗi, thực hiện thêm dữ liệu vào CSDL
    if (empty($nameErr) && empty($passErr) && empty($HotenErr) && empty($emailErr) && empty($genderErr) && empty($SdtErr) && empty($DiaChiErr)) {
        // Tạo câu truy vấn để chèn dữ liệu mới vào bảng người dùng
        $sql = "INSERT INTO nguoidung (TenDN, MatKhau, HoTen, Role, GioiTinh, Email, SĐT, DiaChi) 
                VALUES (:username, :password, :hoten, 'USER', :gender, :email, :sdt, :diachi)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $name);
        $stmt->bindParam(':password', md5($password)); // Bạn có thể mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':sdt', $sdt);
        $stmt->bindParam(':diachi', $diachi);

        // Thực thi câu truy vấn
        if ($stmt->execute()) {
            // Đăng ký thành công, chuyển hướng người dùng đến trang đăng nhập hoặc trang chủ
            header("Location: login.php");
            exit();
        } else {
            echo "Đã xảy ra lỗi khi thực hiện đăng ký. Vui lòng thử lại sau.";
        }
    }
}

// Hàm xử lý dữ liệu đầu vào
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-conten padding-y" style="min-height:84vh ; background-image: url('images/nen2.jpg');background-repeat: no-repeat; height: 100vh; width: 100vw;background-position: center;background-size: cover; ">
  
<!-- ============================ COMPONENT LOGIN   ================================= -->
  <div class="card mx-auto" style="max-width: 500px;max-height:700px; margin-top:100px;" >
      <div class="card-body">

      <h2 class="card-title mb-4">Sign up</h2>
<p><span class="error">*Trường bắt buộc</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

        <div class="form-group">
             Họ tên <span class="error">* <?php echo $HotenErr;?></span>
            <input name="hoten" class="form-control" type="text">
          </div> 
        <div class="form-group">
            User Name <span class="error">* <?php echo $nameErr;?></span>             
             <input name="username" class="form-control"  type="text">
          </div> 
          
          <div class="form-group md-4">
              Password <span class="error">* <?php echo $passErr;?></span>
              <input name="password" class="form-control" type="password">
          </div>
          <div class="form-group">
              Email <span class="error">* <?php echo $emailErr;?></span>
             <input name="email" class="form-control" type="text">
          </div> 
           
          <div class="form-group">
            SĐT <span class="error">* <?php echo $SdtErr;?></span>
            <input name="sdt" class="form-control" type="text">
          </div> 

          <div class="form-group">
              Địa chỉ <span class="error">* <?php echo $DiaChiErr;?></span>
              <input name="diachi" class="form-control" type="text">
          </div> 

      
            <br><br>
            Giới tính:
            <input type="radio" name="gender" value="Nữ">Female

            <input type="radio" name="gender" value="Nam">Male

            <input type="radio" name="gender" value="Khác">Other
            <span class="error">* <?php echo $genderErr;?></span>
            <br><br>
      <input type="submit" name="submit" value="Submit">  
    </form>
          </div> <!-- card-body.// -->
        </div> <!-- card .// -->
    
         <p class="text-center mt-4">Don't have account? <a href="dangky.php">Sign up</a></p>
         <br><br>
    <!-- ============================ COMPONENT LOGIN  END.// ================================= -->
    
    
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->
    
    <!-- ========================= FOOTER ========================= -->
    <?php include 'footer.html'; ?>
    <!-- ========================= FOOTER END // ========================= -->
    
    
    </body>
    </html>