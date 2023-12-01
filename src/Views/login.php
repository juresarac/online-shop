<?php

declare(strict_types=1);
require_once __DIR__ . '/../App/login.php';
require_once __DIR__ . '/../Models/UsersModel.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        <?php require __DIR__ . '/Style/register.css'?>
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Online shop</a>
    </div>
</nav>

<div class="header-container">
    <div class="header-overlay"></div>
    <div class="header-content">
        <div class="header-logo">Online shop</div>
    </div>
</div>

<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-6">
            <h1 class="floral-background mb-4">Login</h1>


            <form action="/online store/src/App/login.php" method="post">

                <div class="form-group">
                    <label for="email">Email<input type="text" class="form-control" name="email" placeholder="Please enter your email" required></label>
                </div>

                <div class="form-group">
                    <label for="password">Password<input type="password" class="form-control" name="password" placeholder="Your password..." required></label>

                    <?php if (isset($_SESSION['error_message'])): ?>
                        <div style="padding:10px" class="alert alert-danger">
                            <?php echo $_SESSION['error_message']; ?>
                        </div>
                        <?php unset($_SESSION['error_message']); ?>
                    <?php endif; ?>

                </div>
                <div style="padding-top: 20px">
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </div>

            </form>
            <div class="mt-3">
                <a href="/online store/src/Views/register.php">Register</a>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
