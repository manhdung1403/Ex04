<?php include_once(__DIR__ . '/../../layouts/config.php'); ?>

<?php
include_once(__DIR__ . '/../../../dbconnect.php');

$id = $_GET['id'] ?? null;
if (!$id) {
    die("Missing product ID.");
}

$sql = "SELECT id, name FROM products WHERE id = $id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
if (!$product) {
    die("Product not found.");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once(__DIR__ . '/../../layouts/head.php'); ?>
</head>

<body class="d-flex flex-column h-100">
    <?php include_once(__DIR__ . '/../../layouts/partials/header.php'); ?>

    <div class="container-fluid">
        <div class="row">
            <?php include_once(__DIR__ . '/../../layouts/partials/sidebar.php'); ?>

            <main role="main" class="col-md-10 ml-sm-auto px-4 mb-2">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2 text-danger">Delete Product</h1>
                </div>

                <div class="alert alert-warning">
                    Are you sure you want to delete the product <strong>"<?= htmlspecialchars($product['name']) ?>"</strong>?
                </div>

                <form method="POST" action="delete_process.php">
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                    <button type="submit" class="btn btn-danger btn-sm">Yes, Delete</button>
                    <a href="index.php" class="btn btn-secondary btn-sm">Cancel</a>
                </form>
            </main>
        </div>
    </div>

    <?php include_once(__DIR__ . '/../../layouts/partials/footer.php'); ?>
    <?php include_once(__DIR__ . '/../../layouts/scripts.php'); ?>
</body>

</html>
