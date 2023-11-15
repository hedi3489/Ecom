<?php
include_once "Models/User.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="Views/styles.css" type="text/css">
</head>
<body>
    <h1>Register</h1>
    <form action="?controller=user&action=validate&id=1"method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" required value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>">
        <br>
        <label for="username">Mobile number or email:</label>
        <input type="text" id="username">
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password1" required value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
        <br>
        <label for="password">Confirm Password:</label>
        <input type="password" id="password2" required value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
        <br>
        <div class="centre">
            <button type="submit">Register</button>
            <p>Already have an account? <a href="./Views/User/login.php">Sign in</a></p>
        </div>
    </form>
</body>
</html>

