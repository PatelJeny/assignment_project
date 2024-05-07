<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../views/common/bootstrap.php'; ?>
    <title>Categories</title>
</head>

<body>
    <?php require_once '../views/common/header_admin.php'; ?>

    <?php require_once '../views/common/admin_section.php'; ?>

    <div class="container">
        <div class="row justify-content-end mb-3">
            <div class="col-auto">
                <form class="card p-2" method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" name="category" class="form-control" id="inputCategory" placeholder="Electronics">
                        <label for="inputCategory">Category</label>
                    </div>
                    <button name="add" class="btn btn-success mb-3">Add New Category</button>
                    <?php
                    if ($operationStatus === true) { ?>
                        <div class="alert alert-success" role="alert">
                            Added !
                        </div>

                    <?php } ?>
                </form>

            </div>
        </div>
    </div>

    <?php

    if (count($categoryList) > 0) {
    ?>
        <div class="container">
            <div class="row">
                <?php foreach ($categoryList as $category) { ?>
                    <div class="card mb-2 p-4 col-auto m-2">
                        <form method="POST">
                            <?= $category->name ?>
                            <input type="hidden" name="category" value="<?= $category->name ?>">
                            <button type="submit" name="delete" class="btn btn-danger ms-2">Delete</button>
                        </form>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>
    <?php
    } else { ?>
        <div class="container">
            <div class="alert alert-danger" role="alert">
                No Categories Found
            </div>
        </div>

    <?php }
    ?>

    <?php require_once '../views/common/footer.php'; ?>
</body>

</html>