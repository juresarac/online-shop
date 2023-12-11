<?php
declare(strict_types=1);

namespace OnlineStore\Models;
require_once __DIR__ . '/../Settings/db_connection.php';
use PDO;
use PDOException;

class ProductsModel
{
    private ?PDO $connection;

    public function __construct()
    {
        $this->connection = $this->getConnection();
    }

    private function getConnection(): ?PDO
    {
        try {
            return new PDO(DB_DRIVER . ':host=' . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
                DB_USER,
                DB_PASSWORD
            );
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
            return null;
        }
    }

    public function findAllProducts(): array
    {
        $sth = "SELECT * FROM products";
        $stmt = $this->connection->prepare($sth);
        $stmt->execute();

        $products = [];

        while ($product = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $products[] = $product;
        }

        return $products;
    }

    public function findById($productId): array
    {
        $sth = "SELECT * FROM products WHERE product_id=:product_id";
        $stmt = $this->connection->prepare($sth);
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();

        $productDetails = $stmt->fetch(PDO::FETCH_ASSOC);

        return [
            'image_url' => $productDetails['image_url'] ?? '',
            'product_id' => $productDetails['product_id'] ?? '',
            'product_name' => $productDetails['product_name'] ?? '',
            'product_description' => $productDetails['product_description'] ?? '',
            'product_price' => $productDetails['product_price'] ?? '',
            'product_availability' => $productDetails['product_availability'] ?? ''
        ];
    }
}
