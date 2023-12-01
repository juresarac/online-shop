<?php
declare(strict_types=1);

namespace OnlineStore\Models;
require_once __DIR__ . '/../Settings/db_connection.php';
use PDO;
use PDOException;

class UsersModel
{
    private const REDIRECT_AFTER_REGISTRATION = 'http://localhost/online store/src/Views/login.php';
    public function findByEmail($email)
    {
        try {
            $pdo = new PDO(DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
            $sth = "SELECT * FROM users WHERE user_email = :email";
            $stmt = $pdo->prepare($sth);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $pdo = null;
    }

    public function registerUser(): void
    {
        if (isset($_POST['register'])) {
            $userId = $_POST['user_id'] ?? '';
            $firstName = filter_input(INPUT_POST, 'first_name');
            $lastName = filter_input(INPUT_POST, 'last_name');
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            try {
                $pdo = new PDO(DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
                $stmt = $pdo->prepare("INSERT INTO users (user_id, user_first_name, user_last_name, user_email, user_password) VALUES (:user_id, :first_name, :last_name, :email, :password)");
                $stmt->bindParam(':user_id', $userId);
                $stmt->bindParam(':first_name', $firstName);
                $stmt->bindParam(':last_name', $lastName);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->execute();

                header("Location: " . self::REDIRECT_AFTER_REGISTRATION);
                exit();
            } catch (PDOException $e) {
                // Log the error or throw an exception for better error handling
                throw new PDOException("Connection failed: " . $e->getMessage());
            } finally {
                $pdo = null;}


        }
    }

    public function loginUser(): void
    {
        if (isset($_POST['login'])) {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            // Fetch user from the database based on the provided email
            $user = $this->findByEmail($email);

            if ($user && password_verify($password, $user['user_password'])) {
                // Successful login, redirect to the desired page
                header("Location: http://localhost/online store/src/Views/index.php");
                exit();
            } else {
                // Invalid credentials, set an error message
                $_SESSION['error_message'] = "Invalid email or password";
            }
        }
    }
}