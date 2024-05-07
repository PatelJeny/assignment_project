<?php

require_once 'models/product.php';

require_once 'models/order.php';


class ControllerCheckOut
{

    //make session if does not exist
    public function start_session()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        //security mechanism to ask for login for admin only
        if (!isset($_SESSION['user_id']) || count($_SESSION['cart_products']) == 0) {
            header("Location:cart.php");
        }
    }

    //make session if does not exist
    public function getCartTotal()
    {


        $total = 0;
        foreach ($_SESSION['cart_products'] as $productId=>$quantity) {
            $product=Product::getProductById($productId);
            $total += $product->getPrice() * $quantity;
        }


        return $total;
    }

    //make session if does not exist
    public function confirmOrders($userId, $cartProducts)
    {
        foreach ($cartProducts as $productId=>$quantity) {
            Order::saveOrder($productId, $userId,$quantity);
        }
    }




    // Method to display the user list
    public function render($cartTotal, $name, $phone, $email, $address, $checkOutError)
    {
        $address = explode(",", $address);
        require_once 'views/checkout.php';
    }
}
