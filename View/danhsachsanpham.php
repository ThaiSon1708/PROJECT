<?php
include("../model/product.php");
$model = new product();
// Lấy sản phẩm đang hoạt động
$ds = $model->getAll(); // SELECT * FROM sanpham WHERE trangthai=1
// Lấy sản phẩm đã xóa (ẩn)
$ds_xoa = $model->getDeleted(); // SELECT * FROM sanpham WHERE trangthai=0
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color:#C1272D;">DANH SÁCH SẢN PHẨM</h2>
        <a href="themsanpham.php" class="btn fw-bold" style="background:linear-gradient(90deg,#FFD700 0%,#C1272D 100%); color:#fff; border-radius:20px;">
            <i class="fa fa-plus"></i> Thêm sản phẩm
        </a>
    </div>
    <!-- Sản phẩm đang hoạt động -->
    <div class="table-responsive rounded-4 shadow mb-5" style="background:linear-gradient(135deg,#fffbe6 60%,#FFD70022 100%);">
        <table class="table table-hover align-middle mb-0">
            <thead style="background:linear-gradient(90deg,#FFD700 0%,#C1272D 100%); color:#fff;">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col" class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($ds as $sp): ?>
                <tr>
                    <td><?= $sp['id'] ?></td>
                    <td style="color:#C1272D; font-weight:500;"><?= htmlspecialchars($sp['ten']) ?></td>
                    <td style="color:#b30000;"><?= number_format($sp['gia'],0,',','.') ?>₫</td>
                    <td>
                        <?php
                            $path = "../Upload/" . $sp['hinhanh'];
                            if (file_exists($path) && !empty($sp['hinhanh'])) {
                                echo "<img src='$path' width='60' height='60' style='object-fit: cover; border-radius: 12px; border: 2px solid #FFD700;'>";
                            } else {
                                echo "<span class='text-muted'>Không có ảnh</span>";
                            }
                        ?>
                    </td>
                    <td style="max-width:200px;"><?= htmlspecialchars($sp['mota']) ?></td>
                    <td class="text-center">
                        <a href="suasanpham.php?id=<?= $sp['id'] ?>" class="btn btn-warning btn-sm fw-bold me-1" style="border-radius:16px;"><i class="fa fa-edit"></i> Sửa</a>
                        <a href="../Controller/delete_sp.php?id=<?= $sp['id'] ?>" class="btn btn-danger btn-sm fw-bold" style="border-radius:16px;" onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?');"><i class="fa fa-trash"></i> Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Sản phẩm đã xóa -->
    <div class="mb-3">
        <h4 class="fw-bold" style="color:#888;">Sản phẩm đã xóa</h4>
    </div>
    <div class="table-responsive rounded-4 shadow" style="background:linear-gradient(135deg,#fffbe6 60%,#FFD70022 100%);">
        <table class="table table-hover align-middle mb-0">
            <thead style="background:linear-gradient(90deg,#FFD700 0%,#C1272D 100%); color:#fff;">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col" class="text-center">Khôi phục</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($ds_xoa)): ?>
                    <tr><td colspan="6" class="text-center text-muted">Không có sản phẩm đã xóa.</td></tr>
                <?php else: foreach($ds_xoa as $sp): ?>
                <tr>
                    <td><?= $sp['id'] ?></td>
                    <td style="color:#888;"><?= htmlspecialchars($sp['ten']) ?></td>
                    <td style="color:#b30000;"><?= number_format($sp['gia'],0,',','.') ?>₫</td>
                    <td>
                        <?php
                            $path = "../Upload/" . $sp['hinhanh'];
                            if (file_exists($path) && !empty($sp['hinhanh'])) {
                                echo "<img src='$path' width='60' height='60' style='object-fit: cover; border-radius: 12px; border: 2px solid #FFD700; opacity:0.7;'>";
                            } else {
                                echo "<span class='text-muted'>Không có ảnh</span>";
                            }
                        ?>
                    </td>
                    <td style="max-width:200px; color:#888;"><?= htmlspecialchars($sp['mota']) ?></td>
                    <td class="text-center">
                        <a href="../Controller/restore_sp.php?id=<?= $sp['id'] ?>" class="btn btn-success btn-sm fw-bold" style="border-radius:16px;">
                            <i class="fa fa-undo"></i> Khôi phục
                        </a>
                    </td>
                </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</div>
