<?php

session_start();

if (isset($_SESSION["login"])) {
    header("Location: home.php");
    exit;
}

require __DIR__ . '/functions.php';

if(isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"]; 

    $result = mysqli_query($conn, "SELECT * FROM users WHERE 
            email = '$email' ");

    if (mysqli_num_rows($result) === 1) {
        
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"])) {

        $_SESSION["login"] = true;
            $_SESSION["id"] = $row["users_id"];
        header("Location: home.php");
        exit;
        }
    }

    $error = true;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>

    <?php if(isset($error)) : ?>
        <p style="color: red; font-style:italic;">E-mail / Password Salah</p>
        <?php endif; ?>

    <form action="" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">E-mail : </label>
            <input type="email" class="form-control" id="email" placeholder="Contoh : contoh@gmail.com" name="email" required autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password : </label>
            <input type="password" class="form-control" id="password" name="password" required autocomplete="off">
        </div>
        <button type="submit" name="login">Login</button>
        <a href="register.php">Sign Up</a>
    </form>
</body>

</html>