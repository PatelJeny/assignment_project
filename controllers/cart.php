<?php

require_once 'models/product.php';
require_once 'models/category.php';


class ControllerCart
{

    //make session if does not exist
    public function start_session()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        //security mechanism to ask for login for admin only
        if (!isset($_SESSION['user_id'])) {
            header("Location:login.php");
        }
    }

   

    //get cart detaisl and pricing
    public function increaseQuantity($productId)
    {
        $_SESSION['cart_products'][$_POST["product_id"]] = $_SESSION['cart_products'][$_POST["product_id"]]+1;
    }

     //get cart detaisl and pricing
     public function decreaseQuantity($productId)
     {
        if($_SESSION['cart_products'][$_POST["product_id"]]>1){
            $_SESSION['cart_products'][$_POST["product_id"]] = $_SESSION['cart_products'][$_POST["product_id"]]-1;
        }
        else{
            unset($_SESSION['cart_products'][$_POST["product_id"]]); 
        }

     }

    // Method to display the user list
    public function render()
    {
        $categoryList = Category::getAllCategories();

        require_once 'views/cart.php';
    }
}
