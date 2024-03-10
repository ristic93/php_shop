<?php
require_once "inc/header.php";
require_once "app/classes/Product.php";

$products = new Product();
$products = $products->fetchAll();
?>

<div class="row">
    <?php foreach ($products as $product) : ?>
        <div class="col-md-4">
            <div class="card">
                <img src="images/<?php echo $product['image'] ?>" alt="<?php echo $product['name'] ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= $product['name'] ?></h5>
                    <p class="card-text">Size:<?= $product['size'] ?></p>
                    <p class="card-text">Price:<?= $product['price'] ?></p>
                    <a href="product.php?product_id=<?= $product['product_id'] ?>" class="btn btn-primary">View Product</a>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
</div>

<?php require_once "inc/footer.php"; ?>
