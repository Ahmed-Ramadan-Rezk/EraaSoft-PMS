<?php require_once('inc/header.php'); ?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Checkout</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<!-- Section-->
<?php $data = get("database/cart.json"); ?>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <?php if (empty($data)): ?>
            <div class="text-center">
                <p>Your Cart is Empty. Can't checkout!</p>
                <a href="index.php" class="btn btn-outline-dark mt-auto">Continue Shopping</a>
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-4">
                    <div class="border p-2">
                        <div class="products">
                            <ul class="list-unstyled">
                                <?php foreach ($data as $check): ?>
                                    <li class="border p-2 my-1"> <?= $check['name'] . " # " . $check['id'] ?> -
                                        <span class="text-success mx-2 mr-auto bold"><?= $check['quantity'] . " x " . $check['price'] ?>$</span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <h3>Total : <?= total($data) ?> $</h3>
                    </div>
                </div>
                <div class="col-8">
                    <form action="handlers/checkout.php" class="form border my-2 p-3" method="POST">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" id="" class="form-control">
                                <?php error("name") ?>
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" id="" class="form-control">
                                <?php error("email") ?>
                            </div>
                            <div class="mb-3">
                                <label for="">Address</label>
                                <input type="text" name="address" id="" class="form-control">
                                <?php error("address") ?>
                            </div>
                            <div class="mb-3">
                                <label for="">Phone</label>
                                <input type="number" name="phone" id="" class="form-control">
                                <?php error("phone") ?>
                            </div>
                            <div class="mb-3">
                                <label for="">Notes</label>
                                <input type="text" name="note" id="" class="form-control">
                                <?php error("note") ?>
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Place Order" id="" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>