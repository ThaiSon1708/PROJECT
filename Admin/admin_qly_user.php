<?php
$current_page = 'users'; 
include_once('admin_header.php');

// SỬA LỖI: Chỉ lấy 'name' (không có 'tendangnhap', 'hoten')
$sql = "SELECT id, name, email, pass, is_admin FROM taikhoan ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<h2 class="mb-4 fw-bold" style="color:#C1272D;">Quản Lý Khách Hàng & Admin</h2>

<div class="card p-0 shadow-sm rounded-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên (name)</th>
                    <th scope="col">Email</th>
                    <th scope="col">SĐT</th>
                    <th scope="col">Quyền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0):
                    while ($row = mysqli_fetch_assoc($result)):
                ?>
                        <tr>
                            <th scope="row">#<?= htmlspecialchars($row['id']) ?></th>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['pass']) ?></td>
                            <td>
                                <?php if ($row['is_admin'] == 1): ?>
                                    <span class="badge bg-danger">Admin</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Khách hàng</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                <?php
                    endwhile;
                else:
                    echo '<tr><td colspan="5" class="text-center p-4">Chưa có tài khoản nào.</td></tr>';
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