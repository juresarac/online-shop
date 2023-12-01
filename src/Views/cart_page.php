<?php
/**
 * require necessary files
 */
declare(strict_types=1);
require_once __DIR__ . '/templates/header.php'; ?>
<?php require_once __DIR__ . '/../App/cart.php'; ?>

    <body>
<div class="container px-4 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-5">
            <h4 class="heading">Shopping Cart</h4>
        </div>
    </div>

    <!-- HTML cart display code -->
    <?php if (empty($_SESSION['cart'])): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <div class="container mt-3">
            <form action="cart_page.php" method="post">
                <div class="row">

                    <?php foreach ($cartItems as $productId => $cartItem): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="<?php echo $cartItem['image_url']; ?>" class="card-img-top"
                                     alt="Product Image">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $cartItem['product_id'] . " " . $cartItem['product_name']; ?></h5>

                                    <form action="cart_page.php" method="post">
                                        <label for="Quantity">Quantity:
                                            <input type="number" id="quantity" name="quantity"
                                                   value="<?php echo $cartItem['quantity'] ?>"
                                                   onchange="this.form.submit()">
                                        </label>
                                        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                                    </form>

                                    <p class="price">$<?php echo $cartItem['product_price']; ?></p>
                                    <div class="form-group">
                                        <button type="submit" name="delete-item" class="btn btn-danger btn-sm"
                                                value="<?php echo $productId; ?>">
                                            Delete Item
                                        </button>
                                        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </form>
        </div>
    <?php endif; ?>
    <?php require_once __DIR__ . '/templates/checkout_form.php' ?>
</div>
<?php require_once __DIR__ . '/templates/footer.php';