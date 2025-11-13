<?php
session_start();
// Kiểm tra đăng nhập admin
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

// Kết nối database
include("../Model/user.php");
$userModel = new User();

// Xử lý xóa tài khoản
if (isset($_GET['delete'])) {
    $userModel->delete($_GET['delete']);
    header("Location: qly_user.php");
    exit;
}

// Lấy danh sách tài khoản khách hàng
$users = $userModel->getAll();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý tài khoản khách hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8fafc; }
        .card { border-radius: 18px; }
        .btn-action { border-radius: 16px; }
    </style>
</head>
<body>
<div class="container my-5">
    <h2 class="mb-4 fw-bold" style="color:#C1272D;">Quản lý tài khoản khách hàng</h2>
    <a href="them_user.php" class="btn btn-success mb-3 fw-bold" style="border-radius:16px;"><i class="fa fa-plus"></i> Thêm tài khoản</a>
    <div class="table-responsive rounded-4 shadow" style="background:linear-gradient(135deg,#fffbe6 60%,#FFD70022 100%);">
        <table class="table table-hover align-middle mb-0">
            <thead style="background:linear-gradient(90deg,#FFD700 0%,#C1272D 100%); color:#fff;">
                <tr>
                    <th>ID</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= htmlspecialchars($user['name']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['phone']) ?></td>
                    <td><?= htmlspecialchars($user['address']) ?></td>
                    <td class="text-center">
                        <a href="sua_user.php?id=<?= $user['id'] ?>" class="btn btn-warning btn-sm btn-action me-1"><i class="fa fa-edit"></i> Sửa</a>
                        <a href="qly_user.php?delete=<?= $user['id'] ?>" class="btn btn-danger btn-sm btn-action" onclick="return confirm('Bạn chắc chắn muốn xóa tài khoản này?');"><i class="fa fa-trash"></i> Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>