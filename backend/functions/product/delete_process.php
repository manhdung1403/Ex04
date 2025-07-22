<?php
include_once(__DIR__ . '/../../../dbconnect.php');

$id = $_POST['id'] ?? null;
if (!$id) {
    die('Missing product ID.');
}

// Xóa sản phẩm
$stmt = $conn->prepare('DELETE FROM products WHERE id = ?');
$stmt->bind_param('i', $id);
if ($stmt->execute()) {
    header('Location: index.php?msg=deleted');
    exit;
} else {
    die('Delete failed: ' . $conn->error);
}
$stmt->close();
$conn->close(); 