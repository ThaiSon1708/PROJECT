<?php
session_start();

if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Chuẩn hoá cấu trúc mỗi item để tránh undefined index
foreach ($_SESSION['cart'] as $k => &$it) {
    if (!isset($it['id']))   $it['id'] = $k;
    if (!isset($it['ten']))  $it['ten'] = 'Sản phẩm';
    if (!isset($it['gia']))  $it['gia'] = 0;
    if (!isset($it['soluong'])) $it['soluong'] = 1;
    if (!isset($it['hinhanh'])) $it['hinhanh'] = '';
}
unset($it);

// Xử lý cập nhật số lượng sản phẩm (POST)
if (isset($_POST['update']) && !empty($_POST['quantities']) && is_array($_POST['quantities'])) {
    foreach ($_POST['quantities'] as $id => $qty) {
        $id = (string)$id;
        $qty = max(1, intval($qty));
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['soluong'] = $qty;
        }
    }
    header("Location: cart.php");
    exit();
}

// Xử lý xóa sản phẩm khỏi giỏ hàng (GET ?remove=ID)
if (isset($_GET['remove'])) {
    $removeId = (string)$_GET['remove'];
    if (isset($_SESSION['cart'][$removeId])) {
        unset($_SESSION['cart'][$removeId]);
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
        /* (Giữ nguyên CSS của bạn) */
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
                    // SỬA LỖI: Dùng $id => $item để lấy ID sản phẩm (key)
                    foreach ($_SESSION['cart'] as $id => $item):
                        // SỬA LỖI: Dùng 'soluong'
                        $subtotal = $item['gia'] * $item['soluong']; 
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td>
                                <!-- SỬA LỖI: Dùng 'hinhanh' -->
                                <img src="../Upload/<?= htmlspecialchars($item['hinhanh']) ?>" width="70">
                            </td>
                            <td style="font-weight:500;"><?= htmlspecialchars($item['ten']) ?></td>
                            <td style="color:#b30000;"><?= number_format($item['gia'], 0, ',', '.') ?> đ</td>
                            <td>
                                <!-- SỬA LỖI: name="quantities[<?= $id ?>]" -->
                                <input type="number" name="quantities[<?= $id ?>]" value="<?= $item['soluong'] ?>" min="1" class="form-control" style="width:80px; margin:auto;">
                            </td>
                            <td style="color:#b30000; font-weight:bold;"><?= number_format($subtotal, 0, ',', '.') ?> đ</td>
                            <td>
                                <!-- SỬA LỖI: ?remove=<?= $id ?> -->
                                <a href="?remove=<?= $id ?>" class="btn btn-sm btn-outline-danger">Xóa</a>
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
                
                <!-- 
                  SỬA LỖI LỚN NHẤT:
                  Chuyển nút "Đặt hàng" thành MỘT ĐƯỜNG LINK (thẻ <a>)
                  trỏ đến trang 'thanhtoan.php' (Thanh Toán).
                -->
                <a href="ord.php" class="btn btn-warning fw-bold">
                    Tiến hành Thanh Toán <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </form>
        <?php endif; ?>
    </div>
    
    <!-- (Giữ nguyên Footer của bạn) -->
    <footer class="footer mt-5"> ... </footer>
</body>
</html>