<?php

declare(strict_types=1);


use OnlineStore\Controllers\ProductsController;

require __DIR__ . '/../../vendor/autoload.php';

$productsController = new ProductsController();

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $productDetails = $productsController->displayOneProduct($product_id);
}

