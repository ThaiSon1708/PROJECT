<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

include("../Model/user.php");
$userModel = new User();

$error = '';
$success = '';
$id = $_GET['id'] ?? 0;
$user = $userModel->getById($id);

if (!$user) {
    die("Không tìm thấy tài khoản khách hàng!");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $address = trim($_POST['address'] ?? '');

    if ($name && $email) {
        $userModel->update($id, $name, $email, $phone, $address);
        $success = "Cập nhật tài khoản thành công!";
        // Cập nhật lại dữ liệu mới
        $user = $userModel->getById($id);
    } else {
        $error = "Vui lòng nhập đầy đủ tên và email!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa tài khoản khách hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8fafc; }
        .form-box { max-width: 500px; margin: 60px auto; background: #fff; border-radius: 18px; box-shadow: 0 4px 24px #FFD70033; padding: 32px 28px; }
        .form-title { color: #C1272D; font-weight: bold; margin-bottom: 24px; }
    </style>
</head>
<body>
    <div class="form-box">
        <h3 class="form-title text-center"><i class="fa fa-user-edit"></i> Sửa tài khoản khách hàng</h3>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Tên khách hàng</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Số điện thoại</label>
                <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($user['phone']) ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Địa chỉ</label>
                <input type="text" name="address" class="form-control" value="<?= htmlspecialchars($user['address']) ?>">
            </div>
            <button type="submit" class="btn btn-warning w-100 fw-bold" style="border-radius:20px;">Cập nhật</button>
            <a href="qly_user.php" class="btn btn-secondary w-100 mt-2" style="border-radius:20px;">Quay lại</a>
        </form>
    </div>
</body>
</html>