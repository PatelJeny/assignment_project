<?php
include '../controllers/admin/categories.php';

// Instantiate the UserController
$controllerCategories = new ControllerCategories();
//create session if not needed
$controllerCategories->start_session();

$operationStatus = null;

//render index
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if(isset($_POST["add"]) && isset($_POST["category"])){
        $controllerCategories->createCategory($_POST["category"]);
        $operationStatus=true;
    }

    if(isset($_POST["delete"]) && isset($_POST["category"])){
        $controllerCategories->deleteCategory($_POST["category"]);
    }


}

$controllerCategories->render($operationStatus);

?>
