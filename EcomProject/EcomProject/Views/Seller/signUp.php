<!DOCTYPE html>
<html>
<head>
    <title>Sign up</title>
    <link rel="stylesheet" href="Views/styles.css" type="text/css">
</head>
<body>
    <h1>Sign up</h1>
    <form action="/signUp" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Sign up</button>
    </form>
</body>
</html>