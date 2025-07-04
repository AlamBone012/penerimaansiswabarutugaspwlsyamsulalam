<?php
include "koneksi.php";

// Proses simpan jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama         = $_POST['nama'];
    $nisn         = $_POST['nisn'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir= $_POST['tanggal_lahir'];
    $alamat       = $_POST['alamat'];
    $no_hp        = $_POST['no_hp'];

    $sql = "INSERT INTO calon_siswa (nama, nisn, tempat_lahir, tanggal_lahir, alamat, no_hp)
            VALUES ('$nama', '$nisn', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$no_hp')";
    $query = mysqli_query($conn, $sql);
    
    header("Location: tampilsiswa.php");
    exit;

    if ($query) {
        echo "<p>✅ Data calon siswa berhasil ditambahkan!</p>";
    } else {
        echo "<p>❌ Gagal menambahkan data: " . mysqli_error($koneksi) . "</p>";
    }
}
?>

<h3>Form Tambah Calon Siswa</h3>
<form method="POST" action="">
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br><br>

    <label>NISN:</label><br>
    <input type="text" name="nisn" required><br><br>

    <label>Tempat Lahir:</label><br>
    <input type="text" name="tempat_lahir" required><br><br>

    <label>Tanggal Lahir:</label><br>
    <input type="date" name="tanggal_lahir" required><br><br>

    <label>Alamat:</label><br>
    <textarea name="alamat" required></textarea><br><br>

    <label>No HP:</label><br>
    <input type="text" name="no_hp" required><br><br>

    <input type="submit" value="Simpan">
</form>
