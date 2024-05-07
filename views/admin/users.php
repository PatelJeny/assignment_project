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

    if ($userList->num_rows > 0) {
    ?>
        <div class="container">
            <?php while ($user = $userList->fetch_assoc()) { ?>
                <div class="card mb-2">
                    <div class="row p-2">
                        <div class="col-sm-1">
                            <?= $user["id"] ?>
                        </div>
                        <div class="col-md-1">
                            <?= $user["name"] ?>
                        </div>
                        <div class="col-md-2">
                            <?= $user["phone"] ?>
                        </div>
                        <div class="col-md-2">
                            <?= $user["email"] ?>
                        </div>
                        <div class="col-md-1">
                            <?= $user["is_admin"] == true ? "Admin" : "Standard" ?>
                        </div>
                        <div class="col-md-3">
                            <?= $user["address"] ?>
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
                No Users Found
            </div>
        </div>

    <?php }
    ?>

    <?php require_once '../views/common/footer.php'; ?>
</body>

</html>