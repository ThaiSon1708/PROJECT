<?php
include("../Model/product.php");
$model = new Product();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten = isset($_POST['ten']) ? $_POST['ten'] : '';
    $gia = isset($_POST['gia']) ? $_POST['gia'] : '';
    $mota = isset($_POST['mota']) ? $_POST['mota'] : '';
    $anh = '';

    if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == 0) {
        $anh = basename($_FILES['hinhanh']['name']);
        move_uploaded_file($_FILES['hinhanh']['tmp_name'], "../Upload/$anh");
    }

    $id_danhmuc = isset($_POST['id_danhmuc']) ? $_POST['id_danhmuc'] : 1;

    $model->add($ten, $gia, $anh, $mota);
    header("Location: ../View/danhsachsanpham.php");
    exit;
} else {
    header("Location: ../View/themsanpham.php");
    exit;
}
?>
