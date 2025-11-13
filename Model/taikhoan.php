<?php
    include ("connect.php");
    class taikhoan{
        public function select(){
            global $conn;
            $sql = "SELECT*FROM taikhoan";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        public function sl_id($id){
            global $conn;
            $sql = "SELECT*FROM taikhoan where id_user = '$id'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        public function insert_taikhoan($name ,$email,$pass){
            global $conn;
            $sql="insert into taikhoan (name,email,pass)
                                values('$name','$email','$pass')";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function select_taikhoan($name){
            global $conn;
            $sql="select * from taikhoan where name ='$name'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
    }
 ?>