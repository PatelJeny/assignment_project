<?php

require_once(__DIR__ . '/../utils/db.php');


class Product
{
    public $id;
    public $name;
    public $image;
    public $description;
    public $price;
    public $active;
    public $trending;
    public $category;


    public function __construct($id, $name, $image, $description, $price, $active, $trending, $category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
        $this->price = $price;
        $this->active = $active;
        $this->trending = $trending;
        $this->category = $category;
    }

   

    // Getter methods
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function isActive()
    {
        return $this->active;
    }

    public function isTrending()
    {
        return $this->trending;
    }



    public static function getAllProducts($ignoreActiveStatus = false)
    {
        $products = array();

        $productsResult = executeQuery("SELECT * FROM products " . ($ignoreActiveStatus ? null : "WHERE active=TRUE"));
        if ($productsResult) {
            while ($row = $productsResult->fetch_assoc()) {
                $product = new Product($row['id'], $row['name'], $row['image'], $row['description'], $row['price'], $row['active'], $row['trending'], $row['category']);
                $products[] = $product;
            }
            $productsResult->free();
        }

        return $products;
    }


    public static function getTrendingProducts($limit = 5)
    {
        $products = array();
        $productsResult = executeQuery("SELECT * FROM products WHERE trending=TRUE AND active=TRUE LIMIT $limit");
        if ($productsResult) {
            while ($row = $productsResult->fetch_assoc()) {
                $product = new Product($row['id'], $row['name'], $row['image'], $row['description'], $row['price'], $row['active'], $row['trending'], $row['category']);
                $products[] = $product;
            }
            $productsResult->free();
        }
        return $products;
    }

    //get a speicifc product
    public static function getProductsByCategory($category)
    {
        $products = array();
        if ($category !== null) {
            $productsResult = executeQuery("SELECT * FROM products where category='$category'");
            if ($productsResult) {
                while ($row = $productsResult->fetch_assoc()) {
                    $product = new Product($row['id'], $row['name'], $row['image'], $row['description'], $row['price'], $row['active'], $row['trending'], $row['category']);
                    $products[] = $product;
                }
                $productsResult->free();
            }
        }
        return $products;
    }


    //get a speicifc product
    public function create()
    {
        executeQuery("INSERT INTO products(name,image,description,price,active,trending,category) values('$this->name','$this->image','$this->description','$this->price','$this->active','$this->trending','$this->category')");
    }

    //update Product
    public function update()
    {
        executeQuery("UPDATE products SET name='$this->name',image='$this->image',description='$this->description',price='$this->price',active='$this->active',trending='$this->trending',category='$this->category' WHERE id='$this->id'");
    }

    //get a speicifc product
    public static function getProductById($productId)
    {
        $productsResult = executeQuery("SELECT * FROM products WHERE id='$productId'");
        $row = $productsResult->fetch_assoc();
        return new Product($row['id'], $row['name'], $row['image'], $row['description'], $row['price'], $row['active'], $row['trending'], $row['category']);
    }

    //get a speicifc product
    public static function deleteProductById($productId)
    {
        executeQuery("DELETE FROM products WHERE id='$productId'");
    }
}
