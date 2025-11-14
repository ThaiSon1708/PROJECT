<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST['product_id'], $_POST['product_name'], $_POST['product_price'], $_POST['product_image'], $_POST['quantity'])
    ) {
        $item = [
            'id' => $_POST['product_id'],
            'ten' => $_POST['product_name'],
            'gia' => $_POST['product_price'],
            'hinhanh' => $_POST['product_image'],
            'quantity' => (int)$_POST['quantity']
        ];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $found = false;
        foreach ($_SESSION['cart'] as &$cart_item) {
            if ($cart_item['id'] == $item['id']) {
                $cart_item['quantity'] += $item['quantity'];
                $found = true;
                break;
            }
        }
        unset($cart_item);

        if (!$found) {
            $_SESSION['cart'][] = $item;
        }

        header("Location: cart.php");
        exit();
    } else {
        echo "Thiếu dữ liệu sản phẩm!";
        exit();
    }
}

if (isset($_GET['id_san_pham'])) {
    $id_san_pham = $_GET['id_san_pham'];
    $ten = "Sản phẩm " . $id_san_pham;
    $gia = 1000;
    $hinhanh = "image.png";
    $soluong = 1;

    $_SESSION['cart'][$id_san_pham] = [
        'id' => $id_san_pham,
        'ten' => $ten,
        'gia' => $gia,
        'hinhanh' => $hinhanh,
        'soluong' => $soluong
    ];

    header("Location: cart.php");
    exit();
}
?>
