
<?php
require_once "mysqldatabase.php";

class Transaction {
    private $buyerId;
    private $username;
    private $transactionId;
    private $productId;
    private $quantity;
    private $totalAmount;


    public function __construct($id = -1) {
        global $conn; 
        if ($id < 0) {
            $this->buyerId = -1;
            $this->username = "";
            $this->transactionId = -1;
            $this->productId = -1;
            $this->quantity = "";
            $this->totalAmount = "";

        } else {
            $id = $conn->real_escape_string($id);
            $sql = "SELECT * FROM `users` WHERE `BuyerId`='$id';";
            $res = $conn->query($sql);
            $assoc_user = $res->fetch_assoc();

            if ($assoc_user) {
                $this->buyerId = $id;
                $this->username = $assoc_user['Username'];
                $this->transactionId = $assoc_user['TransactionId'];
                $this->productId = $assoc_user['ProductId'];
                $this->quantity = $assoc_user['Quantity'];
                $this->totalAmount = $assoc_user['TotalAmount'];
                
            } else {
            }
        }
    }
    
    public static function listTransactions() {
        global $conn;
        $list = array();
        $sql = "SELECT * FROM `transactions`";
        $res = $conn->query($sql);
        while ($row = $res->fetch_assoc()) {
            $transaction = new Transaction();
            $transaction->buyerId = $row['UserId'];
            $transaction->username = $row['Username'];
            $transaction->transactionId = $row['TransactionId'];
            $transaction->productId = $row['ProductId'];
            $transaction->quantity = $row['Quantity'];
            $transaction ->totalAmount = $row['TotalAmount'];

            array_push($list, $transaction);
        }
        return $list;
    }

    public function update($post) {
        global $conn;
        $buyerId = $this->buyerId;

        $buyerId = $conn->real_escape_string($post['UserId']);
        $username = $conn->real_escape_string($post['Username']);
        $transactionId = $conn->real_escape_string($post['TransactionId']);
        $productId = $conn->real_escape_string($post['ProductId']);
        $quantity = $conn->real_escape_string($post['Quantity']);
        $totalAmount = $conn->real_escape_string($post['TotalAmount']);
        $sql = "UPDATE `transactions` SET `TransactionId` = '$transactionId', `ProductId` = '$productId', `Quantity` = '$quantity', `TotalAmount` = '$totalAmount' WHERE `BuyerId` = '$buyerId'";
        $conn->query($sql);
    }

    public static function CreateTransaction($address, $paymentMethod){

    }
}
?>




<?php
