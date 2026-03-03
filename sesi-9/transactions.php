<?php
session_start();
require 'functions.php';

// Pastikan user sudah login
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}

// ... (setelah session_start dan require functions.php)

if (isset($_POST["checkout"])) {
    $user_id = $_SESSION["id"];
    $phone = $_POST["phone"];

    // Hitung total dengan SUM
    $query_total = "SELECT SUM(total) as total_bayar FROM orders WHERE users_id = '$user_id'";
    $result = mysqli_query($conn, $query_total);
    $data = mysqli_fetch_assoc($result);
    $total_semua = $data['total_bayar'];

    // Insert ke transaksi
    $query_insert = "INSERT INTO transactions (users_id, phone, total, status) 
                     VALUES ('$user_id', '$phone', '$total_semua', 'PENDING')";

    if (mysqli_query($conn, $query_insert)) {
        mysqli_query($conn, "DELETE FROM orders WHERE users_id = '$user_id'");
        echo "<script>alert('Checkout berhasil!'); document.location.href = 'transactions.php';</script>";
    }
}

// Mendefinisikan variabel data_transaksi DI PALING ATAS
$sql = "SELECT transactions.*, users.nama_users 
        FROM transactions 
        JOIN users ON transactions.users_id = users.users_id";
$data_transaksi = query($sql);
?>

<div class="container mt-4">
    <h3>Daftar Transaksi</h3>
    <div class="row g-4">
        <?php if ($data_transaksi) : ?>
            <?php foreach ($data_transaksi as $row) : ?>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title text-primary">ID Transaksi: #<?= $row["transactions_id"]; ?></h5>
                            <hr>
                            <p class="card-text">
                                <strong>Nama:</strong> <?= $row["nama_users"]; ?><br>
                                <strong>Telepon:</strong> <?= $row["phone"]; ?><br>
                                <strong>Total:</strong> Rp. <?= number_format($row["total"], 0, ',', '.'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Belum ada transaksi.</p>
        <?php endif; ?>
    </div>
</div>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>

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
    </style>
</head>

<body>
    <!-- <div class="row g-4">
        <?php if ($data_transaksi && count($data_transaksi) > 0) : ?>
            <?php foreach ($data_transaksi as $row) : ?>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title">ID Transaksi: #<?= $row["transactions_id"]; ?></h5>
                            <p class="card-text">
                                <strong>Nama:</strong> <?= $row["nama_users"]; ?><br>
                                <strong>Telepon:</strong> <?= $row["phone"]; ?><br>
                                <strong>Total:</strong> Rp. <?= number_format($row["total"], 0, ',', '.'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Belum ada transaksi.</p>
        <?php endif; ?>
    </div> -->
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>