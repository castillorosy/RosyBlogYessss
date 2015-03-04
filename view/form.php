<?php
require_once (__DIR__ . "/../model/config.php");
require_once (__DIR__ . "/../controller/login-verify.php");

if (!authenticateUser()) {
    header("Location: " . $path . "index.php");
    die();
//  authenticateUser helps the user login
//    stop the page from loading
}
?>
<h1>Create Blog Post</h1>
<!--basically saying to send information-->
<form method="post" action="<?php echo $path . "controller/create-post.php"; ?>">
    <div>
    </div>
    <label for="title">Title:</label>
    <input type="text" name="title"/>
    <div>
        <label for="post">Post: </label>
        <textarea name="post"<></textarea>
    </div>
    <div>
        <!--        the button helps us put the post on web page/blog-->
        <button type="submit">Submit</button>
    </div>
</form>