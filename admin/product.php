<?php
include '../controllers/admin/product.php';
// Instantiate the UserController
$controllerProduct = new ControllerProduct();
//create session if not needed
$controllerProduct->start_session();
//operation status
$operationStatus = null;



if (
    $_SERVER["REQUEST_METHOD"] == "POST"
    && isset($_POST["name"])
    && isset($_POST["description"])
    && isset($_POST["price"])
    && isset($_POST["category"])
) {

    global $operationStatus;

    if (isset($_GET["product_id"])) {
        //update the product
        $controllerProduct->updateProduct($_GET["product_id"], $_POST["name"], $controllerProduct->saveProductImage(), $_POST["description"], $_POST["price"], isset($_POST["active"]) ? 1 : 0, isset($_POST["trending"]) ? 1 : 0,$_POST["category"]);
    } else {
        //new product
        $controllerProduct->createProduct($_POST["name"], $controllerProduct->saveProductImage(), $_POST["description"], $_POST["price"], isset($_POST["active"]) ? 1 : 0, isset($_POST["trending"]) ? 1 : 0,$_POST["category"]);
    }
    //saved
    $operationStatus = true;
}


//render product form
$controllerProduct->render($operationStatus, isset($_GET["product_id"]) ? $_GET["product_id"] : null);
