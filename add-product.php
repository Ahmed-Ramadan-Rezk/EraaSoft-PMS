<?php require_once('inc/header.php'); ?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Add Product</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-8 mx-auto">
                <form action="handlers/product.php" class="form border my-2 p-3" method="POST" enctype="multipart/form-data">
                    <?php success("success") ?>

                    <div class="mb-3">

                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                            <?php error("name") ?>
                        </div>

                        <div class="mb-3">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control">
                            <?php error("quantity") ?>
                        </div>

                        <div class="mb-3">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control" rows="7">
                            <?php error("price") ?>
                        </div>

                        <div class="mb-3">
                            <label for="compare">Compare at Price</label>
                            <input type="number" name="compare" id="compare" class="form-control" rows="7">
                            <?php error("compare") ?>
                        </div>

                        <div class="mb-3">
                            <label for="isSale">Is Sale</label>
                            <select name="isSale" id="isSale" class="form-select" aria-label="Default select example">
                                <option value="0" selected>Choose...</option>
                                <option value="1">Sale</option>
                                <option value="2">No Sale</option>
                            </select>
                            <?php error("isSale") ?>
                        </div>

                        <div class="mb-3">
                            <label for="file">Image</label>
                            <input type="file" name="file" id="file" class="form-control" rows="7">
                            <?php error("file") ?>
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="Add +" id="" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>