<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once('views/common/bootstrap.php'); ?>
    <title>Checkout</title>
</head>

<body>
    <?php include_once('views/common/header.php'); ?>


    <div class="container py-3">
        <h1 class="display-6 fw-bold">Let's Finalize Your Order</h1>
        <p class="col-md-8 fs-6 mb-3">The process in a retail environment where a customer completes their transaction by paying for the items they have selected.The customer enters their payment details, such as credit card number, expiration date, CVV (Card Verification Value), and billing address.</p>

        <div class="row">

            <div class="card col-md-4">
                <div class="card-body">
                    <h5 class="card-title">Delivery Information</h5>
                    <p class="card-text">
                    <address>
                        <strong>Name - <?= $name ?></strong><br>
                        <?php
                        foreach ($address as $addressLine) { ?>
                            <?= $addressLine ?><br>
                        <?php }
                        ?>
                        <abbr title="Phone">contact :</abbr> <?= $phone ?>
                    </address>

                    <strong>Email - <?= $email ?></strong><br>
                    <a href="mailto:<?= $email ?>"><?= $email ?></a>

                    </p>
                </div>
            </div>

            <?php if ($checkOutError === null) { ?>

                <div class="card col-md-6 ms-4 ">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Payment Process For <?= $cartTotal ?> .rs</h5>


                        <button class="btn btn-primary " type="button" data-bs-toggle="collapse" data-bs-target="#areaPayOnline" aria-expanded="false" aria-controls="areaPayOnline">Pay Online</button>
                        <form method="POST" class="collapse multi-collapse mt-3" id="areaPayOnline">
                            <img src="img/site/card_companies.png" class='mb-3' height="28px" alt="cards" />
                            <div class="form-floating mb-3">
                                <input type="int" name="card" class="form-control" autocomplete="off"  id="inputCard" placeholder="4321 5432 6543 2765" required>
                                <label for="inputCard">Credit Card Number</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="cvv" class="form-control" id="inputCVV" placeholder="123" required>
                                <label for="inputCVV">CVV</label>
                            </div>
                            <button type="submit" name="pay_online" class="btn btn-success">Pay Via Credit Card</button>
                        </form>
                        <hr>
                        <form method="POST">
                            <button class="btn btn-secondary" name="pay_cod" type="submit" >Cash On Delivery</button>
                        </form>










                    </div>
                </div>

            <?php  } ?>

            <?php
            if ($checkOutError === false) { ?>
                <div class="alert alert-success ms-4 col-md-4 align-self-start" role="alert">
                    Order Has Been Confirmed, Confirmation Will be Sent ! <a href="/cart.php">Back To Cart</a>
                </div>

            <?php }

            ?>


            <?php
            if ($checkOutError === true) { ?>

                <div class="alert alert-danger ms-4 col-md-4 align-self-start" role="alert">
                    Invalid Payment Information, Please Enter Correct Details ! <a href="/checkout.php">Try Again</a>
                </div>


            <?php }

            ?>

        </div>






    </div>






    <?php include_once('views/common/footer.php'); ?>
</body>

</html>