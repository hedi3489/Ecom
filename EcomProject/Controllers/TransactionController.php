<?php
class TransactionController {
    public static function showCheckoutPage() {
        include 'views/checkout.php';
    }

    public static function completePurchase() {
        $address = $_POST['address'];
        $paymentMethod = $_POST['payment-method'];
        TransactionModel::createTransaction($address, $paymentMethod);

    }

}
