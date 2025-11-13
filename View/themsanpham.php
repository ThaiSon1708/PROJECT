<!-- filepath: c:\xampp\htdocs\Project1\View\themsanpham.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f9f9f9;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-container h3 {
            text-align: center;
            color: #701c1c;
            margin-bottom: 20px;
        }
        .btn-submit {
            background-color: #701c1c;
            border-color: #701c1c;
            color: white;
        }
        .btn-submit:hover {
            background-color: #5a1515;
            border-color: #5a1515;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="form-container">
            <h3>Thêm Sản Phẩm</h3>
            <form action="../Controller/add_sp.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="ten" class="form-label">Tên Sản Phẩm</label>
                    <input type="text" class="form-control" id="ten" name="ten" placeholder="Nhập tên sản phẩm" required>
                </div>
                <div class="mb-3">
                    <label for="hinhanh" class="form-label">Hình Ảnh</label>
                    <input type="file" class="form-control" id="hinhanh" name="hinhanh" required>
                </div>
                <div class="mb-3">
                    <label for="gia" class="form-label">Giá (VNĐ)</label>
                    <input type="number" class="form-control" id="gia" name="gia" placeholder="Nhập giá sản phẩm" required>
                </div>
                <div class="mb-3">
                    <label for="mota" class="form-label">Mô Tả</label>
                    <textarea class="form-control" id="mota" name="mota" rows="4" placeholder="Nhập mô tả sản phẩm"></textarea>
                </div>
                <button type="submit" class="btn btn-submit w-100">Thêm Sản Phẩm</button>
            </form>
        </div>
    </div>
</body>
</html>