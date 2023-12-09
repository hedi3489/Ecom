<?php
include_once "Models/User.php";
class UserController {
   
    function route(){
        $action = (isset($_GET['action'])) ? $_GET['action'] : 'index';
        $user = new User();
        if($action=='login'){
            $data = "";
        }else{ 
            $data = $user->$action();
            if($action=='validate'){
                $action = ($data==null) ? 'login' : 'main';
            }
        }
        $this->render($action, array($data));
    }

    function render($view, $data=[]){
        extract($data);
        include_once "Views/User/$view.php";
    }
    
}
