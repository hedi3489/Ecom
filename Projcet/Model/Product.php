<?php
include_once "mysqldatabase.php";

class Product{
    private $productId;
    private $sellerId;
    private $name;
    private $category;
    private $price;
    private $quantity;

    public function __construct($id=-1){
        if($id<0){
            //CREATING NEW PRODUCT
            $this->productId = 0;
            $this->sellerid = 0;
            $this->name = "";
            $this->category = 0;
            $this->price = 0;
            $this->quantity = 0;
        }else{
            //RETRIEVEING EXISTING PRODUCT
            $sql = "SELECT * FROM `users` WHERE `ProductId`='".$id."';";
            $res = $conn->query($sql);
            $assoc_prod = $res->fetch_assoc();
            
            $this->productId = $id;
            $this->sellerId = $assoc_user['SellerId'];
            $this->name = $assoc_user['Name'];
            $this->category = $assoc_user['Category'];
            $this->price = $assoc_user['Price'];
            $this->quantity = $assoc_user['Quantity'];
        }
    }

    public static function listProducts(){
        global $conn;
        $list = array();
        $sql = "SELECT * FROM `products`";
        $res = $conn->query($sql);
        while($row = $res->fetch_assoc()){
            $product = new Product();
            $this->productId = $id;
            $this->sellerId = $assoc_user['SellerId'];
            $this->name = $assoc_user['Name'];
            $this->category = $assoc_user['Category'];
            $this->price = $assoc_user['Price'];
            $this->quantity = $assoc_user['Quantity'];

            array_push($list);
        }
    }

    function update($post){
       global $conn;
       $sql = "UPDATE `products` SET `SellerId` = '".$post['SellerId']
       ."', `Name` = '".$post['Name']
       ."', `Category` = '".$post['Category']
       ."', `Price` = '".$post['Price']
       ."', `Quantity` = '".$post['Quantity']."' WHERE `products`.`ProductId` = '".$post['ProductId']."';";
       $conn->query($sql);
    }

}

?>