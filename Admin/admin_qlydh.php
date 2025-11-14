<?php
$current_page = 'orders'; 
include_once('admin_header.php'); 

// SỬA LỖI: Lấy 'tk.name' (thay vì tk.hoten)
$sql = "SELECT dh.*, tk.name AS ten_kh
        FROM tbl_bill AS dh
        LEFT JOIN taikhoan AS tk ON dh.iduser = tk.id
        ORDER BY dh.ngaydathang DESC";
        
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "<div class='alert alert-danger'>Lỗi SQL: " . mysqli_error($conn) . "</div>";
}
?>

<h2 class="mb-4 fw-bold" style="color:#C1272D;">Quản Lý Đơn Hàng</h2>

<?php
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Cập nhật trạng thái đơn hàng thành công!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
?>

<div class="card p-0 shadow-sm rounded-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th scope="col">Mã ĐH</th>
                    <th scope="col">Tên Khách Hàng (name)</th>
                    <th scope="col">Ngày Đặt</th>
                    <th scope="col">Tổng Tiền</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col">Chi Tiết</th>
                    <th scope="col" style="min-width: 250px;">Cập Nhật Trạng Thái</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0):
                    while ($row = mysqli_fetch_assoc($result)):
                ?>
                        <tr>
                            <th scope="row">#<?= htmlspecialchars($row['id']) ?></th>
                            <td><?= htmlspecialchars($row['ten_kh'] ?? 'Khách vãng lai') ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($row['ngaydathang'])) ?></td>
                            <td><?= number_format($row['tongdonhang'], 0, ',', '.') ?>₫</td>
                            <td>
                                <?php
                                $status = htmlspecialchars($row['trangthai']);
                                $badge_class = 'bg-secondary';
                                if ($status == 'Đã xác nhận') $badge_class = 'bg-primary';
                                if ($status == 'Đang giao') $badge_class = 'bg-info text-dark';
                                if ($status == 'Hoàn thành') $badge_class = 'bg-success';
                                if ($status == 'Đã hủy') $badge_class = 'bg-danger';
                                echo "<span class='badge $badge_class fs-6'>$status</span>";
                                ?>
                            </td>
                            <td>
                                <a href="admin_chitietdh.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-info text-white">
                                    <i class="fa fa-eye"></i> Xem
                                </a>
                            </td>
                            <td>
                                <?php if ($row['trangthai'] != 'Hoàn thành' && $row['trangthai'] != 'Đã hủy'): ?>
                                    <form action="admin_update_order.php" method="POST" class="d-flex gap-2">
                                        <input type="hidden" name="id_donhang" value="<?= $row['id'] ?>">
                                        <select name="trangthai_moi" class="form-select form-select-sm">
                                            <option value="Đang xử lý" <?= ($status == 'Đang xử lý') ? 'disabled' : '' ?>>Đang xử lý</option>
                                            <option value="Đã xác nhận" <?= ($status == 'Đã xác nhận') ? 'selected' : '' ?>>Đã xác nhận</option>
                                            <option value="Đang giao" <?= ($status == 'Đang giao') ? 'selected' : '' ?>>Đang giao</option>
                                            <option value="Hoàn thành" <?= ($status == 'Hoàn thành') ? 'selected' : '' ?>>Hoàn thành</option>
                                            <option value="Đã hủy" class="text-danger">Hủy đơn</option>
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-primary">Cập nhật</button>
                                    </form>
                                <?php else: ?>
                                    <span class="text-muted fst-italic">Đã kết thúc</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                <?php
                    endwhile;
                else:
                    echo '<tr><td colspan="7" class="text-center p-4">Chưa có đơn hàng nào.</td></tr>';
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