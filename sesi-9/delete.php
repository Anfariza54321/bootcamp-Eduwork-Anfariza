<?php
require 'functions.php';

$id = $_GET["products_id"];
$tipe = $_GET["tipe"];

if ($tipe == "keranjang") {
    // Aksi hapus dari keranjang (Tabel orders)
    if (hapusDataOrders($id) > 0) {
        echo "<script>alert('Berhasil dihapus dari keranjang!'); document.location.href = 'cart.php';</script>";
    }
} elseif ($tipe == "katalog") {
    // Aksi hapus dari katalog (Tabel products)
    // Ingat: Anda harus menghapus data di 'orders' dulu jika ada constraint!
    if (hapusProdukKatalog($id) > 0) {
        echo "<script>alert('Produk berhasil dihapus!'); document.location.href = 'home.php';</script>";
    } else {
        echo "<script>alert('Gagal! Produk mungkin masih ada di pesanan.'); document.location.href = 'home.php';</script>";
    }
}
