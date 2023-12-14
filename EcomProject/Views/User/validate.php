<?php
if(isset($_SESSION['cart'])!=true){
    $_SESSION['cart'] = array();
}
include_once "Views/Product/home.php";
?>