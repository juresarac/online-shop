<?php
declare(strict_types=1);
require_once __DIR__ . '/../App/product_details.php'; ?>
<?php require_once __DIR__ . '/templates/header.php' ?>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card h-100">
                    <img src="<?php echo $productDetails['image_url']; ?>" class="card-img-top"
                         alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $productDetails['product_name']; ?></h5>
                        <p class="card-text"><?php echo $productDetails['product_description']; ?></p>
                        <div class="price">$<?php echo $productDetails['product_price']; ?></div>
                        <label for="availability">Availability</label>
                        <div class="availability"><?php echo $productDetails['product_availability']; ?></div>
                        <form method="post"
                              action="product_details.php?product_id=<?php echo $productDetails['product_id']; ?>">
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" id="quantity" name="quantity" value="1" min="1">
                                <input type="hidden" name="product_id"
                                       value="<?php echo $productDetails['product_id']; ?>">
                            </div>
                            <button type="submit" name="add-to-cart" class="btn btn-primary" style="margin-top: 30px">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require_once __DIR__ . '/templates/footer.php';

