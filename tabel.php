<?php
// Konfigurasi database
$host = "localhost";
$user = "root";
$pass = "";
$db = "pesanan";

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Query untuk memeriksa apakah tabel ada
$checkTable = mysqli_query($koneksi, "SHOW TABLES LIKE 'pesanan'");
if (mysqli_num_rows($checkTable) == 0) {
    die("Error: Tabel 'pesanan' tidak ditemukan");
}

// Query untuk mengambil data
$result = mysqli_query($koneksi, "SELECT * FROM pesanan");

// Cek error query
if (!$result) {
    die("Error: " . mysqli_error($koneksi));
}

echo "<h2>DAFTAR PESANAN</h2>";

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Telepon</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
        </tr>";

    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>".$no."</td>
            <td>".htmlspecialchars($row['Nama'] ?? '-')."</td>
            <td>".htmlspecialchars($row['Telepon'] ?? '-')."</td>
            <td>".htmlspecialchars($row['Produk'] ?? '-')."</td>
            <td>".htmlspecialchars($row['Jumlah'] ?? '-')."</td>
            <td>".htmlspecialchars($row['Keterangan'] ?? '-')."</td>
        </tr>";
        $no++;
    }
} else {
    echo "<p>Belum ada data pesanan</p>";
}

// Tutup koneksi
mysqli_close($koneksi);
?>