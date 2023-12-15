
<!DOCTYPE html>
<html>
<head>
    <title>Your Listed Products</title>
    <link rel="stylesheet" href="Views/CSS/Basic.css" type="text/css">    
    <link rel="stylesheet" href="Views/CSS/ProductListing.css" type="text/css">
</head>
<body>
    <h1>Your Listed Products</h1>
    <?php include_once "Views/Product/navbar.php" ?>
    <?php
    include_once "Models/Product.php"; 
    $user = $_SESSION['user'];
    echo $user->getId();
    $sellerProducts = Product::listSellerProducts($sellerId);
    ?>
    <div class="product-list">
        <?php foreach($sellerProducts as $product): ?>
            <div class='container'>
                <div class='image-container'>
                    <img src="<?= $product->getImagePath() ?>" alt='Product Image'>
                </div>
                <div class='detail-container'>
                    <p><?= $product->getName() ?></p>
                    <p><?= $product->getDescription() ?></p>
                    <p>Quantity: <?= $product->getQuantity() ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="?controller=main&action=index">Go Back to Main Page</a>
</body>
</html>
