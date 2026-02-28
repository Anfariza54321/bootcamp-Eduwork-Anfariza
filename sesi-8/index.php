<?php

require 'functions.php';

$produk = query("SELECT * FROM products");

// Tombol filter diklik
if (isset ($_POST ["filter"])) {
    $produk = filter_dan_harga ($_POST["keyword"], $_POST["merek"], $_POST["sort_harga"]);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySql to PHP</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

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
    </style>

</head>

<body>
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <h1 class="py-5 fw-bold">Daftar Sepatu</h1>

        <div class="container my-3">
            <form action="" method="post" class="mb-3">
                <div class="row g-2 justify-content-center align-items-end">
                    <div class="col-4">
                        <input type="text" class="form-control border-0 rounded p-2" placeholder="Search....." name="keyword" autofocus autocomplete="off">
                    </div>
                    <div class="col-3">
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
                    <div class="col-3">
                        <select class="form-select" aria-label="Default select example" name="sort_harga">
                            <option value="ASC" selected>Open this select Category</option>
                            <option value="ASC">Harga Terendah</option>
                            <option value="DESC">Harga Tertinggi</option>
                        </select>
                    </div>
                    <div class="container col-2">
                        <button type="submit" name="filter" class="btn btn-dark w-100">Filter</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="container table-responsive">
            <table class="table text-center table-bordered border-success table-hover align-middle" id="tableSepatu">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Aksi</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Stok</th>
                        <th>Tanggal Masuk</th>
                        <th>Gambar</th>
                        <th>Merek</th>
                    </tr>
                </thead>
                <?php $i = 1; ?>
                <?php foreach ($produk as $row) : ?>
                    <tbody>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><a class="btn btn-success" href="">Update</a> | <a class="btn btn-danger" href="">Delete</a></td>
                            <td><?= $row["nama_produk"]; ?></td>
                            <td>Rp. <?= number_format($price = $row["harga"], 0, ',', '.'); ?></td>
                            <td></td>
                            <td><?= $row["stok"]; ?></td>
                            <td><?= $row["tanggal_dibuat"]; ?></td>
                            <td><img src="img/<?php echo $row["gambar"]; ?>" width="100" alt=""></td>
                            <td><?= $row["merek"]; ?></td>
                        </tr>
                    </tbody>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>