<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/form.css">
    <title>Recipe-Signup</title>
</head>
<body>
    <h2>SIGNUP</h2>
    <form action="/php/register.php" method="POST">
        <input type="text" placeholder="Full Name" name="name">
        <input type="email" placeholder="Email" name="email">
        <input type="password" placeholder=" Password" name="password">
        <input type="password" placeholder="Comfirm Pssword">
        <input type="submit" value="Signup">
        <div class="login">
            <p>do you have acount?</p>
            <a href="/admin/login.html">Login</a>
        </div>
    </form>
</body>
</html>
