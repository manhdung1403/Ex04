<?php include_once(__DIR__ . '/../../layouts/config.php'); ?>
<?php include_once(__DIR__ . '/../../../dbconnect.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <?php include_once(__DIR__ . '/../../layouts/head.php'); ?>
</head>
<body class="d-flex flex-column h-100">
    <?php include_once(__DIR__ . '/../../layouts/partials/header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once(__DIR__ . '/../../layouts/partials/sidebar.php'); ?>
            <main role="main" class="col-md-10 ml-sm-auto px-4 mb-2">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Create Product</h1>
                </div>
                <form method="POST" action="create_process.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control form-control-sm" id="name" name="name" required style="max-width: 400px;">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.01" class="form-control form-control-sm" id="price" name="price" required style="max-width: 400px;">
                    </div>
                    <div class="mb-3">
                        <label for="stock_quantity" class="form-label">Stock Quantity</label>
                        <input type="number" class="form-control form-control-sm" id="stock_quantity" name="stock_quantity" required style="max-width: 400px;">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control form-control-sm" id="category" name="category" required style="max-width: 400px;">
                    </div>
                    <div class="mb-3">
                        <label for="image_url" class="form-label">Image</label><br>
                        <input type="file" class="form-control form-control-sm" id="image_url" name="image_url" required style="max-width: 400px;">
                    </div>
                    <button type="submit" class="btn btn-success btn-sm">Create Product</button>
                    <a href="list.php" class="btn btn-secondary btn-sm">Cancel</a>
                </form>
            </main>
        </div>
    </div>
    <?php include_once(__DIR__ . '/../../layouts/partials/footer.php'); ?>
    <?php include_once(__DIR__ . '/../../layouts/scripts.php'); ?>
</body>
</html>
