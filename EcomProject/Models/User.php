
<?php
require_once "mysqldatabase.php";

class User {
    public $userid;
    public $username;
    public $email;
    public $password;
    public $phone;

    public function __construct($id=-1) {
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

    public function index(){
        echo "";
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

    public function register(){
        global $conn;
        $sql = "";
        $name = $_POST['username'];
        $pass = $_POST['password'];
        $method = $_POST['method'];
        if(is_numeric($_POST['method'])){
            $sql = "INSERT INTO `users`(`UserId`, `Username`, `Email`, `Password`, `Phone`) VALUES ('NULL','$name','NULL','$pass','$method')";
        }else{
            $sql = "INSERT INTO `users`(`UserId`, `Username`, `Email`, `Password`, `Phone`) VALUES ('NULL','$name','$method','$pass','NULL')";
        }
        $user = $conn->query($sql);
        include_once "Views/User/main.php";
        return "";
    }

    public function validate() {
        global $conn;
        $sql = "SELECT * FROM `users` WHERE `Username` = ? AND `Password` = ?";
        $stmt = $conn->prepare($sql);
        $name = $_POST['username'];
        $pass = $_POST['password'];
        $stmt->bind_param("ss", $name, $pass);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = new User();
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                $user->userid = $row['UserId'];
                $user->username = $row['Username'];
                $user->email = $row['Email'];
                $user->password = $row['Password'];
                $user->phone = $row['Phone'];
            }
            return $user;
        }
    }

    public function getId(){
        return $this->userid;
    }
    public function setId(){
        
    }
    public function getUsername(){
        return $this->username;
    }
    public function setUsername(){
        
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail(){
        
    }
    public function getPhone(){
        return $this->phone;
    }
    public function setPhone(){
        
    } 
    public function getAddress(){
        return $this->address;
    }
    public function setAddress(){
        
    } 
    public function getPassword(){
        return $this->password;
    }
    public function setPassword(){
        
    }    

    public function setUserRights(){
        // ADD USER (ID) TO THE USER-RIGHTS TABLE
    }

    public function getUserRights(){
        // GET RIGHTS FROM USER-RIGHTS TABLE
    }
}
?>