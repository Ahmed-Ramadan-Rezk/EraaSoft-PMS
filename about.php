<?php require_once('inc/header.php'); ?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">About Us</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<!-- Section-->
<?php $data = get("database/about.json"); ?>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <?php if (empty($data)): ?>
                    <p class="alert alert-danger p-1 text-center">No data found!</p>
                <?php else: ?>
                    <div class="border p-4 text-center my-5">
                        <h2><?= $data[0]['mission']['title'] ?></h2>
                        <p>
                            <?= $data[0]['mission']['description'] ?>
                        </p>
                    </div>

                    <div class="border p-4 text-center my-5">
                        <h2><?= $data[1]['vision']['title'] ?></h2>
                        <p>
                            <?= $data[1]['vision']['description'] ?>
                        </p>
                    </div>

                    <div class="border p-4  my-5 text-center">
                        <h2 class="text-center"><?= $data[2]['goals']['title'] ?></h2>
                        <?php foreach ($data[2]['goals']['goal'] as $goal): ?>
                            <h6 class="border p-3 my-2"><?= $goal['name'] ?></h6>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>