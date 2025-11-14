<?php
session_start();

// 1. KHỞI TẠO BIẾN & TÍNH TỔNG
$order_success = false;
$customer = [];
$total = 0;
$show_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Tính tổng tiền giỏ hàng để hiển thị
foreach ($show_cart as $item) {
    // Đảm bảo các key tồn tại để tránh lỗi
    $total += ($item['gia'] ?? 0) * ($item['quantity'] ?? 0);
}

// 2. XỬ LÝ ĐẶT HÀNG (Lưu thông tin vào Session và chuyển hướng)
if (isset($_POST['order']) && !empty($show_cart)) {
    // ⚠️ LƯU Ý: NÊN THÊM LOGIC LƯU VÀO DATABASE TẠI ĐÂY NẾU CẦN

    // Lưu thông tin khách hàng và giỏ hàng vào SESSION để dùng cho trang thông báo
    $_SESSION['customer_info'] = [
        'name'    => $_POST['name'] ?? '',
        'address' => $_POST['address'] ?? '',
        'city'    => $_POST['city'] ?? '',
        'country' => $_POST['country'] ?? '',
        'phone'   => $_POST['phone'] ?? '',
        'email'   => $_POST['email'] ?? '',
        'notes'   => $_POST['notes'] ?? '',
        'total'   => $total,
        'cart'    => $show_cart,
    ];
    
    // Xóa giỏ hàng cũ để tránh đặt hàng lặp lại
    unset($_SESSION['cart']); 
    
    // Chuyển hướng sang trang thông báo thành công
    header('Location: thanhtoan.php?status=success'); 
    exit;
}

// 3. XỬ LÝ HIỂN THỊ THÔNG BÁO SAU KHI CHUYỂN HƯỚNG
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    $order_success = true;
    // Lấy thông tin đã lưu từ Session để hiển thị
    $customer = $_SESSION['customer_info'] ?? [];
    $show_cart = $customer['cart'] ?? [];
    $total = $customer['total'] ?? 0;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kinh Đô Bánh Trung Thu - Thanh toán</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* TOÀN BỘ CSS CỦA BẠN */
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #fffbe6 0%, #fff 100%);
            margin: 0;
            padding: 0;
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
        .navbar .nav-link, .navbar .dropdown-toggle, .nav-pills .nav-link {
            color: #fff !important;
            font-weight: 500;
            font-size: 1.1em;
        }
        .navbar .nav-link:hover, .navbar .dropdown-toggle:hover, .nav-pills .nav-link.active, .nav-pills .nav-link:hover {
            color: #FFD700 !important;
            background: #fffbe6;
        }
        .navbar .dropdown-menu, .nav-pills .dropdown-menu {
            background: #fffbe6;
            border-radius: 12px;
            min-width: 220px;
            box-shadow: 0 4px 16px #FFD70033;
        }
        .navbar .dropdown-item:hover, .nav-pills .dropdown-item:hover {
            background: #FFD700;
            color: #C1272D;
        }
        .navbar .dropdown:hover .dropdown-menu, .nav-pills .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0;
        }
        .container {
            width: 95%;
            max-width: 1200px;
            margin: 30px auto 0 auto;
            overflow: hidden;
        }
        .breadcrumb {
            margin: 20px 0 30px 0;
            padding: 10px 0;
            list-style: none;
            background: #fffbe6;
            border-radius: 10px;
            box-shadow: 0 2px 8px #FFD70033;
        }
        .breadcrumb li {
            display: inline;
            font-size: 18px;
        }
        .breadcrumb li a {
            color: #C1272D;
            text-decoration: none;
            font-weight: 500;
        }
        .breadcrumb li::after {
            content: '>';
            margin: 0 5px;
            color: #FFD700;
        }
        .breadcrumb li:last-child::after {
            content: '';
        }
        h2 {
            text-align: center;
            color: #C1272D;
            font-weight: bold;
            margin-bottom: 32px;
            letter-spacing: 1px;
        }
        .form-section, .order-summary {
            background: #fff;
            padding: 32px 28px;
            margin: 20px 0;
            border-radius: 18px;
            border: none;
            box-shadow: 0 4px 24px #FFD70022;
        }
        .form-section h3, .order-summary h3 {
            margin-top: 0;
            color: #C1272D;
            font-weight: bold;
            margin-bottom: 24px;
        }
        .form-group label {
            font-weight: 500;
            color: #b30000;
            margin-bottom: 6px;
        }
        .form-group input, .form-group textarea, .form-group select {
            border-radius: 10px;
            border: 1.5px solid #FFD700;
            padding: 10px 14px;
            background: #fffbe6;
            font-size: 1em;
            margin-bottom: 8px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-group input:focus, .form-group textarea:focus, .form-group select:focus {
            border-color: #C1272D;
            outline: none;
            background: #fff;
            box-shadow: 0 0 0 2px #FFD70055;
        }
        .form-group textarea {
            resize: vertical;
        }
        .btn-danger, .btn-primary {
            border-radius: 20px;
            font-weight: bold;
            background: linear-gradient(90deg, #FFD700 0%, #C1272D 100%);
            border: none;
            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px #FFD70033;
        }
        .btn-danger:hover, .btn-primary:hover {
            background: linear-gradient(90deg, #C1272D 0%, #FFD700 100%);
            color: #fff;
            box-shadow: 0 4px 16px #FFD70055;
        }
        .order-summary {
            border: none;
            box-shadow: 0 4px 24px #FFD70033;
        }
        .order-summary table {
            background: #fffbe6;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 0;
        }
        .order-summary table th {
            background: linear-gradient(90deg, #FFD700 0%, #C1272D 100%);
            color: #fff;
            border: none;
            font-weight: 600;
        }
        .order-summary table td {
            vertical-align: middle;
            border: none;
            background: #fff;
        }
        .order-summary img {
            border-radius: 8px;
            border: 2px solid #FFD700;
            margin-right: 8px;
            background: #fff;
        }
        .order-summary .note {
            font-size: 14px;
            color: #555;
            margin-top: 18px;
            background: #fffbe6;
            border-radius: 8px;
            padding: 10px 14px;
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
        .success-message {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 32px 0 rgba(193,39,45,0.15), 0 1.5px 8px 0 #FFD700;
        }
        .success-message h2 {
            color: #C1272D;
        }
        /* Media Queries */
        @media (max-width: 991px) {
            .container {
                width: 98%;
            }
            .form-section, .order-summary {
                padding: 18px 6px;
            }
        }
        @media (max-width: 767px) {
            .container {
                width: 100%;
                padding: 0 2px;
            }
            .form-section, .order-summary {
                padding: 10px 2px;
            }
            .order-summary table th, .order-summary table td {
                font-size: 0.95em;
            }
        }
    </style>
</head>
<body>
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
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="trangchu.php">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="gioithieu.php">Giới thiệu</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="card.php" id="dropdownSanPham" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="cart.php">Giỏ hàng</a></li>
            <li>Thanh toán</li>
        </ul>

        <?php if (!$order_success): ?>
            <h2 class="text-center mb-4" style="color:#b30000;">Thông tin khách hàng</h2>
            <div class="row">
                <div class="col-md-7">
                    <div class="form-section bg-white p-4 rounded shadow-sm mb-4">
                        <form method="post" action="thanhtoan.php">
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Họ & Tên *</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="address" class="form-label">Địa chỉ *</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="city" class="form-label">Tỉnh / Thành phố *</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="country" class="form-label">Quốc gia *</label>
                                <select class="form-select" id="country" name="country" required>
                                    <option value="Việt Nam">Việt Nam</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone" class="form-label">Số điện thoại *</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Địa chỉ email (tùy chọn)</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group mb-3">
                                <label for="notes" class="form-label">Ghi chú đơn hàng (tùy chọn)</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                            </div>
                            <button type="submit" name="order" class="btn btn-danger w-100 fw-bold">ĐẶT HÀNG</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="order-summary bg-white p-4 rounded shadow-sm">
                        <h3>Đơn hàng của bạn</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>SL</th>
                                    <th>Tạm tính</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $total = 0; 
                            if (!empty($show_cart)):
                                foreach ($show_cart as $item):
                                    $quantity = $item['quantity'] ?? 0;
                                    $price = $item['gia'] ?? 0;
                                    $subtotal = $price * $quantity;
                                    $total += $subtotal;
                            ?>
                                <tr>
                                    <td>
                                        <img src="../Upload/<?= htmlspecialchars($item['hinhanh']) ?>" width="50" style="border-radius:6px; border:1px solid #ffb366;">
                                        <?= htmlspecialchars($item['ten']) ?>
                                    </td>
                                    <td><?= $quantity ?></td>
                                    <td style="color:#b30000;"><?= number_format($subtotal, 0, ',', '.') ?> đ</td>
                                </tr>
                            <?php
                                endforeach;
                            endif;
                            ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2" class="text-end">Tổng cộng:</th>
                                    <th style="color:#b30000;"><?= number_format($total, 0, ',', '.') ?> đ</th>
                                </tr>
                            </tfoot>
                        </table>
                        <p class="note mt-2">
                            Dữ liệu cá nhân của bạn sẽ được sử dụng để xử lý đơn đặt hàng, hỗ trợ trải nghiệm của bạn trên toàn bộ trang web này và cho các mục đích khác được mô tả trong chính sách riêng tư.
                        </p>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="row justify-content-center mt-5">
                <div class="col-lg-8">
                    <div class="card p-5 text-center success-message">
                        <i class="fas fa-check-circle fa-4x mb-3" style="color:#C1272D;"></i>
                        <h2 class="mb-3">Đặt hàng thành công!</h2>
                        <p class="lead">🎉 Cảm ơn **<?= htmlspecialchars($customer['name'] ?? 'Quý khách') ?>** đã đặt hàng!</p>
                        <p>Đơn hàng của bạn trị giá **<?= number_format($total, 0, ',', '.') ?> đ** đã được ghi nhận.</p>
                        <p>Chúng tôi sẽ liên hệ qua **<?= htmlspecialchars($customer['phone'] ?? '') ?>** để xác nhận đơn hàng tại địa chỉ: **<?= htmlspecialchars($customer['address'] ?? '') ?>**.</p>
                        <a href="trangchu.php" class="btn btn-primary mt-3" style="background:#C1272D; border:none; border-radius:30px;">
                            <i class="fas fa-home"></i> Tiếp tục mua sắm
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>ĐỊA CHỈ</h5>
                    <p>NHÀ PHÂN PHỐI BÁNH KINH ĐÔ</p>
                    <p>Địa Chỉ: 116/46 Bình Lợi, Phường 13, Quận Bình Thạnh, TP.HCM</p>
                    <p>Hotline 1: 0919 838 786 - Zalo</p>
                    <p>Hotline 2: 0908 003 880 - Zalo</p>
                    <p>Email: banhkinhdo.net@gmail.com</p>
                    <p>Website: www.banhkinhdo.vn</p>
                </div>
                <div class="col-md-4">
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
                <div class="col-md-4">
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