<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../views/common/bootstrap.php'; ?>
    <title>Product</title>
</head>

<body>
    <?php require_once '../views/common/header_admin.php'; ?>

    <?php require_once '../views/common/admin_section.php'; ?>

    <?php

    if ($operationStatus === true) { ?>
        <div class="container ">
            <div class="alert alert-success" role="alert">
                Product Saved Succesfully
            </div>
        </div>

    <?php
    }
    if ($operationStatus === false) { ?>
        <div class="container ">
            <div class="alert alert-danger" role="alert">
                Product Saved Failed ! Try with Different Image !
            </div>
        </div>
    <?php }
    ?>

    <div class="container mb-5 pb-5">
        <div class="card w-50">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <h5 class="card-title mb-3">New Product Details</h5>

                    <div class="form-floating mb-3">
                        <input value="<?= $editProduct !== null ? $editProduct->getName() : null ?>" name="name" type="text" class="form-control" id="inputName" placeholder="Product" required>
                        <label for="inputName">Product</label>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea name="description" class="form-control" placeholder="Description" id="inputDescription" style="height: 88px" required><?= $editProduct !== null ? $editProduct->getDescription() : null ?></textarea>
                        <label for="inputDescription">Description</label>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input name="price" value="<?= $editProduct !== null ? $editProduct->getPrice() : null ?>" type="number" class="form-control" id="inputPrice" placeholder="Price" required>
                                <label for="inputPrice">Price</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <select class="form-select" id="inputCategory" name="category" aria-label="Category">
                                    <?php
                                        foreach($categoryList as $category){?>
                                            <option <?= ($editProduct !== null && $category->name===$editProduct->getCategory())?"selected":null ?> value="<?= $category->name ?>"><?= $category->name ?></option>
                                        <?php }
                                    ?>
                                </select>
                                <label for="inputCategory">Category</label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-check form-switch">
                                <input name="active" class="form-check-input" aria-checked="false" type="checkbox" role="switch" id="inputActive" <?= $editProduct !== null ? ($editProduct->isActive() ? "checked" : null) : "checked" ?>>
                                <label class="form-check-label" for="inputActive">Active</label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-check">
                                <input name="trending" class="form-check-input" type="checkbox" id="inputTrending" <?= $editProduct !== null ? ($editProduct->isTrending() ? "checked" : null) : null ?>>
                                <label class="form-check-label" for="inputTrending">Trending</label>
                            </div>
                        </div>

                    </div>

                    <div class="input-group mb-3">
                        <input name="file" class="form-control" type="file" id="inputFile" <?= $editProduct === null ? "required" : null ?>>
                        <span class="input-group-text">Porduct Image</span>
                    </div>

                    <button type="submit" class="btn btn-success"><?= $editProduct === null ? "Add Product" : "Edit Product" ?></button>
                    <a class="ms-2 btn btn-primary" href="/admin/">Back</a>
                </form>
            </div>
        </div>
    </div>



    <?php require_once '../views/common/footer.php'; ?>

</body>

</html>