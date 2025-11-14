<?php
$current_page = 'orders';
include_once('admin_header.php');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<div class='alert alert-danger'>Không tìm thấy ID đơn hàng.</div>";
    include_once('admin_footer.php');
    exit;
}
$idbill = (int)$_GET['id'];

// SỬA LỖI: Lấy 't.name' (thay vì t.hoten)
$sql_bill = "SELECT b.*, t.name, t.email, t.sdt AS sdt_khachhang
             FROM tbl_bill AS b
             LEFT JOIN taikhoan AS t ON b.iduser = t.id
             WHERE b.id = ?";
             
$stmt_bill = mysqli_prepare($conn, $sql_bill);
mysqli_stmt_bind_param($stmt_bill, "i", $idbill);
mysqli_stmt_execute($stmt_bill);
$result_bill = mysqli_stmt_get_result($stmt_bill);
$bill = mysqli_fetch_assoc($result_bill);
mysqli_stmt_close($stmt_bill);

if (!$bill) {
    echo "<div class='alert alert-danger'>Không tìm thấy đơn hàng #$idbill.</div>";
    include_once('admin_footer.php');
    exit;
}

$sql_cart = "SELECT * FROM tbl_cart WHERE idbill = ?";
$stmt_cart = mysqli_prepare($conn, $sql_cart);
mysqli_stmt_bind_param($stmt_cart, "i", $idbill);
mysqli_stmt_execute($stmt_cart);
$result_cart = mysqli_stmt_get_result($stmt_cart);
mysqli_stmt_close($stmt_cart);
mysqli_close($conn);
?>

<h2 class="mb-4 fw-bold" style="color:#C1272D;">
    Chi Tiết Đơn Hàng #<?= htmlspecialchars($bill['id']) ?>
</h2>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="card shadow-sm rounded-4 h-100">
            <div class="card-header" style="background-color: #fffbe6; color:#C1272D; border-radius: 18px 18px 0 0;">
                <h5 class="mb-0 fw-bold"><i class="fa fa-user me-2"></i>Thông Tin Khách Hàng</h5>
            </div>
            <div class="card-body p-4">
                <!-- SỬA LỖI: Dùng 'name' -->
                <p><strong>Khách hàng:</strong> <?= htmlspecialchars($bill['name'] ?? 'Khách vãng lai') ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($bill['email'] ?? 'N/A') ?></p>
                <p><strong>SĐT Khách hàng:</strong> <?= htmlspecialchars($bill['sdt_khachhang'] ?? 'N/A') ?></p>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="card shadow-sm rounded-4 h-100">
            <div class="card-header" style="background-color: #fffbe6; color:#C1272D; border-radius: 18px 18px 0 0;">
                <h5 class="mb-0 fw-bold"><i class="fa fa-truck me-2"></i>Thông Tin Giao Hàng</h5>
            </div>
            <div class="card-body p-4">
                <p><strong>Người nhận:</strong> <?= htmlspecialchars($bill['hoten_nguoinhan']) ?></p>
                <p><strong>SĐT Nhận hàng:</strong> <?= htmlspecialchars($bill['sdt_nguoinhan']) ?></p>
                <p><strong>Địa chỉ:</strong> <?= htmlspecialchars($bill['diachi_nguoinhan']) ?></p>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm rounded-4 mt-4">
    <div class="card-header" style="background-color: #fffbe6; color:#C1272D; border-radius: 18px 18px 0 0;">
        <h5 class="mb-0 fw-bold"><i class="fa fa-box-open me-2"></i>Các Sản Phẩm Đã Đặt</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID Sản phẩm</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá (lúc đặt)</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result_cart && mysqli_num_rows($result_cart) > 0):
                        while ($item = mysqli_fetch_assoc($result_cart)):
                    ?>
                        <tr>
                            <td>#<?= htmlspecialchars($item['idsanpham']) ?></td>
                            <td><?= htmlspecialchars($item['tensp']) ?></td>
                            <td><?= number_format($item['gia'], 0, ',', '.') ?>₫</td>
                            <td>x <?= htmlspecialchars($item['soluong']) ?></td>
                            <td><?= number_format($item['gia'] * $item['soluong'], 0, ',', '.') ?>₫</td>
                        </tr>
                    <?php
                        endwhile;
                    else:
                        echo '<tr><td colspan="5" class="text-center p-4">Không tìm thấy chi tiết sản phẩm.</td></tr>';
                    endif;
                    ?>
                </tbody>
                <tfoot class="table-light">
                    <tr>
                        <td colspan="4" class="text-end fw-bold">Trạng Thái Đơn Hàng:</td>
                        <td class="fw-bold">
                            <span class="badge fs-6" style="background-color: #C1272D;"><?= htmlspecialchars($bill['trangthai']) ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-end fw-bold fs-5" style="color:#C1272D;">TỔNG TIỀN:</td>
                        <td class="fw-bold fs-5" style="color:#C1272D;">
                            <?= number_format($bill['tongdonhang'], 0, ',', '.') ?>₫
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<div class="mt-4">
    <a href="admin_qlydh.php" class="btn btn-secondary"><i class="fa fa-arrow-left me-2"></i> Quay lại Danh sách</a>
</div>

<?php
include_once('admin_footer.php');
?>