<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    $_SESSION['cart'][] = $productId; // Add the product ID to the session cart array
    // You can perform additional checks and operations here, such as checking if the product ID is valid, etc.
}
?>