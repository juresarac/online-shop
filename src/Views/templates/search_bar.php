<?php require_once __DIR__ . '/../../App/search_bar.php'; ?>
<div class="container mt-3">
    <form class="d-flex" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</div>

<?php
/**
 * handle the search action and return the product searched for
 */
$searchedProducts = $searchController->searchProductController();
if (!empty($searchedProducts)): ?>
    <div class="container mt-3">
        <div class="row">
            <?php foreach ($searchedProducts as $searchedProduct): ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <img src="<?php echo $searchedProduct['image_url'] ?? ''; ?>" class="card-img-top" alt="">
                            <h3 class="card-title"><?php echo $searchedProduct['product_name'] ?? ''; ?></h3>
                            <h4 class="card-title"><?php echo $searchedProduct['product_description'] ?? ''; ?></h4>
                            <h5 class="card-title">$<?php echo $searchedProduct['product_price'] ?? ''; ?></h5>
                            <h6 class="card-title"><?php echo $searchedProduct['product_availability'] ?? ''; ?></h6>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php else: ?>
    <div class="container mt-3">
    </div>
<?php endif; ?>
