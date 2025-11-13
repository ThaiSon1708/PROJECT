<?php
session_start();

// Xử lý đăng nhập
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Tài khoản admin mẫu (bạn có thể thay bằng kiểm tra CSDL)
    $admin_user = 'Son';
    $admin_pass = '123';

    if ($username === $admin_user && $password === $admin_pass) {
        $_SESSION['admin_id'] = 1;
        $_SESSION['admin_name'] = $admin_user;
        header("Location: profile.php"); // Chuyển sang trang profile.php
        exit;
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg,#FFD700 0%,#fffbe6 100%); }
        .login-box {
            max-width: 400px;
            margin: 80px auto;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 24px #FFD70033;
            padding: 32px 28px;
        }
        .login-title {
            color: #C1272D;
            font-weight: bold;
            margin-bottom: 24px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h3 class="text-center login-title"><i class="fa fa-crown"></i> Admin Login</h3>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="post" autocomplete="off">
            <div class="mb-3">
                <label class="form-label">Tên đăng nhập</label>
                <input type="text" name="username" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label">Mật khẩu</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn w-100 fw-bold" style="background:linear-gradient(90deg,#FFD700 0%,#C1272D 100%); color:#fff; border-radius:20px;">Đăng nhập</button>
        </form>
    </div>
</body>
</html>