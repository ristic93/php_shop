<?php
require_once "inc/header.php";
require_once "app/classes/Cart.php";
require_once "app/classes/Order.php";

if (!$user->isLogged()) {
    header("location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $delivery_address = $_POST['country'] . ", " . $_POST['city'] . ", " . $_POST['zip'] . ", " . $_POST['address'];

    $order = new Order();
    $order = $order->create($delivery_address);

    $_SESSION['message']['type'] = "success"; // danger or success
    $_SESSION['message']['text'] = "Successfully order!";
    header("location: orders.php");
    exit();
}
?>

<form action="" method="POST">
    <div class="form-group mb-3">
        <label for="country">Country</label>
        <input type="text" class="form-control" id="country" name="country" requiref>
    </div>
    <div class="form-group mb-3">
        <label for="city">City</label>
        <input type="text" class="form-control" id="city" name="city" requiref>
    </div>
    <div class="form-group mb-3">
        <label for="zip">ZIP number</label>
        <input type="text" class="form-control" id="zip" name="zip" requiref>
    </div>
    <div class="form-group mb-3">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" requiref>
    </div>
    <button type="submit" class="btn btn-success">Order</button>
</form>

<?php require_once "inc/footer.php"; ?>