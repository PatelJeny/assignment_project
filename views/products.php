<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once('views/common/bootstrap.php'); ?>
    <title>Home</title>
    <link rel="stylesheet" href="../css/cart.css">
</head>

<body>
    <?php include_once('views/common/header.php'); ?>


    <div class="container py-3 mb-1">
        <h1 class="display-6 fw-bold">Welcome to Super Mart</h1>
        <p class="col-md-8 fs-6">At Super Mart, we're thrilled to welcome you to our digital storefront,
             where every click leads to a world of endless possibilities. Whether you're seeking the latest fashion 
             trends, cutting-edge electronics, stylish home decor, or unique gifts for loved ones, you've come to
              the right place.</p>

        <?php
        if ($productAdded === true) { 
            
            //add a product with default quantity 1
            
            
            ?>

            <div class="alert alert-success" role="alert">
                Product Added To Cart  <a href="/cart.php">My Cart</a>
            </div>


        <?php }

        if ($productAdded === false) { ?>

            <div class="alert alert-secondary" role="alert">
                Product Already Exist In Cart
            </div>

        <?php
        }
        ?>
    </div>




    <div class="container ">
        <?php
        if (count($categoryProducts) > 0) { ?>
            <p class="fs-4 fw-bold"><?= $selectedCategory ?></p>
            <div class="row mb-5">

                <?php
                foreach ($categoryProducts as $product) { ?>

                    <div class="col-md-3 p-3">
                        <div class="card shadow-sm fixed-cart">
                            <img src="img/product/<?= $product->getImage() ?>" class="card-img-top" alt="Product" height="156">
                            <div class="card-body">
                                <h5 class="card-title"><?= $product->getName() ?></h5>
                                <p class="card-text"><?= $product->getDescription() ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <form method="POST">
                                        <input name="product_id" type="hidden" value="<?= $product->getId()  ?>" />
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Add to Cart</button>
                                    </form>
                                    <small class="text-muted">&#8377;<?= $product->getPrice() ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }

                ?>

            </div>
            <hr>
        <?php
        }
        if (count($trendingProducts) > 0) { ?>
            <p class="fs-4 fw-bold">Trending Products</p>
            <div class="row mb-5">

                <?php
                foreach ($trendingProducts as $product) { ?>

                    <div class="col-md-3 p-3">
                        <div class="card shadow-sm fixed-cart ">
                            <img src="img/product/<?= $product->getImage() ?>" class="card-img-top" alt="Product" height="156">
                            <div class="card-body">
                                <h5 class="card-title"><?= $product->getName() ?></h5>
                                <p class="card-text"><?= $product->getDescription() ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <form method="POST">
                                        <input name="product_id" type="hidden" value="<?= $product->getId()  ?>" />
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Add to Cart</button>
                                    </form>
                                    <small class="text-muted">&#8377;<?= $product->getPrice() ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }

                ?>

            </div>
            <hr>
        <?php
        }
        if (count($allProducts) > 0) {
        ?>

            <p class="fs-4 fw-bold">All Products</p>
            <div class="row mb-5 pb-5">

                <?php
                foreach ($allProducts as $product) { ?>

                    <div class="col-md-3 p-3">
                        <div class="card shadow-sm ">
                            <img src="img/product/<?= $product->getImage() ?>" class="card-img-top" alt="Product" height="156">
                            <div class="card-body">
                                <h5 class="card-title"><?= $product->getName() ?></h5>
                                <p class="card-text"><?= $product->getDescription() ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <form method="POST">
                                        <input name="product_id" type="hidden" value="<?= $product->getId()  ?>" />
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Add to Cart</button>
                                    </form>
                                    <small class="text-muted">&#8377;<?= $product->getPrice() ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }

                ?>

            </div>

        <?php } ?>
    </div>


    <?php include_once('views/common/footer.php'); ?>
</body>

</html>