<?php
class Product {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "banh");
        $this->conn->set_charset("utf8");
    }

    public function getAll() {
        $result = $this->conn->query("SELECT * FROM sanpham WHERE trangthai=1");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
    $stmt = $this->conn->prepare("SELECT * FROM sanpham WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

    public function add($ten, $gia, $hinhanh, $mota) {
        $stmt = $this->conn->prepare("INSERT INTO sanpham (ten, gia, hinhanh, mota) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siss", $ten, $gia, $hinhanh, $mota);
        return $stmt->execute();
    }

    public function update($id, $ten, $gia, $hinhanh, $mota) {
        $stmt = $this->conn->prepare("UPDATE sanpham SET ten=?, gia=?, hinhanh=?, mota=? WHERE id=?");
        $stmt->bind_param("sdssi", $ten, $gia, $hinhanh, $mota, $id);
        $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("UPDATE sanpham SET trangthai=0 WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    public function getSanPhamTheoDanhMuc($id_danhmuc) {
        $stmt = $this->conn->prepare("SELECT * FROM sanpham WHERE id_danhmuc = ?");
        $stmt->bind_param("i", $id_danhmuc);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSanPhamById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM sanpham WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getDeleted() {
        $result = $this->conn->query("SELECT * FROM sanpham WHERE trangthai=0");
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function restore($id) {
    $stmt = $this->conn->prepare("UPDATE sanpham SET trangthai=1 WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
}
?>

