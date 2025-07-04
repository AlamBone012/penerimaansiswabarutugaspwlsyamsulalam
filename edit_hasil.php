<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$query = "SELECT hs.*, cs.nama, cs.nisn FROM hasil_seleksi hs 
          JOIN calon_siswa cs ON hs.id_siswa = cs.id_siswa 
          WHERE hs.id = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}

// Proses update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST['status'];
    $update = "UPDATE hasil_seleksi SET status='$status' WHERE id=$id";
    mysqli_query($conn, $update);
    header("Location: index.php");
    exit;
}
?>

<h3>Edit Hasil Seleksi</h3>
<form method="post">
    Nama: <input type="text" value="<?= $data['nama'] ?>" disabled><br><br>
    NISN: <input type="text" value="<?= $data['nisn'] ?>" disabled><br><br>
    Status:
    <select name="status">
        <option value="Lulus" <?= $data['status'] == 'Lulus' ? 'selected' : '' ?>>Lulus</option>
        <option value="Tidak Lulus" <?= $data['status'] == 'Tidak Lulus' ? 'selected' : '' ?>>Tidak Lulus</option>
    </select><br><br>
    <input type="submit" value="Update">
</form>
