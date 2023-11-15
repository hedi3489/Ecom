<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../styles.css" type="text/css">
</head>
<body>
    <h1>Login</h1>
    <form action="../../?controller=user&action=validate&id=1"method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>"><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"><br>
        <button type="submit">Login</button>
    </form>
    <?php 
    var_dump($_POST);
    ?>
</body>
</html>

