<?php
// (Giả định file connect.php ở cùng thư mục Model)
// Nếu file connect.php ở thư mục gốc, bạn hãy sửa lại đường dẫn
include_once('connect.php'); 

class taikhoan {
    
    /**
     * SỬA LỖI: Chỉ INSERT vào các cột tồn tại (name, pass, email, sdt)
     * Bỏ cột 'hoten' và 'user' (tendangnhap)
     */
    public function insert_taikhoan($name, $pass, $email, $sdt) {
        global $conn;
        
        // (Chúng ta đặt is_admin = 0 mặc định cho khách hàng đăng ký)
        $sql = "INSERT INTO taikhoan (name, pass, email, sdt, is_admin) VALUES (?, ?, ?, ?, 0)";
        
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt === false) {
            die("Lỗi Prepare SQL (insert): " . mysqli_error($conn));
        }
        
        // ssss = string, string, string, string
        mysqli_stmt_bind_param($stmt, "ssss", $name, $pass, $email, $sdt);
        
        return mysqli_stmt_execute($stmt);
    }

    /**
     * SỬA LỖI: SELECT tài khoản bằng cột 'name' (thay vì 'tendangnhap'/'user')
     */
    public function select_taikhoan($name) {
        global $conn;
        
        $sql = "SELECT * FROM taikhoan WHERE name = ?";
        
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt === false) {
            die("Lỗi Prepare SQL (select): " . mysqli_error($conn));
        }
        
        // s = string
        mysqli_stmt_bind_param($stmt, "s", $name);
        
        mysqli_stmt_execute($stmt);
        return mysqli_stmt_get_result($stmt);
    }

    // (Bạn có thể thêm các hàm khác như update_taikhoan tại đây)
    
}
?>