<?php
include "koneksi.php";

// Pastikan ID dikirim lewat URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Jalankan perintah DELETE
    $sql = "DELETE FROM calon_siswa WHERE id_siswa = '$id'";
    $query = mysqli_query($conn, $sql);

    header("Location: tampilsiswa.php");
    exit;

    if ($query) {
        echo "<p>✅ Data calon siswa berhasil dihapus.</p>";
    } else {
        echo "<p>❌ Gagal menghapus data: " . mysqli_error($conn) . "</p>";
    }
} else {
    echo "<p>❌ ID siswa tidak ditemukan di URL.</p>";
}
?>
