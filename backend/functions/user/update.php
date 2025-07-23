<?php
include_once(__DIR__ . '/../../../dbconnect.php');

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        echo "User không tồn tại!";
        exit();
    }
} else {
    echo "Thiếu ID người dùng!";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $email    = trim($_POST["email"]);
    $address  = trim($_POST["address"]);
    $role     = trim($_POST["role"]);

    if ($username && $password && $email && $address && $role) {
        $created_at = date("Y-m-d H:i:s");
        $stmt = $conn->prepare("UPDATE users SET username = ?, password = ?, email = ?, address = ?, role = ?, created_at = ? WHERE id = ?");
        $stmt->bind_param("ssssssi", $username, $password, $email, $address, $role, $created_at, $id);
        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "error: " . $stmt->error;
        }
    } else {
        echo "error!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Update User</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" value="<?= htmlspecialchars($user['username']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input type="text" class="form-control" name="password" id="password" value="<?= htmlspecialchars($user['password']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" value="<?= htmlspecialchars($user['address']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="role">Role</label>
            <select class="form-select" name="role" id="role" required>
                <option value="User" <?= $user['role'] === 'User' ? 'selected' : '' ?>>User</option>
                <option value="Admin" <?= $user['role'] === 'Admin' ? 'selected' : '' ?>>Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>
