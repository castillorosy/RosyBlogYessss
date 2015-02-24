<?php
require_once (__DIR__ . "/../model/config.php");

$email = filter_input(INPUT_POST, "emil", FILTER_SANITIZE_EMAIL);
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "post", FILTER_SANITIZE_STRING);

$salt = "$5$" . "round = 5000$" . uniqid(mt_rand(), true) . "$";


$hashedPassword = crypt($password, $salt);
//it will show us what is happening in the varible
$query = $_SESSION["connection"]->query("INSERT INTO user SET "
        . "email = '$email',"
        . "username = '$username',"
        . "password = '$hashedPassword',"
        . "salt = '$salt'");

if($query) {
    echo "Successfully create user: $username";
}

 else {
    echo "<p>" . $_SESSION["connection"]->error . "</p>";    
}