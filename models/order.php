<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/utils/db.php');



class Order
{
    public $id;
    public $productId;
    public $date;
    public $userId;
    public $quantity;

   
    public function __construct($id, $productId, $date, $userId,$quantity)
    {
        $this->id = $id;
        $this->productId = $productId;
        $this->date = $date;
        $this->userId = $userId;
        $this->quantity = $quantity;

    }

     // Getter methods
     public function getId() {
        return $this->id;
    }


    // Getter methods
    public function getProductId() {
        return $this->productId;
    }

    // Getter methods
    public function getDate() {
        return $this->date;
    }

    // Getter methods
    public function getUserId() {
        return $this->userId;
    }

    // Getter methods
    public function getQuantity() {
        return $this->quantity;
    }

    //add order to database
    public static function saveOrder($productId,$userId,$quantity){
        executeQuery("INSERT INTO orders(product_id, user_id,quantity) VALUES ('$productId', '$userId',$quantity)");
    }

    //add order to database
    public static function getAllOrders(){
        return executeQuery("SELECT orders.id,orders.product_id,orders.date,orders.quantity,orders.user_id,users.name AS user_name,users.phone,users.address,products.name AS product_name FROM orders INNER JOIN users ON orders.user_id = users.id INNER JOIN products ON orders.product_id = products.id order by orders.date DESC");
    }


}

