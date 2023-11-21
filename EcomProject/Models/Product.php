<?php
require_once "mysqldatabase.php";

class Product {
    private $productId;
    private $sellerId;
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
            $id = $conn->real_escape_string($id);
            $sql = "SELECT * FROM `product` WHERE `ProductId`='$id';";
            $res = $conn->query($sql);
            $assoc_prod = $res->fetch_assoc();

            if ($assoc_prod) {
                $this->productId = $id;
                $this->sellerId = $assoc_prod['SellerId'];
                $this->name = $assoc_prod['Name'];
                $this->category = $assoc_prod['Category'];
                $this->price = $assoc_prod['Price'];
                $this->quantity = $assoc_prod['Quantity'];
            }
        }
    }

    public static function listProducts() {
        global $conn;
        $list = array();
        $sql = "SELECT * FROM `product`";
        $res = $conn->query($sql);
        while ($row = $res->fetch_assoc()) {
            $product = new Product();
            $product->productId = $row['ProductId'];
            $product->sellerId = $row['SellerId'];
            $product->name = $row['Name'];
            $product->price = $row['Price'];
            $product->quantity = $row['Quantity'];

            
            $product->category = $product->getCategory($product->productId);

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
    public static function showProductDetails() {
        // Fetch product details based on the product ID from the URL
        $productId = $_GET['ProductId'];
        //$product = Product::getProductDetails($productId);

        // Display the product details view
        include 'View/buy.php';
    }

    public static function createProductListing() {
        global $conn;
        $sellerId = $conn->real_escape_string($_POST['SellerId']);
        $name = $conn->real_escape_string($_POST['Name']);
        $price = $conn->real_escape_string($_POST['Price']);
        $category = $conn->real_escape_string($_POST['Category']);
        $quantity = $conn->real_escape_string($_POST['Quantity']);

        $sql = "INSERT INTO `product` (`SellerId`, `Name`, `Category`, `Price`, `Quantity`) 
                VALUES ('$sellerId', '$name', '$category', '$price', '$quantity')";
        $conn->query($sql);

    }

    public function getProductId(){
        return $this->productId;
    }
    public function setProductId(){
        
    }
    public function getSellerId(){
        return $this->sellerId;
    }
    public function setSellerId(){
        
    }
    public function getName(){
        return $this->name;
    }
    public function setName(){
        
    }
    public function getCategory($id=-1){
        if($id<0){
            return $this->category;
        }else{
            global $conn;
            $sql = "SELECT * FROM `category` WHERE `CategoryId`='$id';";
            $res = $conn->query($sql);
            $categories = "";
            while ($row = $res->fetch_assoc()){
                $categories = $categories . $row["Name"];
            }
            return $categories;
        }
    }
    public function setCategory(){
        
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

}
?>
