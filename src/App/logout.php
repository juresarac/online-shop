<?php

declare(strict_types=1);

use OnlineStore\Controllers\UsersController;
require __DIR__ . '/../../vendor/autoload.php';

$userController = new UsersController();

$userController->logoutUser();
session_destroy();