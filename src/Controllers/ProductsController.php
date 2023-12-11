<?php
declare(strict_types=1);

namespace OnlineStore\Controllers;
use OnlineStore\Models\ProductsModel;
require __DIR__ . '/../../vendor/autoload.php';

class ProductsController
{
    public ProductsModel $productsModel;

    public function __construct()
    {
        $this->productsModel = new ProductsModel();
    }

    public function displayOneProduct($productId): array
    {
        $product = $this->productsModel->findById($productId);

        require_once __DIR__ . '/../Views/product_details.php';

        return $product;
    }

    public function displayProducts(): array
    {
        $productsPerPage = 12;
        $currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

        // Call the "findAllProducts" function to get all products
        $products = $this->productsModel->findAllProducts();

        // Calculate the total number of products and pages
        $totalProducts = count($products);
        $totalPages = ceil($totalProducts / $productsPerPage);

        // Calculate the starting index for the current page
        $startIndex = ($currentPage - 1) * $productsPerPage;

        // Slice the products array based on the current page and items per page
        $pagedProducts = array_slice($products, $startIndex, $productsPerPage);

        require_once __DIR__ . '/../Views/list_products.php';
        return $products;
    }
}
