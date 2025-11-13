<?php
session_start();
include("../Model/product.php");
$model = new Product();
$products = $model->getAll(); // Lấy danh sách sản phẩm
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-4">
    <h2 class="mb-4 text-center" style="color:#b30000; font-weight:bold;">Danh sách sản phẩm Kinh Đô</h2>
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="../Upload/<?= htmlspecialchars($product['hinhanh']) ?>" class="card-img-top" style="height:220px;object-fit:cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= htmlspecialchars($product['ten']) ?></h5>
                        <p class="card-text text-danger fw-bold"><?= number_format($product['gia'], 0, ',', '.') ?> đ</p>
                        <form method="post" action="add_to_cart.php" class="d-flex flex-column align-items-center">
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <input type="hidden" name="product_name" value="<?= htmlspecialchars($product['ten']) ?>">
                            <input type="hidden" name="product_price" value="<?= $product['gia'] ?>">
                            <input type="hidden" name="product_image" value="<?= htmlspecialchars($product['hinhanh']) ?>">
                            <input type="number" name="quantity" value="1" min="1" class="form-control mb-2" style="width:80px;">
                            <button type="submit" class="btn btn-danger">Thêm vào giỏ hàng</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="text-center mt-4">
        <a href="cart.php" class="btn btn-outline-danger fw-bold">🛒 Xem giỏ hàng</a>
    </div>
</div>
</body>
</html>