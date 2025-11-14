<?php
session_start();
if (!isset($_POST['id'])) {
    header("Location: ../View/danhsachsanpham.php");
    exit;
}

include_once('../Model/product.php');
$model = new Product();

$id = (int)$_POST['id'];
$ten = trim($_POST['ten'] ?? '');
$gia = (int)($_POST['gia'] ?? 0);
$mota = trim($_POST['mota'] ?? '');
$old_image = $_POST['old_image'] ?? '';

// xử lý upload ảnh (nếu có)
$new_image_name = $old_image;
if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] === UPLOAD_ERR_OK) {
    $tmp = $_FILES['hinhanh']['tmp_name'];
    $orig = basename($_FILES['hinhanh']['name']);
    $ext = strtolower(pathinfo($orig, PATHINFO_EXTENSION));
    $allowed = ['jpg','jpeg','png','gif','webp'];
    if (in_array($ext, $allowed)) {
        // tạo tên mới tránh trùng
        $new_image_name = time() . '_' . preg_replace('/[^a-z0-9\._-]/i','', $orig);
        $dest = __DIR__ . '/../Upload/' . $new_image_name;
        if (!move_uploaded_file($tmp, $dest)) {
            // nếu upload fail, giữ ảnh cũ và set thông báo (ở đây redirect với error)
            header("Location: ../View/suasanpham.php?id={$id}&error=upload_fail");
            exit;
        } else {
            // (tuỳ chọn) xóa ảnh cũ nếu tồn tại
            if ($old_image && file_exists(__DIR__ . '/../Upload/' . $old_image)) {
                @unlink(__DIR__ . '/../Upload/' . $old_image);
            }
        }
    } else {
        header("Location: ../View/suasanpham.php?id={$id}&error=invalid_ext");
        exit;
    }
}

// Cập nhật: KHÔNG đổi cột trangthai ở đây
$stmt = $model->update($id, $ten, $gia, $new_image_name, $mota);

// nếu update() trong model không trả về boolean, bạn có thể kiểm tra bằng cách gọi trực tiếp query ở đây
header("Location: ../View/suasanpham.php?id={$id}&success=1");
exit;
?>
