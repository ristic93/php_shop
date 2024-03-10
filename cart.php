<?php

require_once "inc/header.php";
require_once "app/classes/Cart.php";

if (!$user->isLogged()) {
    header("location: index.php");
    exit();
}

$cart = new Cart();
$cart_items = $cart->get_cart_items();
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Product name</th>
            <th scope="col">Size</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cart_items as $item) : ?>
            <tr>
                <td><?= ($item['name']); ?></td>
                <td><?= ($item['size']); ?></td>
                <td><?= ($item['price']); ?></td>
                <td><img src="<?= ($item['image']); ?>" alt="<?= ($item['name']); ?>" height="40" width="40"></td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>

<a href="checkout.php" class="btn btn-success">Checkout</a>


<?php require_once "inc/footer.php"; ?>