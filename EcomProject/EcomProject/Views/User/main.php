<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>
    <link rel="stylesheet" href="Views/CSS/Basic.css" type="text/css">    
    <link rel="stylesheet" href="Views/CSS/ProductListing.css" type="text/css">
</head>
<body>
    <h1>Welcome to the Main Page</h1>
    <nav>
        <input placeholder='Search...'>
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
        <img src='Images/cartimage.png'>
    </nav>
    <div class='sidebar'>
        <label>Stuff</label>
        <label>Stuff</label>
        <label>Stuff</label>
        <label>Stuff</label>
        <label>Stuff</label>
    </div>
    <?php
    include_once "Models/Product.php";
    $products = Product::listProducts();
    foreach($products as $product){
        echo "<div class='container'>";
        echo "<div class='image-container'>";
            echo "<img src=" . $product->getImagePath() . " alt='Image'>";
        echo "</div>";
        echo "<div class='detail-container'>";
            echo "<p>" . $product->getName() . "</p>";
            echo "<p>" . $product->getPrice() . "</p>";
            //echo "<p>" . $product->getCategories() . "</p>";
            
        echo "</div>";
        echo "<a href='?controller=product&action=view&id=". $product->getProductId() ."'>View</a>";
        echo "</div>";
    }
    ?>
</body>
</html>
