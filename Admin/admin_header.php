<?php
session_start();
if (!isset($current_page)) {
    $current_page = 'unknown'; 
}

// Kiểm tra 'is_admin'
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header("Location: login.php");
    exit;
}

include_once('../Model/connect.php'); 
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body { background: #f8fafc; }
        .card { border-radius: 18px; }
        .sidebar {
            min-height: 100vh;
            width: 280px; 
            background: linear-gradient(135deg,#FFD700 60%,#C1272D 100%);
            color: #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        .sidebar .nav-link { 
            color: #fff; 
            font-weight: 500; 
            border-radius: 99px; 
            margin-bottom: 2px;
            padding: 10px 15px;
            transition: all 0.2s ease-in-out;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover { 
            background: #fffbe6; 
            color: #C1272D; 
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .sidebar .nav-link .fa-fw {
            width: 20px; 
        }
        .main-content {
            flex-grow: 1;
            padding: 24px;
            overflow-x: auto; 
        }
        .table {
            border-radius: 12px;
            overflow: hidden; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        }
        .table thead {
            background-color: #fffbe6;
            color: #C1272D;
            font-weight: 600;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar p-3 d-flex flex-column">
        <div>
            <h4 class="mb-4 text-center"><i class="fa fa-crown"></i> Admin Panel</h4>
            <ul class="nav flex-column gap-2">
                
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'dashboard') ? 'active' : '' ?>" href="dashboard.php">
                        <i class="fa fa-home fa-fw me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'orders') ? 'active' : '' ?>" href="admin_qlydh.php">
                        <i class="fa fa-shopping-cart fa-fw me-2"></i> Đơn hàng
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'products') ? 'active' : '' ?>" href="admin_qlysp.php">
                        <i class="fa fa-box fa-fw me-2"></i> Sản phẩm
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'categories') ? 'active' : '' ?>" href="admin_qlydm.php">
                        <i class="fa fa-list fa-fw me-2"></i> Danh mục
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'users') ? 'active' : '' ?>" href="admin_qly_user.php">
                        <i class="fa fa-users fa-fw me-2"></i> Khách hàng
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="mt-auto">
            <hr style="color: #fff6; border-width: 2px;">
            <div class="text-center text-white mb-2">
                <!-- SỬA LỖI: Hiển thị 'admin_name' (là cột 'name') -->
                <strong><?= htmlspecialchars($_SESSION['admin_name']) ?></strong><br>
                <small>(Admin)</small>
            </div>
            <ul class="nav flex-column gap-2">
                <li class="nav-item">
                    <a class="nav-link text-danger" href="logout.php" style="background-color: #ffebee;">
                        <i class="fa fa-sign-out-alt fa-fw me-2"></i> Đăng xuất
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="main-content">