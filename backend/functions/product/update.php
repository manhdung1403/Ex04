<?php include_once(__DIR__ . '/../../layouts/config.php'); ?>

<?php

include_once(__DIR__ . '/../../../dbconnect.php');

$id = $_GET['id'] ?? null;
if (!$id) {
    die("Missing product ID.");
}

$sql = "SELECT id, name, price, stock_quantity, image_url, category FROM products WHERE id=$id";
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
                    <h1 class="h2">Update Product</h1>
                </div>
                <form method="POST" action="update_process.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">

                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $product['name'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?= $product['price'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="stock_quantity" class="form-label">Stock Quantity</label>
                        <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" value="<?= $product['stock_quantity'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control" id="category" name="category" value="<?= $product['category'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="image_url" class="form-label">Image</label><br>
                        <img src="/demoshop/assets/<?= $product['image_url'] ?>" style="max-width: 200px;"><br>
                        <input type="file" class="form-control" id="image_url" name="image_url">
                        <input type="hidden" name="old_image_url" value="<?= $product['image_url'] ?>">
                    </div>

                    <button type="submit" class="btn btn-success">Update Product</button>
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                </form>
            </main>
        </div>
    </div>

    <?php include_once(__DIR__ . '/../../layouts/partials/footer.php'); ?>
    <?php include_once(__DIR__ . '/../../layouts/scripts.php'); ?>
</body>

</html>
