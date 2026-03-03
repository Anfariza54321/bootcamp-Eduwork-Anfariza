<?php
// Koneksi ke DB
$conn = mysqli_connect("localhost", "root", "", "e_commerce");


function query($query)
{
    global $conn;
    $result =  mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function filter_dan_harga($keyword, $merek, $sort_harga)
{
    $order = ($sort_harga == 'DESC') ? 'DESC' : 'ASC';

    $query = "SELECT * FROM products
                WHERE 1=1";
    // Titik sebelum = adalah pemanggilan variabel $query = "SELECT * FROM products WHERE 1=1" (contoh = $query = $query . "AND.....")
    if (!empty($keyword)) {
        $query .= " AND (nama_produk LIKE '%$keyword%' OR merek LIKE '%$keyword%') ";
    }
    if (!empty($merek)) {
        $query .= " AND merek = '$merek'";
    }

    $query .= " ORDER BY harga $order";

    return query($query);
}

function add($item)
{
    global $conn;

    // Pastikan kunci array sesuai dengan atribut 'name' di HTML
    $nama_produk = mysqli_real_escape_string($conn, $item["name_produk"]);

    // Konversi ke integer, jika kosong maka jadi 0
    $harga       = (int)$item["harga"];
    $stok        = (int)$item["jumlah"];

    $deskripsi   = mysqli_real_escape_string($conn, $item["deskripsi"] ?? "");

    $merek       = mysqli_real_escape_string($conn, $item["merek"] ?? "");

    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    // Validasi sederhana: Jangan lanjut jika nama produk kosong
    if (empty($nama_produk)) return 0;

    $query = "INSERT INTO products (nama_produk, harga, deskripsi, stok, gambar, merek)
            VALUES ('$nama_produk', $harga, '$deskripsi', $stok, '$gambar', '$merek')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapusProdukKatalog($id)
{
    global $conn;
    // 1. Hapus dulu referensi di tabel orders (mencegah Foreign Key constraint error)
    mysqli_query($conn, "DELETE FROM orders WHERE products_id = $id");

    // 2. Hapus produknya dari tabel products
    mysqli_query($conn, "DELETE FROM products WHERE products_id = $id");

    return mysqli_affected_rows($conn);
}

function hapusDataOrders($id)
{
    global $conn;
    // Sesuaikan nama kolom Primary Key di tabel orders Anda (misal id_pesanan)
    mysqli_query($conn, "DELETE FROM orders WHERE orders_id = $id");
    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>
        alert ('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }

    $ekstensiGambarValid = ['.jpg', '.jpeg', '.png', '.webp'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
        <script>
        alert ('Yang anda upload bukan gambar!');
        </script>";
        return false;
    }

    if ($ukuranFile > 1000000) {
        echo "
        <script>
        alert ('Ukuran gambar terlalu besar!');
        </script>";
        return false;
    }


    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function update($item)
{
    global $conn;

    $id = $item["products_id"];
    // Pastikan kunci array sesuai dengan atribut 'name' di HTML
    $nama_produk = mysqli_real_escape_string($conn, $item["name_produk"]);

    // Konversi ke integer, jika kosong maka jadi 0
    $harga       = (int)$item["harga"];
    $stok        = (int)$item["jumlah"];

    $deskripsi   = mysqli_real_escape_string($conn, $item["deskripsi"] ?? "");

    $merek       = mysqli_real_escape_string($conn, $item["merek"] ?? "");
    $gambarLama  =  htmlspecialchars($item["gambarLama"] ?? "");

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    // var_dump($gambar);
    // die;
    if (!$gambar) {
        return false;
    }

    $query = "UPDATE products SET 
                nama_produk = '$nama_produk',
                harga = '$harga',
                stok = '$stok',
                deskripsi = '$deskripsi',
                merek = '$merek',
                gambar = '$gambar'
                WHERE products_id = $id
                ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function registrasi ($data) {
    global $conn;

    $nama = strtolower(stripslashes($data["nama_users"]));
    $email = mysqli_real_escape_string($conn, $data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query ($conn, "SELECT email FROM users WHERE email = '$email'");

    if(mysqli_fetch_assoc($result)) {
        echo "
        <script>
        alert ('E-mail sudah terdaftar!');
        </script>";
        return false;
    }

    if ($password !== $password2) {
        echo "
        <script>
        alert ('Konfirmasi Password salah!');
        </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users (nama_users, email, password)  VALUES ('$nama', '$email', '$password')");

    return mysqli_affected_rows($conn);
}

function addToCart($data)
{
    global $conn;

    // Gunakan $data['key'] bukan $_POST['key']
    $users_id    = $data["users_id"];
    $products_id = $data["products_id"];
    $quantity    = $data["quantity"];
    $total       = $data["total"];

    $query = "INSERT INTO orders (users_id, products_id, quantity, total) 
              VALUES ('$users_id', '$products_id', '$quantity', '$total')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}