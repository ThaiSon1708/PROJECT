<?php
session_start();

// 1. Kiểm tra admin (Dùng 'is_admin') và phương thức POST
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1 || $_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: login.php");
    exit;
}

// 2. Kết nối CSDL
include_once('../Model/connect.php'); 

// 3. Lấy đúng tên biến từ form
if (!isset($_POST['id_donhang']) || !isset($_POST['trangthai_moi'])) {
    header("Location: admin_qlydh.php"); // Quay về nếu thiếu data
    exit;
}

$order_id = $_POST['id_donhang'];
$new_status = $_POST['trangthai_moi'];

// 4. Kiểm tra xem trạng thái mới có hợp lệ không
$allowed_statuses = ['Đang xử lý', 'Đã xác nhận', 'Đang giao', 'Hoàn thành', 'Đã hủy'];

if (in_array($new_status, $allowed_statuses)) {

    // 5. BẢO MẬT: Dùng PREPARED STATEMENTS
    // Dùng 'tbl_bill'
    $sql = "UPDATE `tbl_bill` SET trangthai = ? WHERE id = ?";
    
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $new_status, $order_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

// 6. Đóng kết nối
mysqli_close($conn);

// 7. Chuyển hướng về trang quản lý với thông báo thành công
header("Location: admin_qlydh.php?status=success");
exit;
?>