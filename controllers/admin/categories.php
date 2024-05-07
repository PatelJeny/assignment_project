<?php

include '../models/category.php';

class ControllerCategories {

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
    public function deleteCategory($categoryName) {
        $category = new Category($categoryName);
        $category->delete();
    }

     // Method to display the user list
     public function createCategory($categoryName) {
        $category = new Category(strtolower($categoryName));
        $category->create();
    }

    // Method to display the user list
    public function render($operationStatus) {
        $sectionName="Product Categories";
        $categoryList= Category::getAllCategories();
        require_once '../views/admin/categories.php';
    }

}


?>