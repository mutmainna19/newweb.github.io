<form action="simpan.php" method="POST">
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br><br>

    <label>Nomor Telepon:</label><br>
    <input type="text" name="telepon" required><br><br>

    <label>Produk:</label><br>
    <select name="produk" required>
        <option value="Laptop">Laptop</option>
        <option value="Mouse">Mouse</option>
        <option value="Keyboard">Keyboard</option>
    </select><br><br>

    <label>Jumlah:</label><br>
    <input type="number" name="jumlah" required><br><br>

    <button type="submit">Simpan</button>
</form>
