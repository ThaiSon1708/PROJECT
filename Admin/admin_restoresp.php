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
    $ok = $model->restore($id);
    $status = $ok ? 'restore_success' : 'error';
    header("Location: admin_qlysp.php?status={$status}");
    exit;
}

header("Location: admin_qlysp.php");
exit;
?>

<?php if (!empty($_GET['status'])): ?>
    <?php if ($_GET['status'] == 'delete_success'): ?>
        <div class="alert alert-success">Đã chuyển sản phẩm vào thùng rác.</div>
    <?php elseif ($_GET['status'] == 'restore_success'): ?>
        <div class="alert alert-success">Đã khôi phục sản phẩm.</div>
    <?php else: ?>
        <div class="alert alert-danger">Đã có lỗi xảy ra.</div>
    <?php endif; ?>
<?php endif; ?>