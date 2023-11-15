<?php
include_once "Models/User.php";
class UserController {
   
    function route(){
        $action = (isset($_GET['action'])) ? $_GET['action'] : 'index';
        $user = new User();
        $data = $user->$action();
        $this->render($action, array($data));
    }

    function render($view, $data=[]){
        extract($data);
        include_once "Views/User/$view.php";
    }
    
}
