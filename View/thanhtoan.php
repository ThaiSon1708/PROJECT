<?php
session_start();

if (isset($_POST['order']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Lưu đơn hàng vừa đặt vào session tạm để hiển thị sau khi unset cart
    $_SESSION['last_order'] = $_SESSION['cart'];
    $show_cart = $_SESSION['cart'];
    unset($_SESSION['cart']);
} elseif (isset($_SESSION['last_order'])) {
    // Nếu F5 lại trang, vẫn hiển thị đơn hàng vừa đặt
    $show_cart = $_SESSION['last_order'];
} else {
    // Không chuyển hướng nữa, chỉ hiển thị thông báo
    $show_cart = [];
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng thành công - Kinh Đô</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #fffbe6 0%, #fff 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .success-card {
            background: linear-gradient(120deg, #fff 70%, #ffe5b4 100%);
            border: none;
            border-radius: 24px;
            box-shadow: 0 8px 32px 0 rgba(193,39,45,0.15), 0 1.5px 8px 0 #FFD700;
            padding: 0;
        }
        .success-header {
            background: linear-gradient(90deg, #FFD700 0%, #C1272D 100%);
            border-radius: 24px 24px 0 0;
            padding: 32px 24px 16px 24px;
            text-align: center;
        }
        .success-header img {
            border-radius: 50%;
            border: 5px solid #FFD700;
            box-shadow: 0 0 24px #FFD700;
            background: #fff;
        }
        .success-header h2 {
            color: #C1272D;
            font-weight: bold;
            margin-top: 18px;
        }
        .success-header .lead {
            color: #FFD700;
            font-weight: bold;
            font-size: 1.3em;
        }
        .success-header .fa-check-circle {
            font-size: 3.5rem;
            color: #C1272D;
            margin-bottom: 10px;
        }
        .order-section h5 {
            color: #FFD700;
            font-weight: bold;
        }
        .order-section table thead {
            background: linear-gradient(90deg, #C1272D 0%, #FFD700 100%);
            color: #fff;
        }
        .order-section table td, .order-section table th {
            vertical-align: middle;
        }
        .order-section img {
            border-radius: 8px;
            border: 2px solid #FFD700;
            margin-right: 6px;
            background: #fff;
        }
        .order-section .total-row th, .order-section .total-row td {
            color: #FFD700;
            font-size: 1.15em;
            font-weight: bold;
            background: #fffbe6;
        }
        .btn-home {
            background: linear-gradient(90deg, #FFD700 0%, #C1272D 100%);
            color: #fff;
            border: none;
            font-weight: bold;
            font-size: 1.1em;
            padding: 12px 36px;
            border-radius: 30px;
            margin-top: 24px;
            box-shadow: 0 2px 8px #FFD70055;
            transition: background 0.3s;
        }
        .btn-home:hover {
            background: linear-gradient(90deg, #C1272D 0%, #FFD700 100%);
            color: #fff;
        }
        .extra-images img {
            border-radius: 16px;
            border: 3px solid #FFD700;
            box-shadow: 0 0 10px #FFD700;
            margin: 0 8px;
        }
        @media (max-width: 767px) {
            .order-section {
                padding: 16px 6px;
            }
            .success-header {
                padding: 24px 6px 10px 6px;
            }
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card success-card">
                    <div class="success-header">
                        <img src="Media/logo.jpg" alt="Logo" width="120">
                        <div>
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h2>Đặt hàng thành công!</h2>
                        <p class="lead">
                            🎉 Cảm ơn quý khách đã đặt bánh tại <span style="color:#C1272D;">Kinh Đô</span>! 🎉
                        </p>
                        <p style="color:#b30000;">Chúng tôi sẽ liên hệ xác nhận và giao hàng trong thời gian sớm nhất.</p>
                    </div>
                    <div class="text-center mb-4">
                        <a href="trangchu.php" class="btn btn-home">
                            <i class="fas fa-home"></i> Về trang chủ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php // Giữ nguyên footer phía dưới ?>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- ĐỊA CHỈ -->
                <div class="col-md-4">
                    <h5>ĐỊA CHỈ</h5>
                    <p>NHÀ PHÂN PHỐI BÁNH KINH ĐÔ</p>
                    <p>Địa Chỉ: 116/46 Bình Lợi, Phường 13, Quận Bình Thạnh, TP.HCM</p>
                    <p>Hotline 1: 0919 838 786 - Zalo</p>
                    <p>Hotline 2: 0908 003 880 - Zalo</p>
                    <p>Email: banhkinhdo.net@gmail.com</p>
                    <p>Website: www.banhkinhdo.vn</p>
                </div>
                <!-- LIÊN KẾT NHANH -->
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
                <!-- LIÊN HỆ -->
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
</body>
</html>