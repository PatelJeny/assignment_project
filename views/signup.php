<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'views/common/bootstrap.php'; ?>
    <title>Signup</title>
</head>

<body>
    <?php require_once 'views/common/header.php'; ?>

    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="display-6 fw-bold">Let's Signup</h1>
                <p class="fs-6">Welcome to the Super Mart community! By signing up for an account,
                     you'll gain access to a world of exclusive perks and personalized shopping experiences.
                      Join us today and enjoy the following benefits</p>
            </div>
            <div class="col-md-6 ">

                <div class="h-100 p-5 bg-body-tertiary border shadow-sm rounded-1">
                    <h2 class="mb-3">Signup Here</h2>
                    <form class="login-form" method="post" action="signup.php">
                        <div class="form-floating mb-3">
                            <input name="name" type="text" class="form-control" id="inputName" placeholder="Jhon Doe" required>
                            <label for="inputName">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="phone"  type="tel"  class="form-control" id="inputPhone" placeholder="9988776655"  required minlength="10" maxlength="10">
                            <label for="inputPhone">Phone Number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="email" type="email" class="form-control" id="inputEmail" placeholder="name@example.com" required>
                            <label for="inputEmail">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password" required>
                            <label for="inputPassword">Password</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea  name="address" type="address" class="form-control" placeholder="Address" id="inputAddress" style="height: 88px" required></textarea>
                            <label for="inputAddress">Address</label>
                        </div>


                        <button class="btn btn-outline-primary" type="submit">Create Account</button>

                        <?php

                        if ($signupUser !== null) {
                        ?>
                            <div class="alert alert-danger mt-2" role="alert">
                                Failed To Create Account
                            </div>
                        <?php
                        }
                        ?>

                    </form>


                </div>
            </div>
        </div>

    </div>


    </div>




    <?php require_once 'views/common/footer.php'; ?>
</body>

</html>