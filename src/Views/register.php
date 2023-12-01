<?php
declare(strict_types=1);
require_once __DIR__ . '/../App/register.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Shop - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        <?php require __DIR__ . '/Style/register.css'?>
    </style>
</head>
<body>
<!-- Navigation bar -->
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
    <section id="login">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1 class="text-center">Register</h1>
                    </div>
                    <div class="card-body">
                        <form role="form"  method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control"
                                       placeholder="Enter your first name">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter your last name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Your password...">
                                <?php if (isset($_SESSION['error_message'])): ?>
                                    <div style="padding:10px" class="alert alert-danger">
                                        <?php echo $_SESSION['error_message']; ?>
                                    </div>
                                    <?php unset($_SESSION['error_message']); ?>
                                <?php endif; ?>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="register" class="btn btn-success" >Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
