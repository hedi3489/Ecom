
<?php
require_once "mysqldatabase.php";

class User {
    private $userid;
    private $username;
    private $email;
    private $password;
    private $address;
    private $phone;

    public function __construct($id = -1) {
        global $conn; 
        if ($id<0) {
            // CREATING NEW USER
            $this->userid = -1;
            $this->username = "";
            $this->email = "";
            $this->password = "";
            $this->address = "";
            $this->phone = "";
        } else {
            // RETRIEVING EXISTING USER
            $id = $conn->real_escape_string($id);
            $sql = "SELECT * FROM `users` WHERE `UserId`='$id';";
            $res = $conn->query($sql);
            $assoc_user = $res->fetch_assoc();
            if ($assoc_user) {
                $this->userid = $id;
                $this->username = $assoc_user['Username'];
                $this->email = $assoc_user['Email'];
                $this->password = $assoc_user['Password'];
                $this->address = $assoc_user['Address'];
                $this->phone = $assoc_user['Phone'];
            }
        }
    }

    public static function listUsers() {
        global $conn;
        $list = array();
        $sql = "SELECT * FROM `users`";
        $res = $conn->query($sql);
        while ($row = $res->fetch_assoc()) {
            $user = new User();
            $user->userid = $row['UserId'];
            $user->username = $row['Username'];
            $user->email = $row['Email'];
            $user->password = $row['Password'];
            $user->address = $row['Address'];
            $user->phone = $row['Phone'];

            array_push($list, $user);
        }
        return $list;
    }

    public function update($post) {
        global $conn;
        $userId = $this->userid;

        $username = $conn->real_escape_string($post['Username']);
        $email = $conn->real_escape_string($post['Email']);
        $password = $conn->real_escape_string($post['Password']);
        $address = $conn->real_escape_string($post['Address']);
        $phone = $conn->real_escape_string($post['Phone']);

        $sql = "UPDATE `users` SET `Username` = '$username', 
        `Email` = '$email', `Password` = '$password', 
        `Address` = '$address', `Phone` = '$phone' 
        WHERE `UserId` = '$userId'";
        $conn->query($sql);
    }

    public function index(){   
    }

    public function main(){
        include_once "Views/User/main.php";
    }

    public function validate() {
        global $conn;
        var_dump($_POST);
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM `users` WHERE `Username`='$username' AND 'Password'='$password';";
        $result = $conn->query($sql);
        var_dump($result);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = new User();
                $user->userid = $row['UserId'];
                $user->username = $row['Username'];
                $user->email = $row['Email'];
                $user->password = $row['Password'];
                $user->address = $row['Address'];
                $user->phone = $row['Phone'];
            }
            setcookie($username, time() + 86400, "/");
            return $user;
        }else{
            return -1;
        }
    }
    
    public function setUserRights(){
        // ADD USER (ID) TO THE USER-RIGHTS TABLE
    }

    public function getUserRights(){
        // GET RIGHTS FROM USER-RIGHTS TABLE
    }
}
?>