<?php
require_once (__DIR__ . "/../model/config.php");

unset($_SESSION["authenticated"]);
//helps us log out
session_destroy();
header("Location: " . $path . "index.php");