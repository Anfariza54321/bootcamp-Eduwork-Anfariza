<?php

session_start();


require 'functions.php';

if (isset($_POST["register"])) {
    
    if (registrasi ($_POST) > 0) {
        echo "
        <script>
        alert ('Data berhasil ditambahkan!');
        document.location.href = 'login.php';
        </script>";
    } else {
        mysqli_error($conn);
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasit</title>

    <style>
        label {
            display: block;
        }
    </style>
</head>

<body>
    <h1>Registrasi Terlebih dahulu</h1>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="userName" class="form-label">Nama : </label>
            <input type="text" class="form-control" id="userName" name="nama_users" required autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail : </label>
            <input type="email" class="form-control" id="email" placeholder="Contoh : contoh@gmail.com" name="email" required autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password : </label>
            <input type="password" class="form-control" id="password" name="password" required autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="password2" class="form-label">Konfirmasi password : </label>
            <input type="password" class="form-control" id="password2" name="password2" required autocomplete="off">
        </div>
        <button type="submit" name="register">Sign UP</button>
    </form>
</body>

</html>