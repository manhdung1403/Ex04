<?php
include_once(__DIR__ . '/../../../dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $email    = trim($_POST["email"]);
    $address  = trim($_POST["address"]);
    $role     = trim($_POST["role"]);

    if ($username && $password && $email && $address && $role) {
        $created_at = date("Y-m-d H:i:s");
        $stmt = $conn->prepare("INSERT INTO users (username, password, email, address, role, created_at) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $username, $password, $email, $address, $role, $created_at);
        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Lỗi: " . $stmt->error;
        }
    } else {
        echo "Vui lòng nhập đầy đủ thông tin!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Create New User</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" required>
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" required>
        </div>

        <div class="mb-3">
            <label for="role">Role</label>
            <select class="form-select" name="role" id="role" required>
                <option value="User">User</option>
                <option value="Admin">Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>
