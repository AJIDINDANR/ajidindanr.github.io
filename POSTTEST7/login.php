<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <div class="login-table">
        <h2>Login</h2>
        <form method="post" action="process_login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>