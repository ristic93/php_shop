<?php
require_once "inc/header.php";
require_once "app/classes/Cart.php";
require_once "app/classes/Order.php";

if (!$user->isLogged()) {
    header("location: index.php");
    exit();
}

$order = new Order();
$orders  = $order->get_orders();
?>


<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Product Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Size</th>
            <th scope="col">Image</th>
            <th scope="col">Delivery Address</th>
            <th scope="col">Order Date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order) : ?>
            <tr>
                <td><?= ($order['order_id']); ?></td>
                <td><?= ($order['name']); ?></td>
                <td><?= ($order['quantity']); ?></td>
                <td><?= ($order['price']); ?></td>
                <td><?= ($order['size']); ?></td>
                <td><img src="<?= ($order['image']); ?>" alt="<?= ($order['name']); ?>" height="40" width="40"></td>
                <td><?= ($order['delivery_address']); ?></td>
                <td><?= ($order['created_at']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php require_once "inc/footer.php"; ?>