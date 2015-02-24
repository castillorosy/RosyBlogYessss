<?php

require_once (__DIR__ . "/../model/config.php");

$title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
$post = filter_input(INPUT_POST, "post", FILTER_SANITIZE_STRING);

$query = $_SESSION["connection"]->query("INSERT INTO posts SET title = '$title', post = '$post'");
//this helps us put it in my data base and show on "my admin"
if ($query) {
    echo "<p>Successfully insert post: $title</p>";
} else {
    echo "<p>" . $_SESSION["connection"]->error . "</p>";
}