<?php
include_once "Controllers/UserController.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="Views/styles.css" type="text/css">
</head>
<body>
    <h1>Login</h1>
    <form action=<?php "?controller=$c&action=$a"?> method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>

