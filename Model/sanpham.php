<?php
require_once __DIR__ . '/connect.php';  // cùng thư mục Model

class sanpham {
    // Thêm sản phẩm mới
    public function insert($ten, $gia, $anh, $soluong, $mota, $id_danhmuc) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO sanpham (ten, gia, anh, soluong, mota, id_danhmuc) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sdssis", $ten, $gia, $anh, $soluong, $mota, $id_danhmuc);
        return $stmt->execute();
    }

    // Lấy tất cả sản phẩm
    public function getAll() {
        global $conn;
        $sql = "SELECT * FROM sanpham";
        return mysqli_query($conn, $sql);
    }

    // Lấy sản phẩm theo ID
    public function getById($id) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM sanpham WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Lấy sản phẩm theo tên
    public function getByName($ten) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM sanpham WHERE ten = ?");
        $stmt->bind_param("s", $ten);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Lấy sản phẩm theo danh mục
    public function getByDanhMuc($id_danhmuc) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM sanpham WHERE id_danhmuc = ?");
        $stmt->bind_param("i", $id_danhmuc);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Xóa sản phẩm theo ID
    public function delete($id) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM sanpham WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Cập nhật sản phẩm
    public function update($id, $ten, $gia, $anh, $soluong, $mota, $id_danhmuc) {
        global $conn;
        $stmt = $conn->prepare("UPDATE sanpham SET ten=?, gia=?, anh=?, soluong=?, mota=?, id_danhmuc=? WHERE id=?");
        $stmt->bind_param("sdssisi", $ten, $gia, $anh, $soluong, $mota, $id_danhmuc, $id);
        return $stmt->execute();
    }
}
?>