<?php
include '../controllers/admin/orders.php';

// Instantiate the UserController
$controllerOrders = new ControllerOrders();
//create session if not needed
$controllerOrders->start_session();
//render index
$controllerOrders->render($controllerOrders->prepareOrders());

?>
