<?php
// nếu như người dùng bấm vào nút submit 
include("../Model/taikhoan.php");
if(isset($_POST['txtsub'])){
    if(empty($_POST['txtname']) || empty($_POST['txtmail']) || empty($_POST['txtpass']) || empty($_POST['txtconfirm'])){
        echo"<script>alert('Vui lòng nhập đầy đủ thông tin!');
            window.location.href = '../View/dangky.php'; 
            </script>";
    }
    else{
        // kiểm tra đã tồn tại user name chưa
        $model = new taikhoan();
        $sl_acc = $model->select_taikhoan($_POST['txtname']);

        if($sl_acc->num_rows > 0){
            echo"<script>alert('Tài khoản đã tồn tại!');
            window.location.href = '../View/dangky.php'; 
            </script>";
        }
        else{
            if($_POST['txtpass'] == $_POST['txtconfirm']){
                $model = new taikhoan();
                $insert = $model->insert_taikhoan($_POST['txtname'], $_POST['txtmail'],$_POST['txtpass']);
                echo"<script>alert('Thành công!');
                window.location.href = '../View/dangnhap.php'; 
                </script>";
            }
        }
    }

    
}


?>