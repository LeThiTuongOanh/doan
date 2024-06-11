
<header class="section-header">
    <section class="header-main border-bottom">
        <div class="container">
    <div class="row align-items-center">
        <div class="col-xl-2 col-lg-12 col-md-12">
            <a href="page-index.html" class="brand-wrap">
               
                <a href="index.php"> <img class="logo" src="images/logo1.png" width="100px" height="100px"></a>
            </a> <!-- brand-wrap.// -->
        </div>
        <div class="col-xl-6 col-lg-7 col-md-6">
        <form action="timkiem.php" class="search-header"  method="GET">
                <div class="input-group w-100">
                    <input name="search" type="text" class="form-control" placeholder="Tìm Kiếm">                    
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="submit">
                        <i class="fa fa-search"></i> Search
                      </button>
                    </div>
                </div>
            </form> <!-- search-wrap .end// -->
        </div> <!-- col.// -->
        <div class="col-xl-4 col-lg-5 col-md-6">
            <div class="widgets-wrap float-md-right">
                <!-- luu ten cua user đang nhap -->
                <div class="widget-header mr-3">
                <?php if (isset($_SESSION['TenDN'])): ?>
                    <div class="widget-view">
                        <div class="icon-area">
                            <i class="fa fa-user"></i>
                        </div>
                        <small class="text"> <?php echo htmlspecialchars($_SESSION['TenDN']); ?> </small>
                    </div>
                <?php else: ?>
                    <a href="login.php" class="widget-view">
                        <div class="icon-area">
                            <i class="fa fa-user"></i>
                            <span class="notify">3</span>
                        </div>
                        <small class="text"> Đăng Nhập </small>
                    </a>
                <?php endif; ?>
            </div>
                <div class="widget-header mr-3">
                    <a href="#" class="widget-view">
                        <div class="icon-area">
                            <i class="fa fa-comment-dots"></i>
                            <span class="notify">1</span>
                        </div>
                        <small class="text"> Message </small>
                    </a>
                </div>
                <div class="widget-header mr-3">
                    <a href="#" class="widget-view">
                        <div class="icon-area">
                            <i class="fa fa-store"></i>
                        </div>
                        <small class="text"> Orders </small>
                    </a>
                </div>
                <div class="widget-header">
                    <a href="giohang.php" class="widget-view">
                        <div class="icon-area">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="notify">
                                <?php
                                $total_items = 0;
                                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $item) {
                                        $total_items += $item['quantity'];
                                    }
                                }
                                echo $total_items;
                                ?>
                            </span>
                        </div>
                        <small class="text"> Giỏ Hàng </small>
                    </a>
                </div>

                <div class="widget-header mr-3">
                    <a href="login.php" class="widget-view">
                        <div class="icon-area">
                            <i class="fa fa-sign-out-alt"></i>
                        </div>
                        <small class="text"> Đăng Xuất </small>
                    </a>
                </div>
            </div> <!-- widgets-wrap.// -->
        </div> <!-- col.// -->
    </div> <!-- row.// -->
        </div> <!-- container.// -->
    </section> <!-- header-main .// -->
    
    </header> <!-- section-header.// -->
    

