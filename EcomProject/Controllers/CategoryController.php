<?php
class CategoryController {
    public static function listProductsInCategory() {
        $categoryId = $_GET['category_id'];
        $products = ProductModel::getProductsInCategory($categoryId);
        include 'views/main.php';
    }
}
