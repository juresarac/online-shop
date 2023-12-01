<?php
declare(strict_types=1);

namespace OnlineStore\Controllers;

use OnlineStore\Models\UsersModel;

require __DIR__ . '/../../vendor/autoload.php';

class UsersController
{

    public function loginUser(): void
    {
        if (isset($_POST['login'])) {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error_message'] = "Invalid email format. Please try again!";
                header("Location: /online store/src/Views/login.php");
                exit();
            }

            $userModel = new UsersModel();
            $userData = $userModel->findByEmail($email);

            session_start();
            if ($userData && password_verify($password, $userData['user_password'])) {
                $_SESSION['user_id'] = $userData['user_id'];
                $_SESSION['user_email'] = $userData['user_email'];
                header("Location: /online store/public/index.php");
            } else {
                $_SESSION['error_message'] = "Invalid email or password. Please try again or register!";
                header("Location: /online store/src/Views/login.php");
                exit();
            }
        }
    }

    public function logoutUser(): void
    {
        session_start();

        $_SESSION = array();

        session_destroy();

        header("Location: /online store/src/Views/login.php");
        exit();
    }
}
