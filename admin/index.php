<?php
include '../controllers/admin/products.php';

// Instantiate the UserController
$controllerProducts = new ControllerProducts();
//create session if not needed
$controllerProducts->start_session();
//render index

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product_id"])) {
    $controllerProducts->deleteProduct($_POST["product_id"]);
}

$controllerProducts->render();

?>
