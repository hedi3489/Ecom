<?php
include_once "mysqldatabase.php";

Class User{
    private $userid;
    private $username;
    private $email;
    private $password;
    private $address;
    private $phone;

    public function __construct($id=-1){
        if($id<0){
            //CREATING NEW USER
            $this->userid = -1;
            $this->username = "";
            $this->email = "";
            $this->password = "";
            $this->address = "";
            $this->phone = "";
        }else{
            //RETRIEVING REGISTERED USER
            $sql = "SELECT * FROM `users` WHERE `UserId`='"$id"';";
            $res = $conn->query($sql);
            $assoc_user = $res->fetch_assoc();
            
            $this->userid = $id;
            $this->username = $assoc_user['Username'];
            $this->email = $assoc_user['Email'];
            $this->password = $assoc_user['Password'];
            $this->address = $assoc_user['Address'];
            $this->phone = $assoc_user['Phone'];
        }
    }

    public static function listUsers(){
        global $conn;
        $list = array();
        $sql = "SELECT * FROM `users`";
        $res = $conn->query($sql);
        while($row = $res->fetch_assoc()){
            $user = new User();
            $user->userid = $row['UserId'];;
            $user->username = $row['Username'];
            $user->email = $row['Email'];
            $user->password = $row['Password'];
            $user->address = $row['Address'];
            $user->phone = $row['Phone'];

            array_push($list,$user);
        }
        return $list;
    }

    function update($post){
        global $conn;
        $sql = "UPDATE `products` SET `Username` = '".$post['Username']
        ."', `Email` = '".$post['Email']
        ."', `Password` = '".$post['Password']
        ."', `Address` = '".$post['Address']
        ."', `Phone` = '".$post['Phone']."' WHERE `products`.`UserId` = '".$post['UserId']."';";
        $conn->query($sql);
    }
}



?>