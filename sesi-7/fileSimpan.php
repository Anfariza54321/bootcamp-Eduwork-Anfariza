<?php
// 1. LOGIKA PERSIAPAN (Dapur)
// Kita cek apakah data sudah dikirim via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Ambil data teks dari form
    $nama_sepatu = $_POST['name_input'];
    $deskripsi   = $_POST['deskripsi_input'];
    $merek       = $_POST['merek_select'];
    $harga       = $_POST['price_input'];
    $jumlah      = $_POST['total_input'];

    // Ambil data gambar
    $nama_file_asli = $_FILES['gambar_input']['name'];
    $lokasi_temp    = $_FILES['gambar_input']['tmp_name'];

    // Tentukan folder tujuan (Pastikan folder 'uploads' sudah Anda buat!)
    $folder_tujuan = "uploads/" . $nama_file_asli;

    // PINDAHKAN FILE: Dari tempat sementara ke folder proyek Anda
    move_uploaded_file($lokasi_temp, $folder_tujuan);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hasil Simpan Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        <div class="card" style="width: 18rem;">
            <img src="<?php echo $folder_tujuan; ?>" class="card-img-top" alt="Gambar Sepatu">

            <div class="card-body">
                <h5 class="card-title"><?php echo $nama_sepatu; ?></h5>
                <p class="card-text">Deskripsi: <?php echo $deskripsi; ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Merek: <?php echo $merek; ?></li>
                <li class="list-group-item">Harga: Rp <?php echo number_format($harga, 0, ',', '.'); ?></li>
                <li class="list-group-item">Jumlah: <?php echo $jumlah; ?></li>
            </ul>
        </div>
        <a href="index.php" class="btn btn-primary mt-3">Kembali</a>
    </div>

</body>

</html>