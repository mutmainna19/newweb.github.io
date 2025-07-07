<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "pesanan";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama    = $_POST['nama'] ?? '';
    $telepon = $_POST['telepon'] ?? '';
    $produk  = $_POST['produk'] ?? '';
    $jumlah  = (int) ($_POST['jumlah'] ?? 0);

    // Tentukan keterangan
    if ($produk == "Laptop" && $jumlah >= 5) {
        $keterangan = "Butuh konfirmasi";
    } else {
        $keterangan = "Langsung diproses";
    }

    // Gunakan prepared statement untuk keamanan
    $stmt = mysqli_prepare($koneksi, "INSERT INTO pesanan (nama, telepon, produk, jumlah, keterangan) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssis", $nama, $telepon, $produk, $jumlah, $keterangan);

    if (mysqli_stmt_execute($stmt)) {
        echo "Data berhasil disimpan. <a href='tabel.php'>Lihat Pesanan</a>";
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($koneksi);
?>
