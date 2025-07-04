<?php
include "koneksi.php";

// Cek apakah parameter id dikirim dan valid
$id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    echo "❌ ID tidak valid atau tidak ditemukan di URL.";
    exit;
}

// Ambil data calon siswa
$sql = "SELECT * FROM calon_siswa WHERE id_siswa = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "❌ Data calon siswa tidak ditemukan.";
    exit;
}

// Proses update saat form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama          = $_POST['nama'];
    $nisn          = $_POST['nisn'];
    $tempat_lahir  = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat        = $_POST['alamat'];
    $no_hp         = $_POST['no_hp'];

    $update = "UPDATE calon_siswa SET 
                nama = '$nama', 
                nisn = '$nisn',
                tempat_lahir = '$tempat_lahir',
                tanggal_lahir = '$tanggal_lahir',
                alamat = '$alamat', 
                no_hp = '$no_hp' 
               WHERE id_siswa = '$id'";

    $hasil = mysqli_query($conn, $update);

    if ($hasil) {
        header("Location: index.php");
        exit;
    } else {
        echo "<p>❌ Gagal update: " . mysqli_error($conn) . "</p>";
    }
}
?>

<h3>Edit Data Calon Siswa</h3>
<form method="POST" action="">
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br><br>

    <label>NISN:</label><br>
    <input type="text" name="nisn" value="<?= $data['nisn'] ?>" required><br><br>

    <label>Tempat Lahir:</label><br>
    <input type="text" name="tempat_lahir" value="<?= $data['tempat_lahir'] ?>" required><br><br>

    <label>Tanggal Lahir:</label><br>
    <input type="date" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>" required><br><br>

    <label>Alamat:</label><br>
    <textarea name="alamat" required><?= $data['alamat'] ?></textarea><br><br>

    <label>No HP:</label><br>
    <input type="text" name="no_hp" value="<?= $data['no_hp'] ?>" required><br><br>

    <input type="submit" value="Update">
</form>
