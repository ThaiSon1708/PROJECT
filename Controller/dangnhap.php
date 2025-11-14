<?php
session_start();
// Thêm exit sau khi chuyển hướng
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once("../Model/taikhoan.php");

if (isset($_POST['txtlog'])) {
    if (empty($_POST['txtpass']) || empty($_POST['txtname'])) {
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin!'); window.location.href = '../View/dangnhap.php';</script>";
        exit(); // Thêm exit
    }

    $model = new taikhoan();
    
    // Hàm select_taikhoan này đã được sửa (trong Model) để SELECT bằng cột 'name'
    $result = $model->select_taikhoan($_POST['txtname']);
    $account = $result->fetch_assoc();

    // Kiểm tra mật khẩu (dùng cột 'pass')
    if ($account && $_POST['txtpass'] == $account['pass']) {
        
        // Lưu thông tin vào Session
        $_SESSION['id_user'] = $account['id'];
        
        // SỬA LỖI: 'rname' không tồn tại, dùng 'name'
        $_SESSION['name'] = $account['name']; 
        
        $_SESSION['is_admin'] = $account['is_admin'];

        // Kiểm tra quyền
        if ($account['is_admin'] == 1) {
            // SỬA LỖI: Chuyển hướng Admin đến đúng thư mục 'Admin' và file 'dashboard.php'
            header("Location: ../Admin/dashboard.php");
            exit(); // Thêm exit
        } else {
            // Khách hàng
            echo "<script>alert('Đăng nhập thành công!'); window.location.href = '../View/trangchu.php';</script>";
            exit(); // Thêm exit
        }
    } else {
        // Sai tài khoản hoặc mật khẩu
        echo "<script>alert('Tài khoản hoặc mật khẩu không chính xác!'); window.location.href = '../View/dangnhap.php';</script>";
        exit(); // Thêm exit
    }
}
?>