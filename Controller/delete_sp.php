<?php
include("../model/product.php");
$model = new product();
if (isset($_GET['id'])) {
    $model->delete($_GET['id']);
}
header("Location: ../View/danhsachsanpham.php");
exit;
?>