<?php
require_once(__DIR__ . '/../utils/db.php');


class Category
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }



    //add order to database
    public function create()
    {
        executeQuery("INSERT IGNORE INTO categories(name) VALUES ('$this->name')");
    }

    //add order to database
    public function delete()
    {
        executeQuery("Delete From categories WHERE name='$this->name'");
    }

    //add order to database
    public static function getAllCategories()
    {

        $categories = array();

        $categoriesResult = executeQuery("SELECT * from categories");
        if ($categoriesResult) {
            while ($row = $categoriesResult->fetch_assoc()) {
                $category = new Category($row['name']);
                $categories[] = $category;
            }
            $categoriesResult->free();
        }

        return $categories;
    }
}
