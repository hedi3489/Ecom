<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="Views/styles.css" type="text/css">
</head>
<body>
    <h1>Login</h1>
    <form action="?controller=user&action=validate"method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br>
        <button type="submit">Login</button>
    </form>
    <?php 
    var_dump($_POST);
    ?>
</body>
</html>

