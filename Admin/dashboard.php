<?php
session_start();
// Kiểm tra đăng nhập admin (giả sử session admin_id)
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

// Biến tạm cho dashboard demo
$totalProducts = 12;
$totalOrders = 34;
$totalUsers = 56;
$totalRevenue = 78900000;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body { background: #f8fafc; }
        .card { border-radius: 18px; }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg,#FFD700 60%,#C1272D 100%);
            color: #fff;
        }
        .sidebar .nav-link { color: #fff; font-weight: 500; }
        .sidebar .nav-link.active, .sidebar .nav-link:hover { background: #fffbe6; color: #C1272D; }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar p-4">
        <h4 class="mb-4"><i class="fa fa-crown"></i> Admin Panel</h4>
        <ul class="nav flex-column gap-2">
            <li class="nav-item"><a class="nav-link active" href="dashboard.php"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="admin_qlysp.php"><i class="fa fa-box"></i> Sản phẩm</a></li>
            <li class="nav-item"><a class="nav-link" href="categories/index.php"><i class="fa fa-list"></i> Danh mục</a></li>
            <li class="nav-item"><a class="nav-link" href="orders/index.php"><i class="fa fa-shopping-cart"></i> Đơn hàng</a></li>
            <li class="nav-item"><a class="nav-link" href="users/index.php"><i class="fa fa-users"></i> Khách hàng</a></li>
            <li class="nav-item"><a class="nav-link" href="settings/index.php"><i class="fa fa-cog"></i> Cài đặt</a></li>
            <li class="nav-item"><a class="nav-link text-danger" href="logout.php"><i class="fa fa-sign-out-alt"></i> Đăng xuất</a></li>
        </ul>
    </div>
    <!-- Main content -->
    <div class="flex-grow-1 p-4">
        <h2 class="mb-4 fw-bold" style="color:#C1272D;">Dashboard Quản Trị</h2>
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card shadow text-center py-4" style="background:linear-gradient(135deg,#FFD700 60%,#fffbe6 100%);">
                    <div class="fs-2 mb-2"><i class="fa fa-box"></i></div>
                    <div class="fs-4 fw-bold"><?= $totalProducts ?></div>
                    <div>Sản phẩm</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow text-center py-4" style="background:linear-gradient(135deg,#C1272D 60%,#fffbe6 100%); color:#fff;">
                    <div class="fs-2 mb-2"><i class="fa fa-shopping-cart"></i></div>
                    <div class="fs-4 fw-bold"><?= $totalOrders ?></div>
                    <div>Đơn hàng</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow text-center py-4" style="background:linear-gradient(135deg,#FFD700 60%,#fffbe6 100%);">
                    <div class="fs-2 mb-2"><i class="fa fa-users"></i></div>
                    <div class="fs-4 fw-bold"><?= $totalUsers ?></div>
                    <div>Khách hàng</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow text-center py-4" style="background:linear-gradient(135deg,#C1272D 60%,#FFD700 100%); color:#fff;">
                    <div class="fs-2 mb-2"><i class="fa fa-coins"></i></div>
                    <div class="fs-4 fw-bold"><?= number_format($totalRevenue,0,',','.') ?>₫</div>
                    <div>Doanh thu</div>
                </div>
            </div>
        </div>
        <!-- Có thể thêm biểu đồ, thống kê nâng cao ở đây -->
        <div class="card p-4 shadow rounded-4">
            <h5 class="mb-3 fw-bold" style="color:#C1272D;">Chào mừng bạn đến trang quản trị!</h5>
            <p>Hãy sử dụng menu bên trái để quản lý sản phẩm, đơn hàng, khách hàng, danh mục và các cài đặt khác.</p>
        </div>
    </div>
</div>
</body>
</html>