<?php
require_once __DIR__ . '/../../App/cart.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="Style/cart.css">
</head>

<body>
<!-- Navigation bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Online shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/online store/public/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/online store/src/Views/list_products.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/online store/src/Views/about.php">About</a>
                </li>
                <!-- Cart Icon with link to cart page -->
                <li class="nav-item">
                    <a class="nav-link" href="/online store/src/Views/cart_page.php">
                        <i class="fas fa-shopping-cart"></i>
                        <span class='badge badge-warning' id='lblCartCount'>
            <?php echo $cartController->displayCartItemCount(); ?>
        </span> </a>
                </li>
            </ul>
        </div>
        <!-- Profile icon with dropdown menu -->
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="profileDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <li>
                    <a class="dropdown-item" href="/online store/src/Views/login.php">
                        <button type="submit" name="logout" class="btn btn-danger" style="background-size: 10px">
                            Logout
                        </button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php require_once __DIR__ . '/search_bar.php';?>
