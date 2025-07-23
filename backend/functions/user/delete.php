<?php
include_once(__DIR__ . '/../../../dbconnect.php');

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "Không có ID sản phẩm để xóa.";
    exit;
}

$sql = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: index.php");
    exit;
} else {
    echo "Lỗi xóa: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
