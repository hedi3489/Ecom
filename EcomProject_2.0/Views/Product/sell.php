
<!-- sell.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Sell Products</title>
    <link rel="stylesheet" href="Views/CSS/Basic.css" type="text/css">    
</head>
<body>
    <?php include_once "navbar.php"; ?> 

    <h1>Sell Your Products</h1>
    <form action="?controller=product&action=add" method="post" enctype="multipart/form-data">
        <div>
            <label for="productName">Product Name:</label>
            <input type="text" id="productName" name="productName">
        </div>
        <div>
            <label for="productDescription">Description:</label>
            <textarea id="productDescription" name="productDescription"></textarea>
        </div>
        <div>
            <label for="productQuantity">Quantity:</label>
            <input type="number" id="productQuantity" name="productQuantity">
        </div>
        <div>
            <label for="productImage">Product Image:</label>
            <input type="file" id="productImage" name="productImage">
        </div>

        <input type="submit" value="Sell Product">
    </form>
    <a href="?controller=main&action=index">Go Back to Main</a>
</body>
</html>
