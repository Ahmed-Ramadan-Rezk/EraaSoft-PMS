<?php require_once('inc/header.php'); ?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">All Products</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<!-- Section-->
<?php $data = get("database/products.json"); ?>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <?php success('success') ?>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php if (empty($data)): ?>
                <p class="alert alert-danger p-1 text-center">No data found!</p>
            <?php else: ?>
                <?php foreach ($data as $product): ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><?= $product['isSale'] ? "Sale" : "" ?></div>
                            <!-- Product image-->
                            <img class="card-img-top" src="uploads/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" loading="lazy" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $product['name'] ?></h5>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through"><?= $product['isSale'] ? "$" . number_format($product['compare'], 2) : "" ?></span>
                                    <?= "$" . number_format($product['price'], 2) ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <form action="handlers/cart.php" method="POST">
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <input type="hidden" name="quantity" min="1" value="1">
                                    <input type="hidden" name="product" value="<?= $product['id'] ?>">

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-outline-dark mt-auto">Add to cart</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>