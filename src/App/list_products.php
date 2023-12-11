<?php

declare(strict_types=1);


use OnlineStore\Controllers\ProductsController;

require __DIR__ . '/../../vendor/autoload.php';

$productsController = new ProductsController();
$pagedProducts = $productsController->displayProducts();

