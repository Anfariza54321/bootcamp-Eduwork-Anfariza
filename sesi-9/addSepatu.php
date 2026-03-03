<?php

session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

if (isset($_POST["btn_submit"])) {

    if (add($_POST) > 0) {
        echo "
        <script>
        alert ('Data berhasil ditambahkan!');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "
        <script>
        alert ('Data gagal ditambahkan!');
        document.location.href = 'index.php';
        </script>";
    };
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sepatu</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Lexend Deca", sans-serif;
        }

        .form-body {
            background-color: #07484a !important;
        }
    </style>

</head>

<body>
    <div class="form-body container w-50 py-5 my-2 rounded shadow bg-primary-subtle">
        <form action="" method="post" id="formSepatu" enctype="multipart/form-data">
            <h1 class="text-center mb-3 text-light">FORM ADD SEPATU</h1>

            <div class="mb-3">
                <label for="nameInput" class="form-label text-light">Nama Sepatu</label>
                <input type="text" class="form-control" id="nameInput" placeholder="Contoh : Adidas Samba OG" name="name_produk" required autocomplete="off">
                <small id="errorName" style="color: red; font-style:italic;"></small>
            </div>
            <div class="mb-3">
                <label for="priceInput" class="form-label text-light">Harga</label>
                <input type="Number" class="form-control" id="priceInput" placeholder="Contoh : 1500000" name="harga" autocomplete="off">
                <small id="errorPrice" style="color: red; font-style:italic;"></small>
            </div>
            <div class="mb-3">
                <label for="deskripsiInput" class="form-label text-light">Deskripsi</label>
                <textarea class="form-control" id="deskripsiInput" rows="3" name="deskripsi" autocomplete="off"></textarea>
                <small id="errorDeskripsi" style="color: red; font-style:italic;"></small>
            </div>

            <div class="mb-3">
                <label for="totalInput" class="form-label text-light">Jumlah</label>
                <input type="Number" class="form-control" id="totalInput" placeholder="Contoh : 10" name="jumlah" required autocomplete="off">
                <small id="errorTotal" style="color: red; font-style:italic;"></small>
            </div>
            <div class="mb-3">
                <label for="gambarInput" class="form-label text-light">Masukkan Gambar</label>
                <input type="file" class="form-control" id="gambarInput" accept=".jpg, .jpeg" name="gambar">
                <small id="errorGambar" style="color: red; font-style:italic;"></small>
            </div>

            <div class="mb-3">
                <label for="merekSelect" class="form-label text-light">Merek Sepatu</label>
                <select class="form-select text-light" aria-label="Default select example" id="merekSelect" name="merek" required>
                    <option selected>Pilih merek</option>
                    <option>Adidas</option>
                    <option>Nike</option>
                    <option>Vans</option>
                    <option>Reebok</option>
                    <option>Puma</option>
                    <option>Ortuseight</option>
                    <option>Aerostreet</option>
                </select>
                <small id="errorSelect" style="color: red; font-style:italic;"></small>
            </div>

            <div class="d-grid">
                <button class="btn btn-warning mt-3" id="addBtn" name="btn_submit" type="submit">Tambah</button>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>