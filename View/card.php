<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kinh Đô Bánh Trung Thu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #fffbe6 0%, #fff 100%);
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
        .cart {
            font-size: 1.1em;
            color: #C1272D;
            font-weight: bold;
        }
        .navbar, .nav-pills {
            background: linear-gradient(90deg, #C1272D 0%, #FFD700 100%);
            box-shadow: 0 2px 8px #FFD70033;
        }
        .nav-link, .dropdown-toggle {
            color: #fff !important;
            font-weight: 500;
            font-size: 1.1em;
        }
        .nav-link:hover, .dropdown-toggle:hover {
            color: #FFD700 !important;
            background: #fffbe6;
        }
        .dropdown-menu {
            background: #fffbe6;
            border-radius: 12px;
            min-width: 220px;
            box-shadow: 0 4px 16px #FFD70033;
        }
        .dropdown-item:hover {
            background: #FFD700;
            color: #C1272D;
        }
        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0;
        }
        .product-title {
            color: #C1272D;
            font-weight: bold;
            text-align: center;
            margin: 32px 0 24px 0;
            font-size: 2em;
        }
        /* Animation effect from cardcombo.html */
        .card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 4px 16px #FFD70022;
            transition: transform 0.2s, box-shadow 0.2s;
            background: #fff;
            margin-bottom: 32px;
            overflow: hidden;
        }
        .card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 8px 32px #FFD70044;
        }
        .item-box {
            position: relative;
            width: 100%;
            height: 210px;
            overflow: hidden;
            border-radius: 18px 18px 0 0;
            background: #fffbe6;
        }
        .card-img-top,
        .item-box .image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 18px 18px 0 0;
            transition: opacity 0.3s;
            display: block;
        }
        .overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            opacity: 0;
            transition: opacity 0.3s;
            border-radius: 18px 18px 0 0;
        }
        .item-box:hover .overlay {
            opacity: 1;
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
        .btn-outline-primary, .btn-outline-danger {
            border-radius: 20px;
            font-weight: bold;
        }
        .btn-outline-primary:hover, .btn-outline-danger:hover {
            background: linear-gradient(90deg, #FFD700 0%, #C1272D 100%);
            color: #fff;
            border: none;
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
            .product-title {
                font-size: 1.3em;
            }
            .item-box {
                height: 160px;
            }
        }
    </style>
</head>
<body>
    <header class="header">
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
                <div class="col-md-1 text-end">
                    <div class="cart">
                        <i class="fa-solid fa-cart-shopping"></i> GIỎ HÀNG / 0 đ
                    </div>
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="trangchu.php">Trang chủ</a></li>
                <li class="nav-item"><a class="nav-link" href="gioithieu.php">Giới thiệu</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="card.php" id="dropdownSanPham" role="button">
                        Sản phẩm
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownSanPham">
                        <li><a class="dropdown-item" href="card.php">Hộp Trăng Vàng</a></li>
                        <li><a class="dropdown-item" href="cardcombo.html">Hộp Combo Gợi Ý</a></li>
                        <li><a class="dropdown-item" href="cardtt.html">Hộp Thu Tuyết</a></li>
                        <li><a class="dropdown-item" href="cardny.html">Thu Như Ý</a></li>
                        <li><a class="dropdown-item" href="cardLV.html">Hộp Lava Trứng Chảy</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="lienhe.html">Liên hệ</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="product-title">Danh sách sản phẩm</div>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
            include("../model/product.php");
            $model = new product();
            $sl = $model->getSanPhamTheoDanhMuc(1);
            foreach($sl as $row): ?>
            <div class="col">
                <div class="card h-100">
                    <div class="item-box">
                        <a href="chitietsp.php?id=<?= $row['id'] ?>">
                            <img src="../Upload/<?= htmlspecialchars(!empty($row['hinhanh']) ? $row['hinhanh'] : $row['anh']) ?>"
                                 alt="<?= htmlspecialchars($row['ten']) ?>" class="image">
                            <div class="overlay">
                                <img src="../Upload/<?= htmlspecialchars(!empty($row['hinhanh2']) ? $row['hinhanh2'] : (!empty($row['anh2']) ? $row['anh2'] : (!empty($row['hinhanh']) ? $row['hinhanh'] : $row['anh']))) ?>"
                                     alt="<?= htmlspecialchars($row['ten']) ?> Hover" class="image">
                            </div>
                        </a>
                    </div>
                    <div class="card-body text-center d-flex flex-column justify-content-between">
                        <h5 class="card-title"><?= htmlspecialchars($row['ten']) ?></h5>
                        <p class="card-text"><?= number_format($row['gia'], 0, ',', '.') . ' VNĐ' ?></p>
                        <div class="d-flex justify-content-center gap-2 mt-auto">
                            <form method="post" action="add_to_cart.php">
                                <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
                                <input type="hidden" name="product_name" value="<?= htmlspecialchars($row['ten']) ?>">
                                <input type="hidden" name="product_price" value="<?= $row['gia'] ?>">
                                <input type="hidden" name="product_image" value="<?= htmlspecialchars($row['hinhanh']) ?>">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-outline-primary btn-sm">Thêm vào giỏ</button>
                            </form>
                            <a href="chitietsp.php?id=<?= $row['id'] ?>" class="btn btn-outline-danger btn-sm">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
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
                    <a href="#"><img src="Media/facebook.svg" alt="Facebook" class="img-fluid" width="30"></a>
                    <a href="#"><img src="Media/instagram.svg" alt="Instagram" class="img-fluid" width="30"></a>
                    <a href="#"><img src="Media/email.svg" alt="Email" class="img-fluid" width="30"></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>