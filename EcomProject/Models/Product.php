<?php
require_once "mysqldatabase.php";
include_once "Views/session.php";
class Product {
    private $productId;
    private $sellerId;
    private $seller;
    private $name;
    private $category;
    private $price;
    private $quantity;

    public function __construct($id = -1) {
        global $conn;
        if ($id < 0) {
            $this->productId = 0;
            $this->sellerId = 0;
            $this->name = "";
            $this->category = 0;
            $this->price = 0.0;
            $this->quantity = 0;
        } else {
            //$id = $conn->real_escape_string($id);
            $sql = "SELECT * FROM `product` WHERE `ProductId`='$id';";
            $res = $conn->query($sql);
            while ($row = $res->fetch_assoc()) {
                $this->productId = $id;
                $this->sellerId = $row['SellerId'];
                $this->seller = $this->getSeller($this->sellerId);
                $this->name = $row['Name'];
                $this->price = $row['Price'];
                $this->quantity = $row['Quantity'];
                $this->category = $this->getCategories($id);
            }
        }
    }

    public function view(){
        //var_dump($_GET);
        $product = new Product($_GET['id']);
        return $product;
    }
    public function home(){
        Product::listProducts();
    }
    public function about(){
        
    }
    public function checkout(){
        $product = new Product($_GET['id']);
        return $product;
    }
    public static function listProducts() {
        global $conn;
        $list = array();
        $sql = "SELECT * FROM `product` ORDER BY `product`.`ProductId` DESC";
        $res = $conn->query($sql);
        while ($row = $res->fetch_assoc()) {
            $product = new Product();
            $product->productId = $row['ProductId'];
            $product->sellerId = $row['SellerId'];
            $product->name = $row['Name'];
            $product->price = $row['Price'];
            $product->quantity = $row['Quantity'];
            $product->category = $product->getCategories($product->productId);

            array_push($list, $product);
        }
        return $list;
    }

    public static function listSellerProducts(){
        global $conn;
        $id = $_SESSION['userid'];
        $list = array();
        $sql = "SELECT * FROM `product` WHERE `SellerId`=$id ORDER BY `product`.`ProductId` DESC";
        $res = $conn->query($sql);
        while ($row = $res->fetch_assoc()) {
            $product = new Product();
            $product->productId = $row['ProductId'];
            $product->sellerId = $row['SellerId'];
            $product->name = $row['Name'];
            $product->price = $row['Price'];
            $product->quantity = $row['Quantity'];
            $product->category = $product->getCategories($product->productId);

            array_push($list, $product);
        }
        return $list;
    }

    public function update($post) {
        global $conn;
        $productId = $this->productId;

        $sellerId = $conn->real_escape_string($post['SellerId']);
        $name = $conn->real_escape_string($post['Name']);
        $category = $conn->real_escape_string($post['Category']);
        $price = $conn->real_escape_string($post['Price']);
        $quantity = $conn->real_escape_string($post['Quantity']);
        $sql = "UPDATE `product` SET `SellerId` = '$sellerId', `Name` = '$name', `Category` = '$category', `Price` = '$price', `Quantity` = '$quantity' WHERE `ProductId` = '$productId'";
        $conn->query($sql);
    }

    public function getProductId(){
        return $this->productId;
    }
    public function setProductId(){
    }
    public function getSeller($id=null){
        $seller = null;
        if($id==null){
            return $this->seller;
        }else{
            global $conn;
            include_once "Models/User.php";
            $seller = new User($id);   
        }
        return $seller;
    }
    public function setSellerId(){
    }
    public function getName(){
        return $this->name;
    }
    public function setName(){
    }
    public function getCategories($id=null){
        $categories = "Categories: ";
        if($id==null){
            $categories = $this->category;
        }else{
            global $conn;
            $sql = "SELECT c.Name FROM product p JOIN `product-category` pc ON p.productId = pc.productId JOIN category c ON pc.categoryId = c.categoryId WHERE p.productId = '$id'";
            $res = $conn->query($sql);
            while ($row = $res->fetch_assoc()){
                $categories .= $row['Name'] . " ";
            }
        }
        return $categories;
    }
    public function setCategories(){
    }
    public function getPrice(){
        $formatPrice = 0.0;
        if (strpos($this->price, '.')) {
            $formatPrice = "$" . $this->price;
        }else{
            $formatPrice = "$" . $this->price .".00";
        }
        return $formatPrice; 
    }
    public function setPrice(){   
    }
    public function getQuantity(){
        return $this->quantity;
    }
    public function setQuantity(){  
    }
    public function getImagePath(){
        global $conn;
        $path = "";
        $sql = "SELECT `Path` FROM `images` WHERE `ProductId` = '$this->productId';";
        $res = $conn->query($sql);
        while ($row = $res->fetch_assoc()){
            $path = $row['Path'];
        }
        return "Images/$path";
    }

}
?>
