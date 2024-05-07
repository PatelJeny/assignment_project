<?php

include '../models/product.php';
include '../models/category.php';

class ControllerProduct
{

    //make session if does not exist
    public function start_session()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        //security mechanism to ask for login for admin only
        if (!isset($_SESSION['user_id']) || !$_SESSION['user_is_admin']) {
            header("Location:/login.php");
        }
    }
    
   

    // Method to Save New Product
    public function createProduct($name, $image, $description, $price, $active, $trending,$category)
    {
        $product = new Product(null, $name, $image, $description, $price, $active, $trending,$category);
        $product->create();
    }

    // Method to Update Product
    public function updateProduct($id,$name, $image, $description, $price, $active, $trending,$category)
    {
        $product = Product::getProductById($id);
        $product->name=$name;
        $product->image=$image?$image:$product->image;
        $product->description=$description;
        $product->price=$price;
        $product->active=$active;
        $product->trending=$trending;
        $product->category=$category;

        $product->update();
    }

    // Method to display the user list
    public function saveProductImage()
    {
        if (isset($_FILES["file"])) {
            //make a file name
            $image = time() . '.' . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/img/product/" . $image)){
                return $image;
            }
           
        }
        return false;
    }


    // Method to display the new product form
    public function render($operationStatus, $productId)
    {
        $sectionName = "Product";

        $categoryList= Category::getAllCategories();

        $editProduct = $productId !== null ? Product::getProductById($productId) : null;
        require_once '../views/admin/product.php';
    }
}
