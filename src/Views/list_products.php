<?php
declare(strict_types=1);
require_once __DIR__ . '/../App/list_products.php';
?>
<?php require_once __DIR__ . '/templates/header.php' ?>

    <body>
<section class="product-list py-5 bg-light">
    <div class="container">
        <h1 class="text-center mb-4">Our products</h1>
        <div class="row justify-content-center">

            <?php
            $productsPerPage = 12;
            $totalProducts = count($pagedProducts);
            $totalPages = ceil($totalProducts / $productsPerPage);
            $currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
            $startIndex = ($currentPage - 1) * $productsPerPage;
            $endIndex = min($startIndex + $productsPerPage, $totalProducts);

            for ($i = $startIndex; $i < $endIndex; $i++) {
                $product = $pagedProducts[$i];
                ?>

                <!-- Product Card -->
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <a href="product_details.php?product_id=<?php echo $product['product_id']; ?>">

                            <img src="<?php echo $product['image_url']; ?>" class="card-img-top" alt="Product Image">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                            <p class="card-text"><?php echo $product['product_description']; ?></p>
                            <a href="product_details.php?product_id=<?php echo $product['product_id']; ?>">View
                                details</a>

                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

        <!-- Pagination -->
        <nav aria-label="Product Pagination">
            <ul class="pagination justify-content-center">
                <?php
                for ($page = 1; $page <= $totalPages; $page++) {
                    $activeClass = $page === $currentPage ? 'active' : '';
                    ?>
                    <li class="page-item <?php echo $activeClass; ?>">
                        <a class="page-link" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </nav>
    </div>
</section>

<?php require_once __DIR__ . '/templates/footer.php';
