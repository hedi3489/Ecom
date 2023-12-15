<?php
include "Models/Product.php";
class ProductController {
    
    function route(){
        $action = (isset($_GET['action'])) ? $_GET['action'] : 'index';
        $product = new Product();
        $data = $product->$action();
        if($action=='addToCart'){
            $id = (isset($_GET['id'])) ? $_GET['id'] : 1;
            $action = 'home';
            $data = $product->$action();
        }else{
            $action = (isset($_GET['action'])) ? $_GET['action'] : 'index';
            $data = $product->$action();
        }
        $this->render($action, array($data));
    }

    function render($view, $data=[]){
        extract($data);
        include_once "Views/Product/$view.php";
    }
}
