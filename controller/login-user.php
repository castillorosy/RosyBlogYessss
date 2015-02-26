<?php
require_once (__DIR__ . "/../model/config.php");

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

$query = $_SESSION["connection"]->query("SELECT salt, password FROM users WHERE username = '$username'");

if ($query->num_rows == 1) {
    $row = $query->fetch_array();
//    $query = "select * from test where acc like \"%$trimmed%\"";
//    $numresults = mysql_query($query);
//   $numrows = mysql_num_rows($numresults);

    if ($row["password"] === crypt($password, $row["salt"])) {
        $_SESSION["authenticated"] = true;
//        if it isn't set to true that means the user can not login
        echo "<p> Login Successful!<p>";
    } else {
        echo "<p>Invalid username and password1</p>";
    }
} else {
    echo "<p>Invalid username and password2</p>";
}
?>
<button><a href="logout-user.php">Logout</a></button>
<button><a href="../index.php">Home</a></button>
@{
newPassword = Request["newPassword"];
confirmPassword = Request["confirmPassword"];
token = Request["token"];
if IsPost
{
    // input testing is ommitted here to save space
    retunValue = ResetPassword(token, newPassword); 
}
}
<h1>Change Password</h1>

<form method="post" action="">

<label for="newPassword">New Password:</label> 
<input type="password" id="newPassword" name="newPassword" title="New password" />

<label for="confirmPassword">Confirm Password:</label> 
<input type="password" id="confirmPassword" name="confirmPassword" title="Confirm new password" />

<label for="token">Pasword Token:</label> 
<input type="text" id="token" name="token" title="Password Token" />

<p class="form-actions">
<input type="submit" value="Change Password" title="Change password" />
</p>

</form>