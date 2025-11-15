<?php
// === BÀI 1: API ENDPOINT (products.php) ===

// 1. Thiết lập Headers
// Báo cho trình duyệt biết đây là file JSON
header('Content-Type: application/json');
// Cho phép các trang web khác (React app của bạn sau này) gọi được file này
header('Access-Control-Allow-Origin: *'); 

// 2. Nhúng Model
// (Đường dẫn đi lùi 1 cấp để vào thư mục Model)
include_once('../Model/product.php');

// 3. Khởi tạo Model
$model = new Product();

// 4. Lấy dữ liệu
// Chúng ta sẽ dùng lại hàm getAll() bạn đã viết trong Model
$products = $model->getAll(); //

// 5. Trả về dữ liệu dưới dạng JSON
// Đây là bước quan trọng nhất, React sẽ đọc dữ liệu này
echo json_encode([
    'success' => true,
    'data' => $products
]);

exit; // Dừng script tại đây
?>