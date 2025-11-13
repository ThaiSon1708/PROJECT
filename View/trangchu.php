<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kinh Đô Bánh Trung Thu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #fffbe6 0%, #fff 100%);
            margin: 0;
        }
        .navbar {
            background: linear-gradient(90deg, #C1272D 0%, #FFD700 100%);
            box-shadow: 0 2px 8px #FFD70033;
        }
        .navbar .nav-link, .navbar .dropdown-toggle {
            color: #fff !important;
            font-weight: 500;
            font-size: 1.1em;
        }
        .navbar .nav-link:hover, .navbar .dropdown-toggle:hover {
            color: #FFD700 !important;
            background: #fffbe6;
        }
        .navbar .dropdown-menu {
            background: #fffbe6;
        }
        .navbar .dropdown-item:hover {
            background: #FFD700;
            color: #C1272D;
        }
        .header {
            background: #fff;
            border-bottom: 2px solid #FFD700;
            padding: 16px 0 8px 0;
        }
        .logo img {
            border-radius: 16px;
            border: 3px solid #FFD700;
            background: #fff;
        }
        .info-item {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .info-item img {
            border-radius: 50%;
            border: 2px solid #FFD700;
            background: #fff;
        }
        .image-container {
            position: relative;
            text-align: center;
            margin-bottom: 32px;
        }
        .image-container img {
            width: 100%;
            max-width: 1200px;
            border-radius: 24px;
            box-shadow: 0 4px 24px #FFD70033;
        }
        .text-overlay {
            position: absolute;
            top: 30%;
            left: 10%;
            color: #C1272D;
            background: rgba(255,255,255,0.85);
            padding: 32px 48px;
            border-radius: 24px;
            box-shadow: 0 2px 12px #FFD70033;
            max-width: 500px;
        }
        .text-overlay h1 {
            font-size: 2.2em;
            font-weight: bold;
        }
        .text-overlay p {
            font-size: 1.1em;
            color: #b30000;
        }
        .product-section {
            padding: 40px 0 20px 0;
        }
        .product-title {
            color: #C1272D;
            font-weight: bold;
            text-align: center;
            margin-bottom: 32px;
            font-size: 2em;
        }
        .card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 4px 16px #FFD70022;
            transition: transform 0.2s;
            background: #fff;
        }
        .card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 8px 32px #FFD70044;
        }
        .card-img-top {
            border-radius: 18px 18px 0 0;
            height: 210px;
            object-fit: cover;
        }
        .card-title {
            color: #C1272D;
            font-weight: bold;
            min-height: 48px;
        }
        .card-text {
            color: #b30000;
            font-size: 1.1em;
        }
        .btn-nut {
            background: linear-gradient(90deg, #FFD700 0%, #C1272D 100%);
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 20px;
            padding: 8px 24px;
            margin-top: 8px;
            transition: background 0.2s;
        }
        .btn-nut:hover {
            background: linear-gradient(90deg, #C1272D 0%, #FFD700 100%);
            color: #fff;
        }
        .video-container {
            text-align: center;
            margin: 40px 0;
        }
        .footer {
            background: linear-gradient(90deg, #FFD700 0%, #C1272D 100%);
            color: #fff;
            padding: 32px 0 0 0;
            margin-top: 40px;
        }
        .footer h5 {
            color: #fff;
            font-weight: bold;
        }
        .footer a {
            color: #fff;
            text-decoration: none;
        }
        .footer a:hover {
            color: #FFD700;
        }
        @media (max-width: 991px) {
            .text-overlay {
                position: static;
                max-width: 100%;
                margin: 16px 0;
                padding: 20px;
            }
            .image-container img {
                max-width: 100%;
            }
        }
        @media (max-width: 767px) {
            .header .row {
                flex-direction: column;
                text-align: center;
            }
            .product-title {
                font-size: 1.3em;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-2 logo">
                        <a href="trangchu.php"><img src="Media/logo.jpg" width="90" height="90"></a>
                    </div>
                    <div class="col-md-3 info-item">
                        <img src="Media/icon_header_1.png" alt="Phone" width="40" height="40">
                        <div>
                            <p class="mb-0">Hotline mua hàng:</p>
                            <p class="mb-0 fw-bold">0919 838 786</p>
                        </div>
                    </div>
                    <div class="col-md-3 info-item">
                        <img src="Media/icon_header_2.png" alt="Delivery" width="40" height="40">
                        <div>
                            <p class="mb-0">Giao hàng tận nơi:</p>
                            <p class="mb-0 fw-bold">Vận chuyển toàn quốc</p>
                        </div>
                    </div>
                    <div class="col-md-3 info-item">
                        <img src="Media/icon_header_3.png" alt="Clock" width="40" height="40">
                        <div>
                            <p class="mb-0">Giờ làm việc: 07h00 - 18h00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="trangchu.php">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="gioithieu.php">Giới thiệu</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="card.php" data-bs-toggle="dropdown">Sản phẩm</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="card.php">Hộp Trăng Vàng</a></li>
                            <li><a class="dropdown-item" href="cardcombo.html">Hộp Combo Gợi Ý</a></li>
                            <li><a class="dropdown-item" href="cardtt.html">Hộp Thu Tuyết</a></li>
                            <li><a class="dropdown-item" href="cardny.html">Thu Như Ý</a></li>
                            <li><a class="dropdown-item" href="cardLV.html">Hộp Lava Trứng Chảy</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="lienhe.html">Liên hệ</a></li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <a href="<?= isset($_SESSION['id_user']) ? 'cart.php' : 'dangnhap.php' ?>" class="fs-4" style="color: #fff;">
                        <i class="bi bi-cart3"></i>
                    </a>
                    <?php if (isset($_SESSION['id_user'])): ?>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle fs-4" data-bs-toggle="dropdown" style="color: #fff;">
                                <i class="bi bi-person-circle"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <span class="dropdown-item-text">Xin chào, <?= htmlspecialchars($_SESSION['name']) ?></span>
                                </li>
                                <li><a class="dropdown-item" href="user.php">Thông tin tài khoản</a></li>
                                <li><a class="dropdown-item" href="../controller/logout.php">Đăng xuất</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <div>
                            <a href="dangnhap.php" class="btn btn-outline-light btn-sm" role="button" target="_self">Đăng nhập</a>
                            <a href="dangky.php" class="btn btn-light btn-sm" role="button" target="_self">Đăng ký</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>
    <!-- Banner & Intro -->
    <div class="image-container my-4">
        <img src="Media/banner.jpg" alt="Bánh Trung Thu Kinh Đô">
        <div class="text-overlay">
            <h1>Chào mừng đến với Kinh Đô Bánh Trung Thu!</h1>
            <p>Thưởng thức những chiếc bánh trung thu truyền thống ngon nhất.<br>
            Kinh Đô là thương hiệu bánh trung thu hàng đầu tại Việt Nam, với các sản phẩm chất lượng cao và hương vị truyền thống.</p>
        </div>
    </div>
    <!-- Sản phẩm nổi bật -->
    <section class="product-section">
        <div class="container">
            <div class="product-title">Sản phẩm nổi bật</div>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <!-- Sản phẩm mẫu, bạn có thể lặp từ CSDL -->
                <div class="col">
                    <div class="card h-100">
                        <a href="chitietsp.php?id=1">
                            <img src="Media/banhkinhdovip1 (3).jpg" class="card-img-top" alt="Bánh 1">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title">Trăng Vàng Hoàng Kim Vinh Hiển Đỏ</h5>
                            <p class="card-text">1.300.000Đ</p>
                            <a href="chitietsp.php?id=1" class="btn btn-nut">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <a href="chitietsp.php?id=2">
                            <img src="Media/banhkinhdovip1 (1).jpg" class="card-img-top" alt="Bánh 2">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title">Trăng Vàng Hoàng Kim Vinh Hiển Đỏ</h5>
                            <p class="card-text">1.300.000Đ</p>
                            <a href="chitietsp.php?id=2" class="btn btn-nut">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <a href="chitietsp.php?id=3">
                            <img src="Media/banhkinhdovip1 (5).jpg" class="card-img-top" alt="Bánh 3">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title">Trăng Vàng Hoàng Kim Vinh Hiển Đỏ</h5>
                            <p class="card-text">1.300.000Đ</p>
                            <a href="chitietsp.php?id=3" class="btn btn-nut">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <a href="chitietsp.php?id=4">
                            <img src="Media/banhkinhdovip1 (7).jpg" class="card-img-top" alt="Bánh 4">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title">Trăng Vàng Hoàng Kim Vinh Hiển Đỏ</h5>
                            <p class="card-text">1.300.000Đ</p>
                            <a href="chitietsp.php?id=4" class="btn btn-nut">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <!-- Thêm các sản phẩm khác tương tự -->
            </div>
        </div>
    </section>
    <!-- Video -->
    <div class="video-container">
        <iframe width="800" height="450" src="https://www.youtube.com/embed/tz46IkM2JZc?si=jVuchEwTB1Y0q8Ak" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <!-- ĐỊA CHỈ -->
                <div class="col-md-4 mb-4">
                    <h5>ĐỊA CHỈ</h5>
                    <p>NHÀ PHÂN PHỐI BÁNH KINH ĐÔ</p>
                    <p>Địa Chỉ: 116/46 Bình Lợi, Phường 13, Quận Bình Thạnh, TP.HCM</p>
                    <p>Hotline 1: 0919 838 786 - Zalo</p>
                    <p>Hotline 2: 0908 003 880 - Zalo</p>
                    <p>Email: banhkinhdo.net@gmail.com</p>
                    <p>Website: www.banhkinhdo.vn</p>
                </div>
                <!-- LIÊN KẾT NHANH -->
                <div class="col-md-4 mb-4">
                    <h5>LIÊN KẾT NHANH</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Giới thiệu Kinh Đô</a></li>
                        <li><a href="#">Phương thức thanh toán</a></li>
                        <li><a href="#">Chính sách bảo mật</a></li>
                        <li><a href="#">Chính sách đổi trả</a></li>
                        <li><a href="#">Phương thức vận chuyển</a></li>
                        <li><a href="#">Hướng dẫn đặt hàng</a></li>
                        <li><a href="#">Blog chia sẻ</a></li>
                    </ul>
                </div>
                <!-- LIÊN HỆ -->
                <div class="col-md-4 mb-4">
                    <h5>LIÊN HỆ</h5>
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Your Name (required)">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Your Email (required)">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="3" placeholder="Your Message (required)"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <a href="https://www.facebook.com/son.phamthai.5473"><img src="Media/facebook.svg" alt="Facebook" class="img-fluid" width="30"></a>
                    <a href="https://www.instagram.com/th.son_17/"><img src="Media/instagram.svg" alt="Instagram" class="img-fluid" width="30"></a>
                    <a href="https://mail.google.com/mail/u/0/?hl=vi#inbox"><img src="Media/email.svg" alt="Email" class="img-fluid" width="30"></a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
