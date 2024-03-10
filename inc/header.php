<?php
require_once "app/config/config.php";
require_once "app/classes/User.php";

$user = new User();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container mb-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
            <div class="container">
                <a href="index.php" class="navbar-brand">Shop</a>
                <button class="navbar-toggler" type="button" data-toogle="collapse" data-target="#nav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a href="index.php" class="nav-link">Home</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <?php if (!$user->isLogged()) : ?>

                            <li class="nav-item">
                                <a href="register.php" class="nav-link">Register</a>
                            </li>
                            <li class="nav-item">
                                <a href="login.php" class="nav-link">Login</a>
                            </li>

                        <?php else : ?>
                            <li class="nav-item">
                                <a href="cart.php" class="nav-link">Cart</a>
                            </li>
                            <li class="nav-item">
                                <a href="orders.php" class="nav-link">My orders</a>
                            </li>
                            <li class="nav-item">
                                <a href="logout.php" class="nav-link">Logout</a>
                            </li>

                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <?php
        if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?php echo $_SESSION['message']['type']; ?> alert-dismissible fade show" role="alert">
                <?php
                echo $_SESSION['message']['text'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif; ?>