function hitungTotal() {
  const mie = parseInt(document.getElementById('mie').value) || 0;
  const es = parseInt(document.getElementById('es').value) || 0;
  const pangsit = parseInt(document.getElementById('pangsit').value) || 0;
  const rambutan = parseInt(document.getElementById('rambutan').value) || 0;
  const lumpia = parseInt(document.getElementById('lumpia').value) || 0;
  const keju = parseInt(document.getElementById('keju').value) || 0;

  if (mie < 0 || es < 0 || pangsit < 0 || rambutan < 0 || lumpia < 0 || keju < 0) {
    alert("Jumlah tidak boleh minus!");
    return;
  }

  const total = (mie * 12000) + (es * 8000) + (pangsit * 10000) +
                (rambutan * 15000) + (lumpia * 13000) + (keju * 14000);

  document.getElementById("totalHarga").innerText = "Total Harga: Rp" + total.toLocaleString("id-ID");

  // Simpan total sementara ke localStorage
  localStorage.setItem("totalHarga", total);
}

function lanjutKeHasil() {
  const nama = document.getElementById('nama').value.trim();
  if (nama === "") {
    alert("Nama tidak boleh kosong!");
    return;
  }

  // Simpan nama ke localStorage
  localStorage.setItem("namaPemesan", nama);

  // Pindah ke halaman hasil
  window.location.href = "hasil.html";
}
