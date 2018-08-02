<?php require "partials/header.view.php" ?>

<h1>these are our products</h1>

<div class="row">
    <?php foreach ($products as $product):?>
    <div class="card col-md-4">
        <img class="card-img-top" src="<?= $product->image ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?= $product->title ?></h5>
            <p class="card-text"><?= $product->description ?></p>
            <a href="/products/<?= $product->id ?>" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    <?php endforeach; ?>

</div>

<?php require "partials/footer.view.php" ?>
