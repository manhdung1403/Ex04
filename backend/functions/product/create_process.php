<?php
include_once(__DIR__ . '/../../../dbconnect.php');

// Kiểm tra dữ liệu POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $price = floatval($_POST['price'] ?? 0);
    $stock_quantity = intval($_POST['stock_quantity'] ?? 0);
    $category = trim($_POST['category'] ?? '');
    $image_url = '';

    // Kiểm tra dữ liệu hợp lệ
    if ($name === '' || $price <= 0 || $stock_quantity < 0 || $category === '') {
        die('Vui lòng nhập đầy đủ và hợp lệ các trường!');
    }

    // Xử lý upload ảnh
    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/../../../assets/uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $fileTmpPath = $_FILES['image_url']['tmp_name'];
        $fileName = basename($_FILES['image_url']['name']);
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExt = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'avif'];
        if (!in_array($fileExt, $allowedExt)) {
            die('Chỉ cho phép upload ảnh (jpg, jpeg, png, gif, webp, avif)');
        }
        $newFileName = uniqid('img_', true) . '.' . $fileExt;
        $destPath = $uploadDir . $newFileName;
        if (move_uploaded_file($fileTmpPath, $destPath)) {
            $image_url = 'assets/uploads/' . $newFileName;
        } else {
            die('Lỗi upload ảnh!');
        }
    } else {
        die('Vui lòng chọn ảnh sản phẩm!');
    }

    // Thêm sản phẩm vào database
    $stmt = $conn->prepare('INSERT INTO products (name, price, stock_quantity, category, image_url) VALUES (?, ?, ?, ?, ?)');
    if ($stmt) {
        $stmt->bind_param('sdiss', $name, $price, $stock_quantity, $category, $image_url);
        if ($stmt->execute()) {
            // Thành công, chuyển hướng về danh sách sản phẩm
            header('Location: list.php?msg=created');
            exit();
        } else {
            die('Lỗi khi thêm sản phẩm: ' . $stmt->error);
        }
    } else {
        die('Lỗi truy vấn database: ' . $conn->error);
    }
} else {
    die('Phương thức không hợp lệ!');
} 