<?php
declare(strict_types=1);

namespace OnlineStore\Controllers;
use OnlineStore\Models\SearchModel;
require __DIR__ . '/../../vendor/autoload.php';

class SearchController
{
    private SearchModel $searchModel;

    public function __construct(SearchModel $searchModel)
    {
        $this->searchModel = $searchModel;
    }

    public function searchProductController(): array
    {

        $product = [];
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $product = $this->searchModel->searchProduct($searchTerm);
        }
        return $product;
    }
}
