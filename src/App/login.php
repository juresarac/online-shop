<?php

declare(strict_types=1);


use OnlineStore\Controllers\UsersController;
require __DIR__ . '/../../vendor/autoload.php';


session_start();

$loginUser = new UsersController();

$loginUser->loginUser();

