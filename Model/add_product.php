<?php
include("connect.php");

class product {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function getSanPhamTheoDanhMuc($id_danhmuc) {
        $stmt = $this->conn->prepare("SELECT * FROM sanpham WHERE id_danhmuc = ?");
        $stmt->bind_param("i", $id_danhmuc);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
