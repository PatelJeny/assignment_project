<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../views/common/bootstrap.php'; ?>
    <title>Home</title>
</head>

<body>
    <?php require_once '../views/common/header_admin.php'; ?>

    <?php require_once '../views/common/admin_section.php'; ?>

    <div class="container">
        <div class="row justify-content-end mb-3">
            <div class="col-auto">
                <a class="btn btn-success" href="/admin/product.php">Add New Product</a>
            </div>
        </div>
    </div>

    <?php

    if (count($productList) > 0) {
    ?>
        <div class="container mb-5 pb-5">
            <?php foreach ($productList as $product) { ?>
                <div class="card mb-2">
                    <div class="row p-2 align-items-center">
                        <div class="col-sm-1">
                            <?= $product->getId() ?>
                        </div>
                        <div class="col-md-1">
                            <?= $product->getName() ?>
                        </div>
                        
                        <div class="col-md-4">
                            <?= $product->getDescription() ?>
                        </div>
                        <div class="col-md-1">
                            <?= $product->getPrice() ?> .rs
                        </div>
                        <div class="col-md-1">
                            <?= $product->isTrending() ? "Trending" : "Normal" ?>
                        </div>
                        <div class="col-md-1">
                            <?= $product->isActive() ? "Active" : "Inactive" ?>
                        </div>
                        <div class="col-md-1">
                            <?= $product->getCategory() ?>
                        </div>

                        <div class="col-md-2">

                            <form class="d-inline-flex" action="/admin/product.php" method="GET">
                                <input type="hidden" name="product_id" value="<?= $product->getId() ?>">
                                <button type="submit" class="btn btn-warning ms-2">Edit</button>
                            </form>

                            <form class="d-inline-flex" method="POST">
                                <input type="hidden" name="product_id" value="<?= $product->getId() ?>">
                                <button type="submit" class="btn btn-danger ms-2">Delete</button>
                            </form>
                        </div>

                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    <?php
    } else { ?>
        <div class="container">
            <div class="alert alert-danger" role="alert">
                No Products Found
            </div>
        </div>

    <?php }
    ?>

    <?php require_once '../views/common/footer.php'; ?>
</body>

</html>