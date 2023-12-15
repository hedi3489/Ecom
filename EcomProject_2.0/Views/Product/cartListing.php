<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="Views/CSS/Basic.css" type="text/css">
    <link rel="stylesheet" href="Views/CSS/CartCheckout.css" type="text/css">
</head>
<body>
    <h1>Checkout</h1>
    <?php 
    include_once "Views/Product/navbar.php";
    include_once "Models/Product.php";
    //var_dump($data);
    $list = $data['0'];
    $subtotal = 0;
    echo "<div class='checkout-details'>";
        echo "<div class='products'>";
        foreach ($list as $id){
            $product = new Product($id);
            echo "<div class='product'>";
                echo "<div class='image-container'><img src=" . $product->getImagePath() . " alt='Image'></div>";
                echo "<div class='detail-container'>";
                    echo "<p class='product-name'>" . $product->getName() . "</p>";
                    echo "<p class='price'>" . $product->getPrice() . "</p>";
                    echo "<p class='category'>" . $product->getCategories() . "</p>";
                    echo "<p class='seller'>Seller: " . $product->getSeller()->getUsername() . "</p>";
                    echo "<button>Add to Cart</button>";
                echo "</div>"; 
            echo "</div>";
            $subtotal += $product->getPriceValue();
        }
        ?>
        </div>;
        <div class='payment'>
            <label>Payment Method</label>
            <p>Subtotal</p>
            <p class='price'><?php echo Product::formatPrice($subtotal);?></p><br>
            <p>Delivery</p>
            <p class='price' style='color: green;'>FREE</p><br><br>
            <label class='line'></label>
            <p>Item(s) total</p>
            <p class='price'><?php echo Product::formatPrice($subtotal);?></p><br>

            <button>Pay with PayPal</button>
        
        </div>
    </div>
        <!--
        <form class="checkout-form" action="process_checkout.php" method="POST">
            <h2>Shipping Information</h2>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <input type="submit" value="Complete Purchase">
        </form>-->
</body>
</html>