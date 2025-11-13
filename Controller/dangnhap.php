<?php
session_start();
include_once("../Model/taikhoan.php");

if (isset($_POST['txtlog'])) {
    if (empty($_POST['txtpass']) || empty($_POST['txtname'])) {
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin!'); window.location.href = '../View/dangnhap.php';</script>";
        exit();
    }

    $model = new taikhoan();
    $result = $model->select_taikhoan($_POST['txtname']);
    $account = $result->fetch_assoc();

    if ($account && $_POST['txtpass'] == $account['pass']) {
        $_SESSION['id_user'] = $account['id'];
        $_SESSION['name'] = $account['rname'];
        $_SESSION['is_admin'] = $account['is_admin'];

        if ($account['is_admin'] == 1) {
            header("Location: ../admin/admin.php");
        } else {
            echo "<script>alert('Đăng nhập thành công!'); window.location.href = '../View/trangchu.php';</script>";
        }
    } else {
        echo "<script>alert('Tài khoản hoặc mật khẩu không chính xác!'); window.location.href = '../View/dangnhap.php';</script>";
    }
}
?>