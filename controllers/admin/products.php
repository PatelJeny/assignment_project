<?php

include '../models/product.php';

class ControllerProducts {

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

     // Method to display the user list
    public function deleteProduct($productId) {
       
        Product::deleteProductById($productId);
    }

    // Method to display the user list
    public function render() {
        $sectionName="Products";
        $productList= Product::getAllProducts(true);
        require_once '../views/admin/products.php';
    }

}


?>