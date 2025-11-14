<?php
// 1. Đánh dấu trang hiện tại (cho menu active)
$current_page = 'dashboard'; 

// 2. Nhúng layout header (Bao gồm session_start, kiểm tra admin, $conn)
include_once('admin_header.php'); 

// 3. TRUY VẤN DỮ LIỆU THỐNG KÊ (Dùng tên bảng ĐÚNG)

// Tổng sản phẩm (từ bảng 'sanpham')
$queryProducts = "SELECT COUNT(*) AS totalProducts FROM sanpham";
$resultProducts = mysqli_query($conn, $queryProducts);
$totalProducts = mysqli_fetch_assoc($resultProducts)['totalProducts'] ?? 0;

// Tổng đơn hàng (từ bảng 'tbl_bill')
$queryOrders = "SELECT COUNT(*) AS totalOrders FROM tbl_bill";
$resultOrders = mysqli_query($conn, $queryOrders);
$totalOrders = mysqli_fetch_assoc($resultOrders)['totalOrders'] ?? 0;

// Tổng khách hàng (từ bảng 'taikhoan')
$queryUsers = "SELECT COUNT(*) AS totalUsers FROM taikhoan WHERE `is_admin` = 0"; 
$resultUsers = mysqli_query($conn, $queryUsers);
$totalUsers = mysqli_fetch_assoc($resultUsers)['totalUsers'] ?? 0;

// Tổng doanh thu (từ bảng 'tbl_bill', chỉ đơn 'Hoàn thành')
$queryRevenue = "SELECT SUM(tongdonhang) AS totalRevenue FROM tbl_bill WHERE trangthai = 'Hoàn thành'";
$resultRevenue = mysqli_query($conn, $queryRevenue);
$totalRevenue = mysqli_fetch_assoc($resultRevenue)['totalRevenue'] ?? 0; 

mysqli_close($conn); // Đóng kết nối sau khi đã xong việc
?>

<!-- Bắt đầu nội dung chính của trang -->
<h2 class="mb-4 fw-bold" style="color:#C1272D;">Dashboard Quản Trị</h2>

<div class="row g-4 mb-4">
    <!-- Card Sản phẩm -->
    <div class="col-lg-3 col-md-6">
        <div class="card shadow-sm text-center py-4" style="background:linear-gradient(135deg,#FFD700 60%,#fffbe6 100%);">
            <div class="fs-2 mb-2"><i class="fa fa-box"></i></div>
            <div class="fs-4 fw-bold"><?= $totalProducts ?></div> 
            <div>Sản phẩm</div>
        </div>
    </div>
    <!-- Card Đơn hàng -->
    <div class="col-lg-3 col-md-6">
        <div class="card shadow-sm text-center py-4" style="background:linear-gradient(135deg,#C1272D 60%,#fffbe6 100%); color:#fff;">
            <div class="fs-2 mb-2"><i class="fa fa-shopping-cart"></i></div>
            <div class="fs-4 fw-bold"><?= $totalOrders ?></div>
            <div>Đơn hàng</div>
        </div>
    </div>
    <!-- Card Khách hàng -->
    <div class="col-lg-3 col-md-6">
        <div class="card shadow-sm text-center py-4" style="background:linear-gradient(135deg,#FFD700 60%,#fffbe6 100%);">
            <div class="fs-2 mb-2"><i class="fa fa-users"></i></div>
            <div class="fs-4 fw-bold"><?= $totalUsers ?></div>
            <div>Khách hàng</div>
        </div>
    </div>
    <!-- Card Doanh thu -->
    <div class="col-lg-3 col-md-6">
        <div class="card shadow-sm text-center py-4" style="background:linear-gradient(135deg,#C1272D 60%,#FFD700 100%); color:#fff;">
            <div class="fs-2 mb-2"><i class="fa fa-coins"></i></div>
            <div class="fs-4 fw-bold"><?= number_format($totalRevenue,0,',','.') ?>₫</div>
            <div>Doanh thu</div>
        </div>
    </div>
</div>

<!-- Phần chào mừng -->
<div class="card p-4 shadow-sm rounded-4">
    <h5 class="mb-3 fw-bold" style="color:#C1272D;">Chào mừng, <?= htmlspecialchars($_SESSION['admin_name']) ?>!</h5>
    <p>Hãy sử dụng menu bên trái để quản lý website.</p>
</div>

<?php
// 5. Nhúng layout footer
include_once('admin_footer.php'); 
?>