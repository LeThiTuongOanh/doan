
<nav class="navbar navbar-main navbar-expand-lg border-bottom">
    <div class="container">
  
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse" id="main_nav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Trang chủ</a>
          </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-bars text-muted mr-2"></i> Danh Mục </a>
            <div class="dropdown-menu">
              <?php include 'danhmuc.php'; ?>
            </div>
          </li>
           
          <li class="nav-item">
            <a class="nav-link" href="listdanhmuc.php">List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="danhsachsanpham.php">Danh sách sản phẩm</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="vechungtoi.php">Về chúng tôi</a>
          </li>
          
        </ul>
      
      </div> <!-- collapse .// -->
    </div> <!-- container .// -->
  </nav>
  </header> <!-- section-header.// -->
  