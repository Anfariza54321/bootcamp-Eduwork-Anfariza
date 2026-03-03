<?php

session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require __DIR__ . '/functions.php';

$produk = query("SELECT * FROM products");

// Tombol filter diklik
if (isset($_POST["filter"])) {
    $produk = filter_dan_harga($_POST["keyword"], $_POST["merek"], $_POST["sort_harga"]);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Bootstrap 5 -->
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

        form button {
            background-color: #70908b !important;
        }

        form button:hover {
            background: #07484a !important;
        }

        .navbar {
            background-color: transparent !important;
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

        h1 {
            color: #07484a !important;
        }

        .card img {
            transition: 0.9s ease;
        }

        .card img:hover {
            transform: scale(1.1);
            box-shadow: 5px 8px 10px rgba(0, 0, 0, 0.5);
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

        <div class="container d-flex flex-column justify-content-center align-items-center">
            <h1 class="py-5 fw-bold">Choose your favourite <span>shoes!</span></h1>

            <div class="container my-3">
                <form action="" method="post" class="mb-3">
                    <div class="row g-2 mb-4 align-items-end">
                        <div class="col-4 col-md-3">
                            <input type="text" class="form-control border-0 rounded p-2" placeholder="Search....." name="keyword" autofocus autocomplete="off">
                        </div>
                        <div class="col-3 col-md-3">
                            <select class="form-select" name="merek" aria-label="Default select example">
                                <option value="" selected>Open this select Merek</option>
                                <option value="Adidas">Adidas</option>
                                <option value="Nike">Nike</option>
                                <option value="Reebok">Reebok</option>
                                <option value="Aerostreet">Aerostreet</option>
                                <option value="Vans">Vans</option>
                                <option value="Puma">Puma</option>
                                <option value="Ortuseight">Ortuseight</option>
                            </select>
                        </div>
                        <div class="col-3 col-md-3">
                            <select class="form-select" aria-label="Default select example" name="sort_harga">
                                <option value="ASC" selected>Open this select Category</option>
                                <option value="ASC">Harga Terendah</option>
                                <option value="DESC">Harga Tertinggi</option>
                            </select>
                        </div>
                        <div class="container col-2 col-md-2">
                            <button type="submit" name="filter" class="btn btn-dark w-100 border-0 fw-bold">Filter</button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="d-flex flex-row flex-wrap gap-3" style=" object-fit: cover;">
                <?php foreach ($produk as $row) : ?>
                    <form action="cartProcess.php" method="post">
                        <div class="card mb-3" style="width: 18rem;">
                            <img src="img/<?= $row["gambar"]; ?>" class="card-img-top border border-success border-3" style="height: 300px;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row["nama_produk"]; ?></h5>
                                <p class="card-text"><?= $row["deskripsi"]; ?></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><?= $row["merek"]; ?></li>
                                <li class="list-group-item">Rp. <?= number_format($price = $row["harga"], 0, ',', '.'); ?></li>
                            </ul>
                            <div class="card-body">
                                <input type="hidden" name="products_id" value="<?= $row['products_id']; ?>">
                                <input type="hidden" name="total" value="<?= $row['harga']; ?>">
                                <input type="number" name="quantity" value="1" min="1">
                                <button class="card-link btn btn-success" type="submit" name="add_to_cart">Add To Cart.</button>
                            </div>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>