<?php

session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

include_once('../Model/product.php');
$model = new Product();

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $ok = $model->softDelete($id);
    $status = $ok ? 'delete_success' : 'error';
    header("Location: admin_qlysp.php?status={$status}");
    exit;
}

header("Location: admin_qlysp.php");
exit;
?>

<a href="admin_deletesp.php?id=<?= $sp['id'] ?>" class="btn btn-danger btn-sm fw-bold" style="border-radius:16px;" onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?');"><i class="fa fa-trash"></i> Xóa</a>