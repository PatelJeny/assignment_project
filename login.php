<?php

include 'controllers/login.php';

// Instantiate the UserController
$controllerLogin = new ControllerLogin();
//create session if not needed
$controllerLogin->start_session();
//render login

$loggedInUser=null;

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $loggedInUser = $controllerLogin->checkAuth($_POST["email"], md5($_POST["password"]));
    if($loggedInUser){
        //set into session
        $_SESSION['user_id'] = $loggedInUser->id;
        $_SESSION['user_name'] = $loggedInUser->name;
        $_SESSION['user_phone'] = $loggedInUser->phone;
        $_SESSION['user_email'] = $loggedInUser->email;
        $_SESSION['user_password'] = $loggedInUser->password;
        $_SESSION['user_is_admin'] = $loggedInUser->is_admin;
        $_SESSION['user_address'] = $loggedInUser->address;
        $_SESSION['cart_products'] = [];
        header('Location:index.php');
    }else{
        $loggedInUser=false;
    }
}

$controllerLogin->render();
