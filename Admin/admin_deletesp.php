<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}
include("../Model/product.php");
$model = new Product();
if (isset($_GET['id'])) {
    $model->delete($_GET['id']);
}
header("Location: admin_qlysp.php");
exit;
?>