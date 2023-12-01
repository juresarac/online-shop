<?php
declare(strict_types=1);

namespace OnlineStore\Controllers;

use OnlineStore\Models\CartModel;

require __DIR__ . '/../../vendor/autoload.php';

class CartController
{
    private CartModel $cartModel;

    /**
     * @param CartModel $cartModel
     */
    public function __construct(CartModel $cartModel)
    {
        $this->cartModel = $cartModel;
        if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }


    public function addToCart($productId, int $quantity = 1): void
    {
        $productDetails = $this->cartModel->addProductToCart($productId, $quantity);

        $existingCartItemKey = -1;
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $cartItem) {
                if ($cartItem['product_id'] == $productId) {
                    $existingCartItemKey = $key;
                    break;
                }
            }
        }
        if ($existingCartItemKey !== -1) {
            $_SESSION['cart'][$existingCartItemKey]['quantity'] = $quantity; // Update the quantity
        } else {
            $_SESSION['cart'][] = [
                'image_url' => $productDetails['image_url'],
                'product_id' => $productId,
                'product_name' => $productDetails['product_name'],
                'product_price' => $productDetails['product_price'],
                'quantity' => $quantity,
            ];
        }
    }

    public function getCartItemCount(): int
    {
        return count($_SESSION['cart'] ?? []);
    }

    public function displayCartItemCount(): int
    {
        return $this->getCartItemCount();
    }

    public function displayProductsInCartPage(): array
    {
        return $this->cartModel->getCartProducts();
    }

    public function deleteOneItem($productId): void
    {
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($productId, $_SESSION['cart'])) {
                unset($_SESSION['cart'][$productId]);
            }
        }
        $subtotalAndTotal = $this->calculateSubtotalAndTotal();
        $_SESSION['subtotal'] = $subtotalAndTotal['subtotal'];
        $_SESSION['total'] = $subtotalAndTotal['total'];
    }

    public function updateQuantity($productId, $newQuantity): void
    {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] = $newQuantity;
        }
        $subtotalAndTotal = $this->calculateSubtotalAndTotal();
        $_SESSION['subtotal'] = $subtotalAndTotal['subtotal'];
        $_SESSION['total'] = $subtotalAndTotal['total'];
    }

    public function calculateSubtotalAndTotal(): array
    {
        $subtotal = 0;
        foreach ($_SESSION['cart'] as $productId => $cartItem) {
            $productPrice = floatval($cartItem['product_price']);
            $quantity = intval($cartItem['quantity']);

            $subtotal += $productPrice * $quantity;
        }
        $total = $subtotal + 2.99; // Add shipping cost

        return [
            'subtotal' => $subtotal,
            'total' => $total,
        ];
    }

    public function checkout(): void
    {
        $_SESSION['cart'] = [];

        $_SESSION['cart_count'] = 0;

        header("Location: /online store/src/Views/checkout.php");
        exit();
    }

}
