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
            $this->price = 0;
            $this->quantity = 0;
        } else {
            $id = $conn->real_escape_string($id);
            $sql = "SELECT * FROM `products` WHERE `ProductId`='$id';";
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
        $sql = "SELECT * FROM `products`";
        $res = $conn->query($sql);
        while ($row = $res->fetch_assoc()) {
            $product = new Product();
            $product->productId = $row['ProductId'];
            $product->sellerId = $row['SellerId'];
            $product->name = $row['Name'];
            $product->category = $row['Category'];
            $product->price = $row['Price'];
            $product->quantity = $row['Quantity'];

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
        $sql = "UPDATE `products` SET `SellerId` = '$sellerId', `Name` = '$name', `Category` = '$category', `Price` = '$price', `Quantity` = '$quantity' WHERE `ProductId` = '$productId'";
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

        $sql = "INSERT INTO `products` (`SellerId`, `Name`, `Category`, `Price`, `Quantity`) 
                VALUES ('$sellerId', '$name', '$category', '$price', '$quantity')";
        $conn->query($sql);

    }
}
?>
