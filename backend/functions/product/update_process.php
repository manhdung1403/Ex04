<?php
include_once(__DIR__ . '/../../../dbconnect.php');

// Lấy dữ liệu từ form
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$stock_quantity = $_POST['stock_quantity'];
$category = $_POST['category'];

// Xử lý hình ảnh nếu có upload
$image_url = $_POST['old_image_url'];
if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] == 0) {
    $upload_dir = '../../../assets/';
    $filename = basename($_FILES['image_url']['name']);
    $target_file = $upload_dir . $filename;

    if (move_uploaded_file($_FILES['image_url']['tmp_name'], $target_file)) {
        $image_url = $filename; // Lưu tên file mới
    }
}

// Câu lệnh UPDATE
$sql = "UPDATE products SET 
            name = '$name', 
            price = '$price', 
            stock_quantity = '$stock_quantity', 
            category = '$category', 
            image_url = '$image_url'
        WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php"); // trở về danh sách sản phẩm
} else {
    header("Location: update.php?id=$id"); // quay lại nếu lỗi
}

$conn->close();
