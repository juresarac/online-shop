<?php
declare(strict_types=1);

use OnlineStore\Models\CartModel;
use OnlineStore\Controllers\CartController;
require __DIR__ . '/../../vendor/autoload.php';

session_start();

/**
 * Instantiate cart model and cart controller
 */
$cartModel = new CartModel();
$cartController = new CartController($cartModel);

/**
 * Handle add to cart action
 */
if (isset($_POST['product_id'])) {
    $productId = filter_input(INPUT_POST, 'product_id', FILTER_SANITIZE_NUMBER_INT);
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
    if ($productId !== false && $productId !== null && $quantity > 0) {
        $cartController->addToCart($productId, $quantity);
    }
}

/**
 * get cart items, subtotal and total
 */
$cartItems = $cartController->displayProductsInCartPage();
$subtotalAndTotal = $cartController->calculateSubtotalAndTotal();

/**
 * handle delete item action and refresh the page
 */
if (isset($_POST['delete-item']) && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    $cartController->deleteOneItem($productId);
    $subtotalAndTotal = $cartController->calculateSubtotalAndTotal();
    header("Location: http://localhost/online store/src/Views/cart_page.php");
    exit();

}
/**
 * handle update quantity action
 */
if (isset($_POST['quantity'])){

    $newQuantity = $_SESSION['cart'][$productId]['quantity'];
    $cartController->updateQuantity($productId, $newQuantity);
    $subtotalAndTotal = $cartController->calculateSubtotalAndTotal();
}
/**
 * handle the checkout function and reset the cart count to 0 once the order is placed
 */
if (isset($_POST['checkout'])){
    $cartController->checkout();
}



