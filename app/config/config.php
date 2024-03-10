<?php

session_start();

$servername = "localhost";
$db_username = "root";
$db_password = "";
$db = "shop";

$conn = mysqli_connect($servername, $db_username, $db_password, $db);

if(!$conn) {
    die("Invalid connection");
}

function ddebug($x)
{
    echo "<pre>";
    print_r($x);
    echo "</pre>";
}