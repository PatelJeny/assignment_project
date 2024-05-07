<?php

include '../models/order.php';

class ControllerOrders {

    //make session if does not exist
    public function start_session(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        //security mechanism to ask for login for admin only
        if(!isset($_SESSION['user_id']) || !$_SESSION['user_is_admin']){
            header("Location:/login.php");
        }
    }

    public function prepareOrders(){
        return Order::getAllOrders();
    }

    // Method to display the user list
    public function render($orderList) {
        $sectionName="Orders";
        require_once '../views/admin/orders.php';
    }

}


?>