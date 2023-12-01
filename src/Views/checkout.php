<?php
require_once __DIR__ . '/templates/header.php';?>

    <div class="container">
        <div class="thank-you-message">
            <h1>Thank You for Your Order!</h1>
            <p>Your order was successfull.</p>
            <p>Order Details:</p>
            <ul>
                <li><strong>Order Total:</strong> $<?php echo number_format($_SESSION['total'], 2); ?></li>
            </ul>

        </div>
    </div>
<?php require_once __DIR__ . '/templates/footer.php';