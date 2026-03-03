<?php

session_start();
require 'functions.php';
// Pastikan koneksi sudah benar
if (isset($_POST["add_to_cart"])) {
    $user_id = $_SESSION["id"];
    $product_id = $_POST["products_id"];
    $quantity = $_POST["quantity"];
    $harga_satuan = $_POST["total"];
    $total = $harga_satuan * $quantity; // Pastikan total dihitung

    // Query untuk memasukkan data
    $query = "INSERT INTO orders (users_id, products_id, quantity, total) 
              VALUES ('$user_id', '$product_id', '$quantity', '$total')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Berhasil ditambah ke keranjang!'); document.location.href = 'cart.php';</script>";
    } else {
        // Tampilkan error jika query gagal
        echo "Error: " . mysqli_error($conn);
    }
}
?>
