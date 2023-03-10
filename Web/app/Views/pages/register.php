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
        <form method="post" action="/register">
            <h2>Register</h2>
            <?= csrf_field(); ?>
            <?php //$validation->listErrors(); 
            ?>
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="password2" placeholder="Confirm Password">
            <a href="/login">Cancel</a>
            <button type="submit">Register</button>
        </form>
    </div>
</body>

</html>