<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You can reset your password by sending email address</title>
</head>
<body>
    <h1>Forgot Password</h1>

    <form action = "send-password-reset.php" method="post" autocomplete="off">
        <label for="email">Email : </label>
        <input type="email" name="email" id="email">
        <button type="submit">Send</button>
    </form>
</body>
</html>