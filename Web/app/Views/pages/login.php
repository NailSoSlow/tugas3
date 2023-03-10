<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas3</title>
    <link rel="stylesheet" href="assets/css/loginStyle.css">
</head>

<body>
    <div class="container">
        <form method="post" action="/login">
            <h2>Login</h2>
            <?php if (isset($_SESSION['loginErr'])) : ?>
                <p>
                    <?= $_SESSION['loginErr'] ?>
                </p>
            <?php endif ?>
            <?= csrf_field(); ?>
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <a href="/register">Don't have an account?</a>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>