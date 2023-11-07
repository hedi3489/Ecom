<?php
class ProductController{
    include_once "Model/Product.php";

    function route(){
        $action = (isset($_GET['action'])) ? $_GET['action'] : 'index';
        $product = new Product();
        $data = $product->$action();
        $this->render($action, array($data));
    }

    function render($view, $data=[]){
        extract($data);
        include_once "View/Product/$view.php";
    }

}

?>