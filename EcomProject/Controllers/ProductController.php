<?php
include "Models/Product.php";
class ProductController {
    
    function route(){
        $action = (isset($_GET['action'])) ? $_GET['action'] : 'index';
        $product = new Product();
        $data = $product->$action();
        $this->render($action, array($data));
    }

    function render($view, $data=[]){
        extract($data);
        include_once "Views/Product/$view.php";
    }
}
