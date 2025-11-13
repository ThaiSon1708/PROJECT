<?php
include("../Model/product.php");
$model = new Product();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $ten = $_POST['ten'];
    $gia = $_POST['gia'];
    $mota = $_POST['mota'];

    // Lấy ảnh cũ để giữ nếu không upload ảnh mới
    $sp = $model->getById($id);
    $anh = $sp['hinhanh'];

    if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] === 0) {
        $tmp = $_FILES['hinhanh']['tmp_name'];
        $name = basename($_FILES['hinhanh']['name']);
        move_uploaded_file($tmp, "../Upload/$name");
        $anh = $name;
    }

    $model->update($id, $ten, $gia, $mota, $anh);
}

header("Location: ../View/danhsachsanpham.php");
exit;
?>
