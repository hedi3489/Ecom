<?php
$prod = new Product($_POST['productCode']);

$prod->update(  $_POST   );

header('Location: /?controller=product&action=index');
?>