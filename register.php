<?php
require_once "inc/header.php";
require_once "app/classes/User.php";

if($user->isLogged()) {
    header("location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $created = $user->create($name, $username, $email, $password);

    if ($created) {
        $_SESSION['message']['type'] = "success"; // danger or success
        $_SESSION['message']['text'] = "Successfully registered account!";
        header("location: index.php");
        exit();
    } else {
        $_SESSION['message']['type'] = "danger"; // danger or success
        $_SESSION['message']['text'] = "Error!";
        header("location: register.php");
        exit();
    }
}

?>

<div class="row justify-content-center">
    <div class="col-lg-5">
        <h3 class="text-center py-5">Registracija</h3>
        <form action="" method="POST">
            <div class="form-group mb-3">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>

        <a href="login.php">Login</a>
    </div>
</div>

<?php require_once "inc/footer.php"; ?>