<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}
include("../Model/product.php");
$model = new Product();
$id = $_GET['id'] ?? 0;
$sp = $model->getById($id);

if (!$sp) {
    die("Không tìm thấy sản phẩm!");
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa sản phẩm (Admin)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container my-5">
    <div class="card shadow-lg rounded-4" style="background:linear-gradient(135deg,#fffbe6 60%,#FFD70022 100%); max-width:500px; margin:auto;">
        <div class="card-header text-center" style="background:linear-gradient(90deg,#FFD700 0%,#C1272D 100%); color:#fff; border-radius:18px 18px 0 0;">
            <h3 class="mb-0"><i class="fa fa-edit"></i> Sửa sản phẩm</h3>
        </div>
        <div class="card-body">
            <form method="post" action="admin_editsp_xuly.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $sp['id'] ?>">
                <div class="mb-3">
                    <label class="form-label fw-bold" style="color:#C1272D;">Tên sản phẩm</label>
                    <input type="text" name="ten" value="<?= htmlspecialchars($sp['ten']) ?>" class="form-control rounded-3" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold" style="color:#C1272D;">Giá</label>
                    <input type="number" name="gia" value="<?= $sp['gia'] ?>" class="form-control rounded-3" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold" style="color:#C1272D;">Mô tả</label>
                    <textarea name="mota" class="form-control rounded-3" rows="3" required><?= htmlspecialchars($sp['mota']) ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold" style="color:#C1272D;">Ảnh hiện tại</label><br>
                    <img src="../Upload/<?= htmlspecialchars($sp['hinhanh']) ?>" alt="Ảnh sản phẩm" style="width:80px; height:80px; object-fit:cover; border-radius:12px; border:2px solid #FFD700;">
                </div>
                <div class="mb-4">
                    <label class="form-label fw-bold" style="color:#C1272D;">Chọn ảnh mới (nếu muốn thay)</label>
                    <input type="file" name="hinhanh" class="form-control rounded-3">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn fw-bold px-4" style="background:linear-gradient(90deg,#FFD700 0%,#C1272D 100%); color:#fff; border-radius:20px;">
                        <i class="fa fa-save"></i> Lưu thay đổi
                    </button>
                    <a href="admin_qlysp.php" class="btn btn-secondary ms-2 px-4" style="border-radius:20px;">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>