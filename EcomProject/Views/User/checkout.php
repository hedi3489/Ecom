<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Views/styles.css" type="text/css">
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>
    <div class="cart">
        <h2>Shopping Cart</h2>
        <div class="cart-item">
            <p>Product Name</p>
            <p>Price: $100</p>
            <p>Quantity: 2</p>
        </div>
    </div>
    <p>Total Price: $200</p>
    <form action="/checkout" method="post">
        <label for="address">Shipping Address:</label>
        <input type="text" id="address" name="address" required><br>
        <label for="payment-method">Payment Method:</label>
        <select id="payment-method" name="payment-method">
            <option value="credit-card">Credit Card</option>
            <option value="paypal">PayPal</option>
        </select><br>
        <button type="submit">Complete Purchase</button>
    </form>
</body>
</html>
