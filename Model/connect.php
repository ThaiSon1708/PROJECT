<?php
    $server="localhost";
    $user="root";
    $pass=""; // Nếu bạn đã đặt mật khẩu cho root, hãy thay đổi "" thành mật khẩu đó.
    $database="banh";
    
    // KẾT NỐI DATABASE
    $conn = mysqli_connect($server, $user, $pass, $database);
    
    // KIỂM TRA LỖI KẾT NỐI (Đây là phần quan trọng nhất!)
    if (mysqli_connect_errno()) {
        // Nếu kết nối thất bại, dừng chương trình và báo lỗi chi tiết
        die("LỖI KẾT NỐI CSDL! Vui lòng kiểm tra XAMPP (MySQL) hoặc thông số kết nối: " . mysqli_connect_error());
    }
    
    // Đặt bộ ký tự (Chỉ chạy khi kết nối thành công)
    mysqli_query($conn, 'set names "utf8"');
?>