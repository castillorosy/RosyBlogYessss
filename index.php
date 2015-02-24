<?php

//links to other pages 
require_once (__DIR__ . "/controller/login-verify.php");
require_once (__DIR__ . "/view/header.php");
if (authenticateUser()) {
    require_once (__DIR__ . "/view/navigation.php");
}
require_once (__DIR__ . "/controller/create-db.php");
require_once (__DIR__ . "/view/footer.php");
require_once (__DIR__ . "/controller/read-posts.php");
?>
<a href="login.php" class="btn btn-info" role="button">Login</a><br>
Don't Have A(n) Account Sign Up!<br>
<a href="register.php" class="btn btn-info" role="button">Sign Up</a>
