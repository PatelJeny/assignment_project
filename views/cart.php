<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'views/common/bootstrap.php'; ?>
    <title>Home</title>
</head>

<body>
    <?php require_once 'views/common/header.php'; ?>


    <div class="container pb-5 mb-5">
        <h1 class="display-6 fw-bold">Your Cart (<?= count($_SESSION['cart_products']) ?>)</h1>
        <p class="fs-6">It functions as a virtual container where users can add, remove, and modify products before
             proceeding to checkout. Typically, when users browse a website and find items they want to buy, they can add them to their shopping cart by clicking on an "Add to Cart" button next to each product.</p><br><br>




        <?php if (count($_SESSION['cart_products']) > 0) {

            $total = 0;
            foreach ($_SESSION['cart_products'] as $productId=>$quantity) {
                $product=Product::getProductById($productId);
                $total += $product->getPrice() * $quantity;
            }

        ?>

            <div class="row justify-content-end mb-3">
                <div class="col-auto">
                    <a class="btn btn-success" href="/checkout.php">Proceed Checkout - <?= $total ?> rs</a>
                </div>
            </div>

            <?php foreach ($_SESSION['cart_products'] as $productId=>$quantity) {
                $product=Product::getProductById($productId);
                ?>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-2">
                            <img src="img/product/<?= $product->getImage() ?>" width="100%" height="100%" class="img-fluid rounded-start" alt="product">
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <h5 class="card-title"><?= $product->getName() ?></h5>
                                <p class="card-text"><small class="text-muted">&#8377;<?= $product->getPrice() ?></small></p>
                                <form method="POST">
                                    <input name="product_id" type="hidden" value="<?= $product->getId() ?>" />
                                    <div class="input-group mb-3">
                                        <button name="qty_increase" class="btn btn-success" type="submit">+</button>
                                        <input style="max-width: 98px;" value="<?= $quantity ?>" readonly type="text" class="form-control" placeholder="Quantity" aria-label="Quantity" >
                                        <button name="qty_decrease" class="btn btn-danger" type="submit">-</button>
                                    </div>
                                    <button name="delete" type="submit" class="btn btn-danger">Remove</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        } else { ?>
            <div class="alert alert-secondary" role="alert">
                No Items In Cart, Start Adding <a href="/index.php">Products</a>
            </div>
        <?php
        } ?>
    </div>
    <?php require_once 'views/common/footer.php'; ?>
</body>

</html>