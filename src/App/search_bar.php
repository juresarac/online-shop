<?php
declare(strict_types=1);

use OnlineStore\Controllers\SearchController;
use OnlineStore\Models\SearchModel;
require __DIR__ . '/../../vendor/autoload.php';

$searchModel = new SearchModel();

$searchController = new SearchController($searchModel);

if (isset($_GET['search'])) {
    $searchedProduct = $searchController->searchProductController();
}
