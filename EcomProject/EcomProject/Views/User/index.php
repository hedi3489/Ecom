<?php
include_once "Models/User.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="Views/CSS/Basic.css" type="text/css">
    <script src="script.js"></script>
</head>
<body>
    <h1>Register</h1>
    <form action="?controller=user&action=register"method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="method">Mobile number or email:</label>
        <input type="text" id="method" name="method" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <label for="password">Confirm Password:</label>
        <input type="password" id="confirm-password" name="confirm-password" required>
        <button type="submit">Register</button>
        <p>Already have an account? <a href="?controller=user&action=login">Sign in</a></p>
    </form>
</body>
</html>

