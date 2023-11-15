<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Views/styles.css" type="text/css">
    <title>Sell a Product</title>
</head>
<body>
    <h1>Sell a Product</h1>
    <form action="/sell" method="post">
        <label for="product-name">Product Name:</label>
        <input type="text" id="product-name" name="product-name" required><br>
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required><br>
        <label for="category">Category:</label>
        <select id="category" name="category">
            <option value="1">Electronics</option>
            <option value="2">Clothing</option>
        </select><br>
        <label for="quantity">Quantity Available:</label>
        <input type="number" id="quantity" name="quantity" required><br>
        <button type="submit">Sell Product</button>
    </form>
</body>
</html>
