<?php
include_once "Models/User.php";
class UserController {
   
    function route(){
        $action = (isset($_GET['action'])) ? $_GET['action'] : 'index';
        $user = new User(); 
        $data = "";
        if($action=='validate'){
            $data = $user->$action();
            $action = ($data==null) ? 'login' : 'main';
        }
        $this->render($action, array($data));
    }

    function render($view, $data=[]){
        extract($data);
        include_once "Views/User/$view.php";
    }
    
}
