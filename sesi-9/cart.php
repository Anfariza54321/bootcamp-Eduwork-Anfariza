<?php
session_start();
require 'functions.php';

// 1. Ambil ID user dari session (pastikan namanya sesuai, di cartProcess Anda pakai $_SESSION["login"])
// Ganti query lama Anda dengan ini
$id_user = $_SESSION["id"]; // Pastikan ini mengambil ID user yang sedang login

$query = "SELECT orders.*, users.nama_users, products.nama_produk 
          FROM orders 
          JOIN users ON orders.users_id = users.users_id 
          JOIN products ON orders.products_id = products.products_id 
          WHERE orders.users_id = $id_user";

$keranjang = query($query);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Bootstrap 5 Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <style>
        .table thead th {
            background-color: #07484a !important;
            color: white !important;
        }

        body {
            background-color: #c4c4c4 !important;
            font-family: "Lexend Deca", sans-serif;
        }

        .navbar {
            background: transparent !important;
        }

        .nav-item a {
            color: #70908b !important;
            transition: 0.3 ease;
        }

        .nav-item a:hover {
            color: #07484a !important;
        }

        .navbar-brand {
            color: #07484a !important;
        }

        .btn-secondary {
            background-color: #70908b !important;
            transition: 0.3 ease;
        }
        .btn-secondary:hover {
            background-color: #07484a !important;
        }
    </style>
</head>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#">Anfariza'S</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto fs-5">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Setting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">
                                <h3><i class="bi bi-cart4"></i></h3>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container table-responsive py-5">
            <table class="table text-center table-bordered border-success table-hover align-middle">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>Nama</th>
                        <th>Nama Produk</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Tanggal Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($keranjang as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td>
                                <a class="btn btn-danger" href="delete.php?products_id=<?= $row["orders_id"]; ?>&tipe=keranjang">Delete</a>
                            </td>
                            <td><?= htmlspecialchars($row["nama_users"]); ?></td>

                            <td><?= htmlspecialchars($row["nama_produk"]); ?></td>

                            <td><?= $row["quantity"]; ?></td>
                            <td>Rp. <?= number_format($row["total"], 0, ',', '.'); ?></td>
                            <td><?= $row["tanggal_dibuat"]; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form action="transactions.php" method="post" class="mt-4">
                <div class="mb-3">
                    <label>Nomor Telepon:</label>
                    <input type="number" name="phone" class="form-control w-50" required>
                </div>
                <button type="submit" name="checkout" class="btn btn-secondary">Checkout Sekarang</button>
            </form>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>