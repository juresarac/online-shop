<?php

use OnlineStore\Models\UsersModel;
require __DIR__ . '/../../vendor/autoload.php';

session_start();
$newUser = new UsersModel();
$newUser->registerUser();
