<?php
include 'controllers/checkout.php';
// Instantiate the UserController
$controllerCheckout = new ControllerCheckOut();
//create session if not needed
$controllerCheckout->start_session();

$checkOutError=null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {

    if(isset($_POST["pay_online"]) && isset($_POST["card"]) && isset($_POST["cvv"])){
        $checkOutError=($_POST["card"]==="4321543265432765" && $_POST["cvv"]==="123")?false:true;
    }

    if(isset($_POST["pay_cod"]) ){
        $checkOutError=false;
    }

    if($checkOutError===false){
        //insert the order as well
        $controllerCheckout->confirmOrders($_SESSION['user_id'],$_SESSION['cart_products']);
        //empty session and cart
        $_SESSION['cart_products'] = [];
        
    }
}

//render view
$controllerCheckout->render($controllerCheckout->getCartTotal(), $_SESSION['user_name'], $_SESSION['user_phone'], $_SESSION['user_email'], $_SESSION['user_address'],$checkOutError);
?>
