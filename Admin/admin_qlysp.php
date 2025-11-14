<?php
// Đánh dấu trang 'products' là active trên menu
$current_page = 'products'; 
include_once('admin_header.php');

// ----- TRUY VẤN 1: LẤY SẢN PHẨM ĐANG BÁN (trangthai = 1) -----
// (Chúng ta sẽ thêm JOIN danh mục sau khi tạo bảng tbl_danhmuc)
$sql_active = "SELECT * FROM sanpham WHERE trangthai = 1 ORDER BY id DESC";
$result_active = mysqli_query($conn, $sql_active);
if (!$result_active) {
    echo "<div class='alert alert-danger'>Lỗi SQL (Active): " . mysqli_error($conn) . "</div>";
}

// ----- TRUY VẤN 2: LẤY SẢN PHẨM TRONG THÙNG RÁC (trangthai = 0) -----
$sql_deleted = "SELECT * FROM sanpham WHERE trangthai = 0 ORDER BY id DESC";
$result_deleted = mysqli_query($conn, $sql_deleted);
if (!$result_deleted) {
    echo "<div class='alert alert-danger'>Lỗi SQL (Deleted): " . mysqli_error($conn) . "</div>";
}

// HIỂN THỊ THÔNG BÁO STATUS
$message = '';
if (!empty($_GET['status'])) {
    if ($_GET['status'] == 'delete_success') {
        $message = '<div class="alert alert-success"><i class="fa fa-check"></i> Đã chuyển sản phẩm vào thùng rác.</div>';
    } elseif ($_GET['status'] == 'restore_success') {
        $message = '<div class="alert alert-success"><i class="fa fa-check"></i> Đã khôi phục sản phẩm.</div>';
    } elseif ($_GET['status'] == 'error') {
        $message = '<div class="alert alert-danger"><i class="fa fa-warning"></i> Đã có lỗi xảy ra.</div>';
    }
}
?>

<?= $message ?>

<!-- ============================================= -->
<!-- BẢNG 1: SẢN PHẨM ĐANG BÁN -->
<!-- ============================================= -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0 fw-bold" style="color:#C1272D;">Quản Lý Sản Phẩm (Đang bán)</h2>
    <a href="admin_addsp.php" class="btn btn-success fw-bold" style="border-radius:16px;"><i class="fa fa-plus"></i> Thêm sản phẩm</a>
</div>

<div class="card p-0 shadow-sm rounded-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead style="background:linear-gradient(90deg,#FFD700 0%,#C1272D 100%); color:#fff;">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Tên Sản Phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng (Kho)</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_active && mysqli_num_rows($result_active) > 0):
                    while ($row = mysqli_fetch_assoc($result_active)):
                ?>
                        <tr>
                            <th scope="row">#<?= htmlspecialchars($row['id']) ?></th>
                            <td>
                                <img src="../Upload/<?= htmlspecialchars($row['hinhanh']) ?>" alt="<?= htmlspecialchars($row['ten']) ?>" width="60" style="border-radius: 8px; border: 2px solid #FFD700;">
                            </td>
                            <td><?= htmlspecialchars($row['ten']) ?></td>
                            <td><?= number_format($row['gia'], 0, ',', '.') ?>₫</td>
                            <td><?= htmlspecialchars($row['soluong']) ?></td>
                            <td>
                                <a href="admin_editsp.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning fw-bold" style="border-radius:12px;">
                                    <i class="fa fa-edit"></i> Sửa
                                </a>
                                <a href="admin_deletesp.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger fw-bold" style="border-radius:12px;"
                                   onclick="return confirm('Bạn có chắc chắn muốn chuyển sản phẩm này vào thùng rác?');">
                                    <i class="fa fa-trash"></i> Xóa
                                </a>
                            </td>
                        </tr>
                <?php
                    endwhile;
                else:
                    echo '<tr><td colspan="6" class="text-center p-4">Chưa có sản phẩm nào (Đang bán).</td></tr>';
                endif;
                ?>
            </tbody>
        </table>
    </div>
</div>


<!-- ============================================= -->
<!-- BẢNG 2: THÙNG RÁC (NGAY BÊN DƯỚI) -->
<!-- ============================================= -->
<div class="d-flex justify-content-between align-items-center mt-5 mb-4">
    <h2 class="mb-0 fw-bold" style="color:#555;">Thùng Rác (Đã xóa)</h2>
</div>

<div class="card p-0 shadow-sm rounded-4" style="background-color: #f8f9fa;">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead style="background:linear-gradient(90deg,#FFD700 0%,#C1272D 100%); color:#fff;">
                <tr>
                    <th>ID</th>
                    <th>Ảnh</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_deleted && mysqli_num_rows($result_deleted) > 0):
                    while ($row_del = mysqli_fetch_assoc($result_deleted)):
                ?>
                        <tr style="opacity: 0.7;">
                            <th scope="row">#<?= htmlspecialchars($row_del['id']) ?></th>
                            <td>
                                <img src="../Upload/<?= htmlspecialchars($row_del['hinhanh']) ?>" alt="<?= htmlspecialchars($row_del['ten']) ?>" width="60" style="border-radius: 8px; filter: grayscale(1); border: 2px solid #ccc;">
                            </td>
                            <td><?= htmlspecialchars($row_del['ten']) ?></td>
                            <td><?= number_format($row_del['gia'], 0, ',', '.') ?>₫</td>
                            <td>
                                <!-- NÚT KHÔI PHỤC -->
                                <a href="admin_restoresp.php?id=<?= $row_del['id'] ?>" class="btn btn-sm btn-success fw-bold" style="border-radius:12px;"
                                   onclick="return confirm('Bạn có chắc chắn muốn khôi phục sản phẩm này?');">
                                    <i class="fa fa-undo"></i> Khôi phục
                                </a>
                            </td>
                        </tr>
                <?php
                    endwhile;
                else:
                    echo '<tr><td colspan="5" class="text-center p-4">Thùng rác trống.</td></tr>';
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