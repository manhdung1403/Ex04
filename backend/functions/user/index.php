<!-- Nhúng file cấu hình để xác định được Tên và Tiêu đề của trang hiện tại người dùng đang truy cập -->
<?php include_once(__DIR__ . '/../../layouts/config.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Nhúng file Quản lý các Liên kết CSS dùng chung cho toàn bộ trang web -->
    <?php include_once(__DIR__ . '/../../layouts/head.php'); ?>
</head>

<body class="d-flex flex-column h-100">
    <!-- header -->
    <?php include_once(__DIR__ . '/../../layouts/partials/header.php'); ?>
    <!-- end header -->

    <div class="container-fluid">
        <div class="row">
            <!-- sidebar -->
            <?php include_once(__DIR__ . '/../../layouts/partials/sidebar.php'); ?>
            <!-- end sidebar -->

            <main role="main" class="col-md-10 ml-sm-auto px-4 mb-2">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">User List</h1>
                </div>

                <!-- Block content -->
                <?php
                // 1. Kết nối CSDL
                include_once(__DIR__ . '/../../../dbconnect.php');

                // 2. Câu truy vấn
                $sql = "SELECT id, username, email, address, role, created_at FROM users ORDER BY id DESC";

                // 3. Thực thi
                $result = $conn->query($sql);

                // 4. Lưu dữ liệu
                $users = [];
                while ($row = $result->fetch_array(MYSQLI_NUM)) {
                    $users[] = $row;
                }
                $result->free_result();
                $conn->close();
                ?>

                <a href="create.php" class="btn btn-primary">Create New User</a>
                <table class="table table-bordered table-hover table-sm table-responsive mt-2">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $u): ?>
                            <tr>
                                <td><?= $u[0] ?></td>
                                <td><?= $u[1] ?></td>
                                <td><?= $u[2] ?></td>
                                <td><?= $u[3] ?></td>
                                <td><?= $u[4] ?></td>
                                <td><?= $u[5] ?></td>
                                <td>
                                    <a href="update.php?id=<?= $u[0] ?>" class="btn btn-warning">Update</a>
                                    <a href="delete.php?id=<?= $u[0] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- End block content -->
            </main>
        </div>
    </div>

    <!-- footer -->
    <?php include_once(__DIR__ . '/../../layouts/partials/footer.php'); ?>
    <!-- end footer -->

    <!-- SCRIPT -->
    <?php include_once(__DIR__ . '/../../layouts/scripts.php'); ?>
</body>

</html>
