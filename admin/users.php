<?php
include '../controllers/admin/users.php';

// Instantiate the UserController
$controllerOrders = new Controllerusers();
//create session if not needed
$controllerOrders->start_session();
//render index
$controllerOrders->render($controllerOrders->prepareUsers());

?>
