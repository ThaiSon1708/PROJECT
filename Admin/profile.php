<?php
session_start();
// Kiểm tra đăng nhập admin
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}
$admin_name = "Phạm Thái Sơn";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông tin tài khoản Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg,#FFD700 0%,#fffbe6 100%); }
        .profile-box {
            max-width: 400px;
            margin: 60px auto;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 24px #FFD70033;
            padding: 32px 28px;
        }
        .profile-title {
            color: #C1272D;
            font-weight: bold;
            margin-bottom: 24px;
        }
    </style>
</head>
<body>
    <div class="profile-box text-center">
        <h3 class="profile-title"><i class="fa fa-user-circle"></i> Thông tin Admin</h3>
        <img src="https://ui-avatars.com/api/?name=Phạm+Thái+Sơn&background=FFD700&color=C1272D&size=100" alt="Avatar" class="rounded-circle mb-3" width="100" height="100">
        <h5 class="mb-3"><?= htmlspecialchars($admin_name) ?></h5>
        <p class="mb-1"><strong>Vai trò:</strong> Quản trị viên</p>
        <p class="mb-1"><strong>Email:</strong> son0987801073@gmail.com</p>
        <a href="dashboard.php" class="btn btn-warning mt-3" style="border-radius:20px;">Quay lại Dashboard</a>
    </div>
</body>
</html>