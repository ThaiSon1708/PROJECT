<?php
session_start();
if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
    header("Location: dashboard.php");
    exit;
}

include_once('../Model/connect.php'); 
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // SỬA LỖI: Nhận 'txtname' từ form (như file dangnhap.php cũ của bạn)
    if (empty($_POST['txtname']) || empty($_POST['password'])) {
        $error = "Vui lòng nhập đầy đủ Tên đăng nhập và Mật khẩu.";
    } else {
        $name_input = $_POST['txtname']; // Tên đăng nhập
        $password = $_POST['password'];

        // SỬA LỖI: Dùng bảng 'taikhoan' và kiểm tra cột 'name'
        $sql = "SELECT * FROM taikhoan WHERE name = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $name_input);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $account = mysqli_fetch_assoc($result);

        // Kiểm tra mật khẩu (dùng 'pass')
        if ($account && $password == $account['pass']) { 
            
            if ($account['is_admin'] == 1) {
                // Đăng nhập thành công
                $_SESSION['is_admin'] = 1;
                $_SESSION['admin_id'] = $account['id'];
                // SỬA LỖI: Lưu 'name' (vì 'hoten' không tồn tại)
                $_SESSION['admin_name'] = $account['name']; 
                
                header("Location: dashboard.php");
                exit;
            } else {
                $error = "Tài khoản này không có quyền truy cập Admin.";
            }
        } else {
            $error = "Tên đăng nhập hoặc Mật khẩu không chính xác.";
        }
        mysqli_stmt_close($stmt);
    }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #FFD700 0%, #C1272D 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .login-card {
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            max-width: 450px;
            width: 100%;
        }
        .login-header {
            background-color: #fffbe6;
            border-bottom: 5px solid #FFD700;
            padding: 30px;
            border-radius: 24px 24px 0 0;
        }
        .login-header img {
            border-radius: 50%;
            border: 4px solid #FFD700;
        }
        .btn-login {
            background: linear-gradient(90deg, #FFD700 0%, #C1272D 100%);
            color: #fff;
            font-weight: bold;
            border: none;
            padding: 12px;
            border-radius: 12px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header text-center">
            <img src="../View/Media/logo.jpg" alt="Logo" width="100">
            <h2 class="mt-3" style="color:#C1272D; font-weight: 700;">Admin Panel Login</h2>
        </div>
        
        <div class="card-body p-4 p-md-5">
            <form method="POST" action="login.php">
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                
                <div class="mb-3">
                    <!-- SỬA LỖI: Form input là 'txtname' -->
                    <label for="txtname" class="form-label fw-bold">Tên đăng nhập (name)</label>
                    <input type="text" class="form-control form-control-lg" id="txtname" name="txtname" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label fw-bold">Mật khẩu</label>
                    <input type="password" class="form-control form-control-lg" id="password" name="password" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-login btn-lg">Đăng Nhập</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>