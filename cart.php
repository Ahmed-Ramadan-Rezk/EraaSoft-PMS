<?php require_once('inc/header.php'); ?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Cart</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<!-- Section-->
<?php $data = get("database/cart.json"); ?>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <?php if (empty($data)): ?>
                    <div class="text-center">
                        <figure>
                            <img src="assets/cart.png" alt="Cart">
                        </figure>
                        <h4>Your Cart is Empty!</h3>
                            <a href="index.php" class="btn btn-outline-dark mt-auto">Continue Shopping</a>
                    </div>
                <?php else: ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $item): ?>
                                <tr>
                                    <th scope="row"><?= $item['id'] ?></th>
                                    <td><?= $item['name'] ?></td>
                                    <td><?= number_format($item['price'], 2) ?></td>
                                    <td>
                                        <form action="handlers/quantity.php" method="POST">
                                            <input type="hidden" name="item" value="<?= $item['id'] ?>">
                                            <input type="number" name="quantity" min="1" value="<?= $item['quantity'] ?  $item['quantity'] : 1 ?>">
                                            <input type="submit" value="Update">
                                            <?= error('quantity') ?>
                                        </form>
                                    </td>
                                    <td><?= number_format($item['price'] * $item['quantity'], 2)  ?></td>
                                    <td>
                                        <form action="handlers/delete.php" method="POST">
                                            <input type="hidden" name="item" value="<?= $item['id'] ?>">
                                            <input type="submit" class="btn btn-danger" value="Delete">
                                            <?= error('no_product') ?>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            <tr>
                                <td colspan="2">
                                    Tatal Price
                                </td>
                                <td colspan="3">
                                    <h3><?= total($data) ?> $</h3>
                                </td>
                                <td>
                                    <a href="checkout.php" class="btn btn-primary">Checkout</a>
                                </td>
                            </tr>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>