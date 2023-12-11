<?php
declare(strict_types=1);

namespace OnlineStore\Models;
require_once __DIR__ . '/../Settings/db_connection.php';
use PDO;
use PDOException;

class SearchModel
{
    private ?PDO $connection;

    public function __construct()
    {
        $this->connection = $this->getConnection();
    }

    public function searchProduct(string $searchTerm): array
    {
        $product = [];
        $sth = "SELECT * FROM products WHERE product_name LIKE :searchTerm";
        $stmt = $this->connection->prepare($sth);
        $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function getConnection(): ?PDO
    {
        try {
            return new PDO(
                DB_DRIVER . ':host=' . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
                DB_USER,
                DB_PASSWORD
            );
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
            return null;
        }
    }
}

