<?php
class User {
    // Kết nối CSDL
    public $conn;
    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "admin");
        $this->conn->set_charset("utf8");
    }
    public function getAll() {
        $result = $this->conn->query("SELECT * FROM users");
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function update($id, $name, $email, $phone, $address) {
        $stmt = $this->conn->prepare("UPDATE users SET name=?, email=?, phone=?, address=? WHERE id=?");
        $stmt->bind_param("ssssi", $name, $email, $phone, $address, $id);
        $stmt->execute();
    }
    // Thêm các hàm add, update nếu cần
}
?>