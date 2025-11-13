<?php
// Bắt đầu session
session_start();

// Xoá toàn bộ dữ liệu session
$_SESSION = []; // Xoá tất cả biến trong session
session_unset(); // Xoá tất cả biến phiên hiện tại (tùy PHP version)
session_destroy(); // Huỷ toàn bộ phiên

// Chuyển hướng về trang đăng nhập (hoặc trang chủ)
header("Location: ../View/trangchu.php");
exit;
?>
