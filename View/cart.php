<?php
session_start();

if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Xử lý cập nhật số lượng sản phẩm
if (isset($_POST['update']) && isset($_POST['quantities'])) {
    foreach ($_POST['quantities'] as $id => $qty) {
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $id) {
                $item['quantity'] = max(1, intval($qty));
                break;
            }
        }
    }
    unset($item);
}

// Xử lý xóa sản phẩm khỏi giỏ hàng
if (isset($_GET['remove'])) {
    $removeId = $_GET['remove'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $removeId) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            break;
        }
    }
    header("Location: cart.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng - Kinh Đô</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #fffbe6 0%, #fff 100%);
        }
        .cart-title {
            color: #C1272D;
            font-weight: bold;
            text-align: center;
            margin: 32px 0 24px 0;
            font-size: 2em;
        }
        .btn-outline-danger, .btn-danger, .btn-warning {
            border-radius: 20px;
            font-weight: bold;
        }
        .btn-outline-danger:hover, .btn-danger:hover, .btn-warning:hover {
            background: linear-gradient(90deg, #FFD700 0%, #C1272D 100%);
            color: #fff;
            border: none;
        }
        .table thead {
            background: linear-gradient(90deg, #ff4d4d 0%, #ffb366 100%);
            color: #fff;
        }
        .table td, .table th {
            vertical-align: middle !important;
        }
        .table img {
            border-radius: 8px;
            border: 2px solid #ffb366;
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
    </style>
</head>
<body>
    <div class="container my-4">
        <h2 class="cart-title">🧧 Giỏ hàng Kinh Đô 🧧</h2>
        <div class="mb-3 text-end">
            <a href="card.php" class="btn btn-outline-danger fw-bold">⬅️ Tiếp tục mua hàng</a>
        </div>
        <?php if (empty($_SESSION['cart'])): ?>
            <div class="alert alert-warning text-center">🛒 Giỏ hàng của bạn đang trống.</div>
        <?php else: ?>
        <form method="post">
            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center shadow" style="background:#fff;">
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['cart'] as $item):
                        $subtotal = $item['gia'] * $item['quantity'];
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td>
                                <img src="../Upload/<?= htmlspecialchars($item['hinhanh']) ?>" width="70">
                            </td>
                            <td style="font-weight:500;"><?= htmlspecialchars($item['ten']) ?></td>
                            <td style="color:#b30000;"><?= number_format($item['gia'], 0, ',', '.') ?> đ</td>
                            <td>
                                <input type="number" name="quantities[<?= $item['id'] ?>]" value="<?= $item['quantity'] ?>" min="1" class="form-control" style="width:80px; margin:auto;">
                            </td>
                            <td style="color:#b30000; font-weight:bold;"><?= number_format($subtotal, 0, ',', '.') ?> đ</td>
                            <td>
                                <a href="?remove=<?= $item['id'] ?>" class="btn btn-sm btn-outline-danger">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-end">Tổng cộng:</th>
                            <th colspan="2" style="color:#b30000; font-size:1.2em;"><?= number_format($total, 0, ',', '.') ?> đ</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="text-center my-3">
                <button type="submit" name="update" class="btn btn-danger fw-bold me-2">Cập nhật số lượng</button>
                <button type="submit" name="order" class="btn btn-warning fw-bold" formaction="ord.php">Đặt hàng</button>
            </div>
        </form>
        <?php endif; ?>
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
