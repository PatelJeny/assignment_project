<?php
include 'controllers/cart.php';

// Instantiate the UserController
$controllerCart = new ControllerCart();
//create session if not needed
$controllerCart->start_session();

//If ser is trying to perform anything
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if(isset($_POST["delete"]) && isset($_POST["product_id"])){
        //remove product from cart session
        unset($_SESSION['cart_products'][$_POST["product_id"]]); // Remove the element with the found key
    }

    if(isset($_POST["qty_increase"]) && isset($_POST["product_id"])){
       //increase quantity
       $cartProducts=$controllerCart->increaseQuantity($_POST["product_id"]);

    }

    if(isset($_POST["qty_decrease"]) && isset($_POST["product_id"])){
        //decrease quantity
        $cartProducts=$controllerCart->decreaseQuantity($_POST["product_id"]);
    }

}

//get all products info
//$cartProducts=$controllerCart->prepareCartDetails();
//render index
$controllerCart->render();

?>