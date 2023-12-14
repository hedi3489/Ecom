<!DOCTYPE html>
<html>
<head>
    <title>Product View</title>
    <link rel="stylesheet" href="Views/CSS/ProductView.css" type="text/css">
    <link rel="stylesheet" href="Views/CSS/Basic.css" type="text/css">
</head>
<body>
    <h1>Product View</h1>    
    <?php
    include_once "Views/Product/navbar.php";
    include_once "Models/Product.php";
    $product = $data['0'];
    $cart = $_SESSION['cart'];
    echo "<div class='product'>";
        echo "<div class='image-container'>";
            echo "<img src=" . $product->getImagePath() . " alt='Image'>";
        echo "</div>";
        echo "<div class='detail-container'>";
            echo "<p class='product-name'>" . $product->getName() . "</p>";
            echo "<p class='price'>" . $product->getPrice() . "</p>";
            echo "<p class='category'>" . $product->getCategories() . "</p>";
            echo "<p class='seller'>Seller: " . $product->getSeller()->getUsername() . "</p>";
        echo "</div>"; 
    ?>
        <div class='comments'>
            comments
        </div>
    </div> <!--CLOSING PRODUCT DIV-->
    <div class='action'>
        <div style='height: 70px;'>
            <?php
            $stock = ($product->getQuantity()>0) ? "In Stock" : "Out of Stock";
            $color = ($product->getQuantity()>0) ? "green" : "red";
            echo "<p id='stock' style='color: $color;'>$stock</p>";
            echo "<p id='qty'>Quantity:</p>";
            echo "<select class='quantity-dropdown'>";
            for ($i = 1; $i <= $product->getQuantity(); $i++) {
                echo "<option value='option$i'>$i</option>";
            }
            echo "</select></div>";
            echo "<label class='line'></label>";
        echo "<button class='buy-button'>
            <a href='?controller=product&action=checkout&id=". $product->getProductId() ."'>Buy Now</a>
        </button>";
        echo "<button class='add-to-cart-button' onclick=" . array_push($_SESSION['cart'],$product->getProductId()) . ">Add to Cart</button>";
        ?>
    </div>
</body>
</html>
