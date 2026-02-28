<?php
// Koneksi ke DB
$conn = mysqli_connect("localhost", "root", "", "e_commerce");


function query($query) {
    global $conn;
    $result =  mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function filter_dan_harga ($keyword, $merek, $sort_harga) {
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


?>