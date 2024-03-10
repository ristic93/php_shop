<?php
require_once "inc/header.php";
require_once "app/classes/User.php";

$user = new User();
$user->logout();

header('location: login.php');
exit();
