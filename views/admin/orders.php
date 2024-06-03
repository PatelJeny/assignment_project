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

    <?php

    if ($orderList->num_rows > 0) { ?>
        <div class="container">
            <?php while ($order = $orderList->fetch_assoc()) { ?>
                <div class="card mb-2">
                    <div class="row p-2">
                        <div class="col-sm-1">
                            <?= $order["id"] ?>
                        </div>
                        <div class="col-md-2">
                            <?= $order["product_name"] ?>
                        </div>
                        <div class="col-md-1">
                            <?= $order["quantity"] ?>
                        </div>
                        <div class="col-md-2">
                            <?= $order["date"] ?>
                        </div>
                        <div class="col-md-1">
                            <?= $order["user_name"] ?>
                        </div>
                        <div class="col-md-2">
                            <?= $order["phone"] ?>
                        </div>
                        <div class="col-md-2">
                            <?= $order["address"] ?>
                        </div>
                       
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    <?php } else { ?>
        <div class="container">

            <div class="alert alert-danger" role="alert">
                No Orders Found
            </div>
        </div>

    <?php }
    ?>

    <?php require_once '../views/common/footer.php'; ?>
</body>

</html>