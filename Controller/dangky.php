<?php
session_start();
include_once("../Model/taikhoan.php");

// SỬA LỖI: Đổi tên biến cho rõ ràng
if (isset($_POST['txtname']) && isset($_POST['txtpass']) && isset($_POST['txtemail']) && isset($_POST['txtsdt'])) {
    
    // Lấy dữ liệu từ form (Bỏ 'txthoten')
    $name = $_POST['txtname']; // Đây là cột 'name' (Tên đăng nhập)
    $pass = $_POST['txtpass'];
    $email = $_POST['txtemail'];
    $sdt = $_POST['txtsdt'];

    // Kiểm tra xem các trường có rỗng không
    if (empty($name) || empty($pass) || empty($email) || empty($sdt)) {
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin!'); window.location.href = '../View/dangky.php';</script>";
        exit();
    }

    $model = new taikhoan();
    
    // SỬA LỖI: Gọi hàm insert_taikhoan với 4 tham số (bỏ 'hoten')
    $result = $model->insert_taikhoan($name, $pass, $email, $sdt);

    if ($result) {
        // Đăng ký thành công, chuyển đến trang đăng nhập
        echo "<script>alert('Đăng ký thành công! Vui lòng đăng nhập.'); window.location.href = '../View/dangnhap.php';</script>";
    } else {
        // Có thể lỗi do trùng 'name' hoặc 'email' (nếu bạn có cài đặt UNIQUE)
        echo "<script>alert('Đăng ký thất bại! Tên đăng nhập hoặc Email có thể đã tồn tại.'); window.location.href = '../View/dangky.php';</script>";
    }

} else {
    // Nếu ai đó truy cập file này trực tiếp
    header("Location: ../View/dangky.php");
}
?>