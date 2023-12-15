<?php
include_once "Models/User.php";
class UserController {
   
    function route(){
        $action = (isset($_GET['action'])) ? $_GET['action'] : 'index';
        $user = new User();
        $data = $user->$action();
        $action = ($action=='validate' || $action=='register') ? 'home' : $action;
        $this->render($action, array($data));
    }

    function render($view, $data=[]){
        extract($data);
        $folder = ($view=='home')? 'Product' : 'User';
        include_once "Views/$folder/$view.php";    
    }
    
}
