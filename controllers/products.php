<?php

require_once 'models/product.php';
require_once 'models/category.php';


class ControllerProducts
{

    //make session if does not exist
    public function start_session()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function checkProductCategories()
    {
        //prepare a default category
        if (count(Category::getAllCategories()) == 0) {
            $category = new Category("general");
            $category->create();
        }
    }

    // Method to display the user list
    public function render($selectedCategory)
    {

        global $productAdded;

        $trendingProducts = Product::getTrendingProducts();
        $allProducts = Product::getAllProducts();
        $categoryProducts = Product::getProductsByCategory($selectedCategory);
        $categoryList = Category::getAllCategories();

        require_once 'views/products.php';
    }
}
