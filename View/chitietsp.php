<?php
// filepath: c:\xampp\htdocs\Project1\View\chitietsp.php
include("../model/product.php");
$model = new product();
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sp = $model->getSanPhamById($id); // Hàm này bạn cần có trong model/product.php

if (!$sp) {
    echo "Không tìm thấy sản phẩm!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kinh Đô Bánh Trung Thu</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        /* ...giữ lại các style cũ cần thiết... */
        .item-box {
            position: relative;
            width: 100%;
            padding-top: 100%;
            overflow: hidden;
            border-radius: 18px 18px 0 0;
            background: #fffbe6;
        }
        .image, .overlay .image {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            object-fit: cover;
            border-radius: 18px 18px 0 0;
            transition: opacity 0.3s;
        }
        .overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            opacity: 0;
            transition: opacity 0.3s;
            border-radius: 18px 18px 0 0;
            background: none;
        }
        .item-box:hover .overlay {
            opacity: 1;
        }
        .card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 4px 16px #FFD70022;
            transition: transform 0.2s, box-shadow 0.2s;
            background: #fff;
            margin-bottom: 32px;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 8px 32px #FFD70044;
        }
        .card-body {
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 18px 12px 12px 12px;
            background: #fffbe6;
            border-radius: 0 0 18px 18px;
        }
        .card-title {
            color: #C1272D;
            font-size: 1.1em;
            font-weight: bold;
            margin-bottom: 8px;
            min-height: 48px;
        }
        .card-text {
            color: #b30000;
            font-size: 1.05em;
            margin-bottom: 10px;
        }
        .nut {
            background: linear-gradient(90deg, #FFD700 0%, #C1272D 100%);
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 20px;
            padding: 8px 24px;
            margin-top: 8px;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px #FFD70033;
        }
        .nut:hover {
            background: linear-gradient(90deg, #C1272D 0%, #FFD700 100%);
            color: #fff;
            box-shadow: 0 4px 16px #FFD70055;
        }
        .related-products {
            padding: 32px 0 0 0;
            background: linear-gradient(90deg, #fffbe6 0%, #fff 100%);
            border-radius: 18px;
            margin-bottom: 32px;
        }
        .related-products h2 {
            font-size: 24px;
            border-bottom: 2px solid #FFD700;
            padding-bottom: 10px;
            color: #C1272D;
            margin-bottom: 24px;
            text-align: center;
            letter-spacing: 1px;
        }
        .related-products .row {
            gap: 0;
        }
        @media (max-width: 991px) {
            .item-box {
                padding-top: 80%;
            }
        }
        @media (max-width: 767px) {
            .item-box {
                padding-top: 70%;
            }
            .related-products {
                padding: 18px 0 0 0;
            }
        }
    </style>
</head>


<body>
    <header class="header" style="background: #fff; border-bottom: 2px solid #FFD700;">
        <div class="container">
            <div class="row align-items-center py-2">
                <div class="col-md-2 logo">
                    <img src="Media/logo.jpg" width="90" height="90" style="border-radius:16px; border:3px solid #FFD700; background:#fff; box-shadow:0 2px 8px #FFD70033;">
                </div>
                <div class="col-md-3 info-item d-flex align-items-center gap-2">
                    <img src="Media/icon_header_1.png" alt="Phone" width="40" height="40" style="border-radius:50%; border:2px solid #FFD700;">
                    <div>
                        <span style="font-size:0.95em;">Hotline mua hàng:</span><br>
                        <span style="font-weight:bold; color:#C1272D;">0919 838 786</span>
                    </div>
                </div>
                <div class="col-md-3 info-item d-flex align-items-center gap-2">
                    <img src="Media/icon_header_2.png" alt="Delivery" width="40" height="40" style="border-radius:50%; border:2px solid #FFD700;">
                    <div>
                        <span style="font-size:0.95em;">Giao hàng tận nơi:</span><br>
                        <span style="font-weight:bold; color:#C1272D;">Toàn quốc</span>
                    </div>
                </div>
                <div class="col-md-3 info-item d-flex align-items-center gap-2">
                    <img src="Media/icon_header_3.png" alt="Clock" width="40" height="40" style="border-radius:50%; border:2px solid #FFD700;">
                    <div>
                        <span style="font-size:0.95em;">Giờ làm việc:</span><br>
                        <span style="font-weight:bold; color:#C1272D;">07h00 - 18h00, Thứ 2 - CN</span>
                    </div>
                </div>
                <div class="col-md-1 text-end">
                    <div class="cart" style="font-size:1.1em; color:#C1272D; font-weight:bold;">
                        <i class="fa-solid fa-cart-shopping"></i> GIỎ HÀNG / 0 đ
                    </div>
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg" style="background: linear-gradient(90deg, #C1272D 0%, #FFD700 100%); border-radius:0 0 18px 18px;">
        <div class="container">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link text-white fw-bold" href="trangchu.php">Trang chủ</a></li>
                <li class="nav-item"><a class="nav-link text-white fw-bold" href="gioithieu.php">Giới thiệu</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white fw-bold" data-bs-toggle="dropdown" href="card.php">Sản phẩm</a>
                    <ul class="dropdown-menu" style="background:#fffbe6;">
                        <li><a class="dropdown-item" href="#">Hộp Trăng Vàng</a></li>
                        <li><a class="dropdown-item" href="#">Hộp Combo Gợi Ý</a></li>
                        <li><a class="dropdown-item" href="#">Hộp Thu Tuyết</a></li>
                        <li><a class="dropdown-item" href="#">Thu Như Ý</a></li>
                        <li><a class="dropdown-item" href="#">Hộp Lava Trứng Chảy</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link text-white fw-bold" href="lienhe.html">Liên hệ</a></li>
            </ul>
        </div>
    </nav>
    <div class="breadcrumb py-2 px-3" style="background: linear-gradient(90deg, #FFD700 0%, #fffbe6 100%); border-radius: 0 0 18px 18px; font-weight:500;">
        <a href="trangchu.php" style="color:#C1272D;">TRANG CHỦ</a> / 
        <a href="card.php" style="color:#C1272D;">BÁNH TRUNG THU</a> / 
        <a href="bentrong.html" style="color:#C1272D;">HỘP COMBO GỢI Ý</a>
    </div>
    <div class="container my-4">
        <div class="row">
            <!-- Main product info -->
            <div class="col-lg-8">
                <div class="product d-flex flex-wrap align-items-start bg-white rounded-4 shadow-lg p-4 mb-4" style="background: linear-gradient(135deg, #fffbe6 60%, #FFD70022 100%);">
                    <div class="product-image me-4 mb-3" style="flex:1 1 260px; max-width:320px; min-width:220px;">
                        <div class="item-box" style="padding-top:100%; background:linear-gradient(135deg,#FFD700 60%,#fffbe6 100%); box-shadow:0 4px 16px #FFD70044;">
                            <img src="../Upload/<?= htmlspecialchars($sp['hinhanh']) ?>" alt="<?= htmlspecialchars($sp['ten']) ?>" class="image">
                            <div class="overlay">
                                <img src="../Upload/<?= htmlspecialchars(!empty($sp['hinhanh2']) ? $sp['hinhanh2'] : $sp['hinhanh']) ?>" alt="<?= htmlspecialchars($sp['ten']) ?> Hover" class="image">
                            </div>
                        </div>
                        <div class="thumbnails d-flex justify-content-center mt-2">
                            <img src="../Upload/<?= htmlspecialchars(!empty($sp['hinhanh2']) ? $sp['hinhanh2'] : $sp['hinhanh']) ?>" alt="Thumbnail" style="width:50px; height:50px; object-fit:cover; border-radius:8px; border:2px solid #FFD700; margin:0 4px;">
                        </div>
                    </div>
                    <div class="product-details flex-grow-1 ms-2">
                        <h1 class="mb-2" style="color:#C1272D; font-size:1.7em; font-weight:bold; letter-spacing:1px;">TRĂNG VÀNG HỒNG NGỌC AN PHÚ VÀNG</h1>
                        <p class="price" style="color:#FFD700; font-size:1.3em; font-weight:bold; text-shadow:1px 1px 0 #C1272D;">790.000 ₫</p>
                        <p class="mb-1" style="font-weight:500;">Hộp bánh gồm có:</p>
                        <ul style="color:#C1272D; font-weight:500;">
                            <li>AN KHANG PHÚ QUÝ: (Mã: 2,R,82,83)</li>
                            <li>+ Gà quay sốt X.O 2 trứng 210g</li>
                            <li>+ Đậu đỏ kiểu Nhật 2 trứng 210g</li>
                            <li>+ Dẻo hạt sen hạt dưa 1 trứng 230g</li>
                            <li>+ Dẻo hạt sen hạt dưa 1 trứng 230g</li>
                        </ul>
                        <div class="quantity d-flex align-items-center my-3">
                            <button class="minus btn btn-outline-warning btn-sm fw-bold" style="color:#C1272D; border-color:#FFD700;">-</button>
                            <input type="text" value="1" class="form-control mx-2 text-center" style="width:50px; border:2px solid #FFD700;">
                            <button class="plus btn btn-outline-warning btn-sm fw-bold" style="color:#C1272D; border-color:#FFD700;">+</button>
                        </div>
                        <button class="add-to-cart nut mb-2" style="background:linear-gradient(90deg,#FFD700 0%,#C1272D 100%); font-size:1.1em;">THÊM VÀO GIỎ HÀNG</button>
                        <div class="social-links mt-2">
                            <a href="#" class="me-2" style="color:#C1272D;"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="me-2" style="color:#C1272D;"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="me-2" style="color:#C1272D;"><i class="fab fa-linkedin"></i></a>
                            <a href="#" class="me-2" style="color:#C1272D;"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="me-2" style="color:#C1272D;"><i class="fab fa-google"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Tabs -->
                <div class="tabs mb-4 d-flex gap-2">
                    <button class="tablinks active" onclick="openTab(event, 'Description')" style="background:linear-gradient(90deg,#FFD700 0%,#C1272D 100%); color:#fff; border:none; border-radius:18px; padding:8px 24px; font-weight:bold;">MÔ TẢ</button>
                    <button class="tablinks" onclick="openTab(event, 'Reviews')" style="background:linear-gradient(90deg,#C1272D 0%,#FFD700 100%); color:#fff; border:none; border-radius:18px; padding:8px 24px; font-weight:bold;">ĐÁNH GIÁ (0)</button>
                </div>
                <div id="Description" class="tabcontent" style="display:block;">
                    <h2 style="color:#C1272D; font-size:1.2em; font-weight:bold;">MÔ TẢ</h2>
                    <ul style="color:#C1272D; font-weight:500;">
                        <li>AN KHANG PHÚ QUÝ: (Mã: 2,R,82,83)</li>
                        <li>+ Gà quay sốt X.O 2 trứng 210g</li>
                        <li>+ Đậu đỏ kiểu Nhật 2 trứng 210g</li>
                        <li>+ Dẻo hạt sen hạt dưa 1 trứng 230g</li>
                        <li>+ Dẻo hạt sen hạt dưa 1 trứng 230g</li>
                    </ul>
                </div>
                <div id="Reviews" class="tabcontent" style="display:none;">
                    <h2 style="color:#C1272D; font-size:1.2em; font-weight:bold;">ĐÁNH GIÁ</h2>
                    <p>Chưa có đánh giá nào.</p>
                </div>
                <!-- Sản phẩm tương tự -->
                <div class="related-products mt-5 p-3 rounded-4" style="background:linear-gradient(90deg,#FFD70022 0%,#fffbe6 100%);">
                    <h2 style="color:#C1272D; font-size:1.3em; font-weight:bold; border-bottom:2px solid #FFD700; text-align:center; margin-bottom:24px;">SẢN PHẨM TƯƠNG TỰ</h2>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
                        <div class="col">
                            <div class="card h-100 shadow" style="background:linear-gradient(135deg,#fffbe6 60%,#FFD70022 100%);">
                                <div class="item-box">
                                    <img src="Media/banhkinhdovip1 (3).jpg" alt="Avatar" class="image">
                                    <div class="overlay">
                                        <img src="Media/banhkinhdovip1 (4).jpg" alt="Avatar" class="image">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">TRĂNG VÀNG HOÀNG KIM VINH HIỂN ĐỎ</h5>
                                    <p class="card-text">1.300.000Đ </p>
                                    <button class="nut">Thêm vào giỏ hàng</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 shadow" style="background:linear-gradient(135deg,#fffbe6 60%,#FFD70022 100%);">
                                <div class="item-box">
                                    <img src="Media/banhkinhdovip1 (1).jpg" alt="Avatar" class="image">
                                    <div class="overlay">
                                        <img src="Media/banhkinhdovip1 (2).jpg" alt="Avatar" class="image">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">TRĂNG VÀNG HOÀNG KIM VINH HIỂN ĐỎ</h5>
                                    <p class="card-text">1.300.000Đ </p>
                                    <button class="nut">Thêm vào giỏ hàng</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 shadow" style="background:linear-gradient(135deg,#fffbe6 60%,#FFD70022 100%);">
                                <div class="item-box">
                                    <img src="Media/banhkinhdovip1 (5).jpg" alt="Avatar" class="image">
                                    <div class="overlay">
                                        <img src="Media/banhkinhdovip1 (6).jpg" alt="Avatar" class="image">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">TRĂNG VÀNG HOÀNG KIM VINH HIỂN ĐỎ</h5>
                                    <p class="card-text">1.300.000Đ </p>
                                    <button class="nut">Thêm vào giỏ hàng</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 shadow" style="background:linear-gradient(135deg,#fffbe6 60%,#FFD70022 100%);">
                                <div class="item-box">
                                    <img src="Media/banhkinhdovip1 (7).jpg" alt="Avatar" class="image">
                                    <div class="overlay">
                                        <img src="Media/banhkinhdovip1 (8).jpg" alt="Avatar" class="image">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">TRĂNG VÀNG HOÀNG KIM VINH HIỂN ĐỎ</h5>
                                    <p class="card-text">1.300.000Đ </p>
                                    <button class="nut">Thêm vào giỏ hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar bg-white rounded-4 shadow-lg p-4 mb-4" style="background:linear-gradient(135deg,#FFD70022 0%,#fffbe6 100%);">
                    <div class="category mb-4">
                        <h2 style="color:#C1272D; font-size:1.2em; font-weight:bold;">BÁNH TRUNG THU</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" style="color:#C1272D;">HỘP BÁNH OREO</a></li>
                            <li><a href="#" style="color:#C1272D;">HỘP COMBO GỢI Ý</a></li>
                            <li><a href="#" style="color:#C1272D;">HỘP LAVA TRỨNG CHẢY</a></li>
                            <li><a href="#" style="color:#C1272D;">HỘP THU NHƯ Ý</a></li>
                            <li><a href="#" style="color:#C1272D;">HỘP THU TUYẾT</a></li>
                            <li><a href="#" style="color:#C1272D;">HỘP TRĂNG VÀNG</a></li>
                        </ul>
                    </div>
                    <div class="category">
                        <h2 style="color:#C1272D; font-size:1.2em; font-weight:bold;">KHÁC</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" style="color:#C1272D;">QUÀ TẾT</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer mt-5" style="background:linear-gradient(90deg,#FFD700 0%,#C1272D 100%); color:#fff; border-radius:18px 18px 0 0;">
        <div class="container py-4">
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
                        <li><a href="#" style="color:#fff;">Giới thiệu Kinh Đô</a></li>
                        <li><a href="#" style="color:#fff;">Phương thức thanh toán</a></li>
                        <li><a href="#" style="color:#fff;">Chính sách bảo mật</a></li>
                        <li><a href="#" style="color:#fff;">Chính sách đổi trả</a></li>
                        <li><a href="#" style="color:#fff;">Phương thức vận chuyển</a></li>
                        <li><a href="#" style="color:#fff;">Hướng dẫn đặt hàng</a></li>
                        <li><a href="#" style="color:#fff;">Blog chia sẻ</a></li>
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
                        <button type="submit" class="btn btn-light fw-bold" style="color:#C1272D;">SUBMIT</button>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <a href="https://www.facebook.com/son.phamthai.5473"><img src="Media/facebook.svg" alt="Facebook" class="img-fluid" width="30"></a>
                    <a href="#"><img src="Media/instagram.svg" alt="Instagram" class="img-fluid" width="30"></a>
                    <a href="#"><img src="Media/email.svg" alt="Email" class="img-fluid" width="30"></a>
                </div>
            </div>
        </div>
    </footer>
    <script>
        // Tab switching logic
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("active");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.classList.add("active");
        }
    </script>
</body>
</html>