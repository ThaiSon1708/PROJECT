
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới thiệu - Kinh Đô Bánh Trung Thu</title>
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
            border-radius: 12px;
            min-width: 220px;
            box-shadow: 0 4px 16px #FFD70033;
        }
        .navbar .dropdown-item:hover {
            background: #FFD700;
            color: #C1272D;
        }
        .navbar .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0;
        }
        .video-container {
            text-align: center;
            margin: 40px 0 30px 0;
        }
        .about-section {
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 4px 24px #FFD70022;
            padding: 40px 32px;
            margin-bottom: 40px;
        }
        .about-section h1, .about-section h2, .about-section h3 {
            color: #C1272D;
            font-weight: bold;
        }
        .about-section ul {
            margin-left: 24px;
        }
        .about-section img {
            border-radius: 18px;
            border: 3px solid #FFD700;
            margin: 24px 0;
            max-width: 100%;
            box-shadow: 0 2px 12px #FFD70033;
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
            .about-section {
                padding: 24px 8px;
            }
        }
        @media (max-width: 767px) {
            .header .row {
                flex-direction: column;
                text-align: center;
            }
            .about-section {
                padding: 12px 2px;
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
                    <div class="col-md-1 text-end">
                        <div class="cart">
                            <i class="fa-solid fa-cart-shopping"></i> GIỎ HÀNG / 0 đ
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
                    <li class="nav-item"><a class="nav-link active" href="gioithieu.php" style="color:#FFD700;">Giới thiệu</a></li>
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
    </header>
    <!-- Video -->
    <div class="video-container">
        <iframe width="800" height="450" src="https://www.youtube.com/embed/WTL131OHC4A?si=nA1eTfvTW0D9FCE_" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
        <iframe width="800" height="450" src="https://www.youtube.com/embed/tz46IkM2JZc?si=jVuchEwTB1Y0q8Ak" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
    </div>
    <!-- Giới thiệu -->
    <div class="container">
        <div class="about-section mx-auto">
            <h1 class="mb-4 text-center">Giới thiệu về Kinh Đô</h1>
            <p>Kinh Đô là thương hiệu nổi tiếng hàng đầu tại Việt Nam trong lĩnh vực sản xuất bánh kẹo, đặc biệt là bánh Trung Thu.
                Với hơn 20 năm kinh nghiệm, Kinh Đô đã trở thành biểu tượng của sự tinh tế và chất lượng vượt trội.
                Bánh Trung Thu Kinh Đô không chỉ mang đậm hương vị truyền thống mà còn được sáng tạo với những công thức hiện đại, đáp ứng khẩu vị đa dạng của người tiêu dùng.
                Mỗi chiếc bánh Kinh Đô đều chứa đựng tình yêu và tâm huyết, mang đến niềm vui trọn vẹn trong mùa Trung Thu đoàn viên.</p>
            <h2>Kinh Đô là một thương hiệu thuộc Công ty Cổ phần Mondelez Kinh Đô Việt Nam</h2>
            <ul>
                <li>Năm 1993: Thành lập Công ty TNHH xây dựng và chế biến thực phẩm Kinh Đô với vốn đầu tư là 1,4 tỉ VNĐ.</li>
                <li>01/10/2002: Chuyển thể thành Công ty Cổ Phần Kinh Đô.</li>
                <li>07/2015: Mondelēz International (Mỹ) mua lại 80% cổ phần mảng bánh kẹo Kinh Đô, thành lập Mondelez Kinh Đô.</li>
                <li>Hiện nay: Bánh kẹo Kinh Đô phân phối trên 64 tỉnh thành với hơn 300 nhà phân phối, 200.000 điểm bán lẻ.</li>
            </ul>
            <h3>Chứng nhận chất lượng</h3>
            <ul>
                <li>Đạt tiêu chuẩn quốc tế ISO 9002:2000, ISO 22.000:2005, HACCP…</li>
                <li>Chứng nhận vệ sinh an toàn thực phẩm của Bộ Y Tế.</li>
                <li>2 lần nhận Huân chương Lao Động, nhiều năm liền là hàng Việt Nam chất lượng cao, 4 lần là thương hiệu Quốc Gia.</li>
            </ul>
            <h2>Vùng nguyên liệu & sản xuất</h2>
            <img src="Media/8-592x400.jpg" width="900" height="450" alt="Nhà máy Kinh Đô">
            <p>Kinh Đô có 4 nhà máy sản xuất thực phẩm với diện tích lớn, dây chuyền hiện đại, quy trình khép kín, chuyên nghiệp, tăng năng suất hiệu quả.</p>
            <p>Các sản phẩm bánh kẹo được nghiên cứu, sáng tạo, phát triển liên tục để đáp ứng nhu cầu đa dạng của người tiêu dùng.</p>
            <h1 class="mt-4">Bánh Trung Thu Kinh Đô – Sự Lựa Chọn Hàng Đầu</h1>
            <p>Với nhiều thập kỷ kinh nghiệm, Kinh Đô là đối tác đáng tin cậy của khách hàng mỗi mùa Trung Thu. Chúng tôi tự hào mang đến những sản phẩm bánh Trung Thu đỉnh cao về chất lượng, sản xuất từ nguyên liệu tươi ngon, quy trình hiện đại, đảm bảo vệ sinh và an toàn thực phẩm.</p>
            <h2>Tại sao nên lựa chọn bánh Trung Thu của Kinh Đô?</h2>
            <ul>
                <li><strong>Chất Lượng Vượt Trội:</strong> Nguyên liệu tươi ngon, an toàn vệ sinh thực phẩm.</li>
                <li><strong>Đa Dạng Mẫu Mã:</strong> Bộ sưu tập đa dạng về hương vị và thiết kế.</li>
                <li><strong>Dịch Vụ Chuyên Nghiệp:</strong> Đội ngũ tận tâm, giao hàng nhanh chóng, đúng hẹn.</li>
                <li><strong>Giá Cả Hợp Lý:</strong> Giá cạnh tranh, phù hợp mọi đối tượng khách hàng.</li>
            </ul>
            <p class="mt-3">Hãy để Kinh Đô làm cho mùa Trung Thu của bạn thêm phần đặc biệt và ý nghĩa.</p>
            <p><strong>Tags:</strong> bánh trung thu kinh đô, bảng giá bánh trung thu kinh đô, đặt hàng bánh trung thu kinh đô tại website <a href="http://www.banhkindo.vn" target="_blank">www.banhkindo.vn</a></p>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
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