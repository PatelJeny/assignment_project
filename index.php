<?php
include 'controllers/products.php';

// Instantiate the UserController
$controllerHome = new ControllerProducts();
//create session if not needed
$controllerHome->start_session();

$controllerHome->checkProductCategories();


$productAdded=null;

//product added to session
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id']) ) {

    if(isset($_SESSION["cart_products"])){

        if (!isset($_SESSION['cart_products'][$_POST['product_id']])) {
            // Add the new member to the array with default qty 1
            $_SESSION['cart_products'][$_POST['product_id']]=1;
            $productAdded=true;
        } else {
            $productAdded=false;
        }
    }
    else{
        //ask user to login
        header("Location:login.php");
    }

    
}

//render index
$controllerHome->render(isset($_GET['category'])?$_GET['category']:null);

?>
