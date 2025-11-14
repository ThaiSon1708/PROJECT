<?php
$current_page = 'categories'; 
include_once('admin_header.php'); 

// SỬA LỖI: Dùng bảng 'danhmuc' và cột khoá thực tế là 'id_danhmuc'
$sql_active = "SELECT * FROM danhmuc WHERE trangthai = 1 ORDER BY id_danhmuc DESC";
$result_active = mysqli_query($conn, $sql_active);

$sql_deleted = "SELECT * FROM danhmuc WHERE trangthai = 0 ORDER BY id_danhmuc DESC";
$result_deleted = mysqli_query($conn, $sql_deleted);

// Xử lý thông báo (nếu có)
$message = '';
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'add_success') {
        $message = '<div class="alert alert-success">Đã thêm danh mục thành công!</div>';
    }
    if ($_GET['status'] == 'delete_success') {
        $message = '<div class="alert alert-success">Đã chuyển vào thùng rác!</div>';
    }
    if ($_GET['status'] == 'restore_success') {
        $message = '<div class="alert alert-success">Đã khôi phục danh mục!</div>';
    }
    if ($_GET['status'] == 'update_success') {
        $message = '<div class="alert alert-success">Đã cập nhật tên danh mục!</div>';
    }
    if ($_GET['status'] == 'error') {
        $message = '<div class="alert alert-danger">Có lỗi xảy ra!</div>';
    }
}
?>

<h2 class="mb-4 fw-bold" style="color:#C1272D;">Quản Lý Danh Mục</h2>

<?= $message ?>

<!-- FORM THÊM MỚI DANH MỤC -->
<div class="card p-4 shadow-sm rounded-4 mb-4">
    <h5 class="mb-3 fw-bold">Thêm Danh Mục Mới</h5>
    <form action="admin_add_dm.php" method="POST">
        <div class="input-group">
            <input type="text" class="form-control" name="tendanhmuc" placeholder="Nhập tên danh mục mới..." required>
            <button class="btn btn-warning fw-bold" type="submit">
                <i class="fa fa-plus"></i> Thêm mới
            </button>
        </div>
    </form>
</div>

<!-- BẢNG 1: DANH MỤC ĐANG HIỂN THỊ -->
<div class="card p-0 shadow-sm rounded-4">
    <div class="card-header bg-white rounded-top-4">
        <h5 class="mb-0 fw-bold" style="color:#C1272D;">Danh Sách Danh Mục (Đang Hiển Thị)</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên Danh Mục</th>
                    <th scope="col" class="text-end">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_active && mysqli_num_rows($result_active) > 0):
                    while ($row = mysqli_fetch_assoc($result_active)):
                ?>
                        <tr>
                            <th scope="row">#<?= htmlspecialchars($row['id_danhmuc']) ?></th>
                            <td><?= htmlspecialchars($row['tendanhmuc']) ?></td>
                            <td class="text-end">
                                <a href="admin_edit_dm.php?id=<?= $row['id_danhmuc'] ?>" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i> Sửa
                                </a>
                                <a href="admin_delete_dm.php?id=<?= $row['id_danhmuc'] ?>" class="btn btn-sm btn-danger" 
                                   onclick="return confirm('Bạn có chắc muốn xóa (ẩn) danh mục này?');">
                                    <i class="fa fa-trash"></i> Xóa
                                </a>
                            </td>
                        </tr>
                <?php
                    endwhile;
                else:
                    echo '<tr><td colspan="3" class="text-center p-4">Chưa có danh mục nào.</td></tr>';
                endif;
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- BẢNG 2: THÙNG RÁC (DANH MỤC ĐÃ XÓA) -->
<h2 class="mt-5 mb-4 fw-bold" style="color:#555;">Thùng Rác (Danh mục đã xóa/ẩn)</h2>
<div class="card p-0 shadow-sm rounded-4" style="background-color: #f8f9fa;">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Tên Danh Mục</th>
                    <th class="text-end">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_deleted && mysqli_num_rows($result_deleted) > 0):
                    while ($row_del = mysqli_fetch_assoc($result_deleted)):
                ?>
                        <tr style="opacity: 0.7;">
                            <th scope="row">#<?= htmlspecialchars($row_del['id_danhmuc']) ?></th>
                            <td><?= htmlspecialchars($row_del['tendanhmuc']) ?></td>
                            <td class="text-end">
                                <a href="admin_restore_dm.php?id=<?= $row_del['id_danhmuc'] ?>" class="btn btn-sm btn-success" 
                                   onclick="return confirm('Bạn có chắc muốn khôi phục danh mục này?');">
                                    <i class="fa fa-undo"></i> Khôi phục
                                </a>
                            </td>
                        </tr>
                <?php
                    endwhile;
                else:
                    echo '<tr><td colspan="3" class="text-center p-4">Thùng rác trống.</td></tr>';
                endif;
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
mysqli_close($conn);
include_once('admin_footer.php');
?>