<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    echo "❌ ID tidak ditemukan.";
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE id_pendaftaran = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "❌ Data tidak ditemukan.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_siswa = $_POST['id_siswa'];
    $tanggal = $_POST['tanggal_pendaftaran'];
    $jalur = $_POST['jalur_pendaftaran'];

    mysqli_query($conn, "UPDATE pendaftaran SET 
        id_siswa = '$id_siswa',
        tanggal_pendaftaran = '$tanggal',
        jalur_pendaftaran = '$jalur'
        WHERE id_pendaftaran = $id");

    header("Location: index.php");
    exit;
}
?>

<h3>Edit Data Pendaftaran</h3>
<form method="POST">
    <label>Nama Siswa:</label>
    <select name="id_siswa" required>
        <?php
        $siswa = mysqli_query($conn, "SELECT * FROM calon_siswa");
        while ($row = mysqli_fetch_assoc($siswa)) {
            $selected = $row['id_siswa'] == $data['id_siswa'] ? "selected" : "";
            echo "<option value='{$row['id_siswa']}' $selected>{$row['nama']}</option>";
        }
        ?>
    </select><br><br>

    <label>Tanggal Pendaftaran:</label>
    <input type="date" name="tanggal_pendaftaran" value="<?= $data['tanggal_pendaftaran'] ?>" required><br><br>

    <label>Jalur Pendaftaran:</label>
    <select name="jalur_pendaftaran" required>
        <option value="Reguler" <?= $data['jalur_pendaftaran'] == 'Reguler' ? 'selected' : '' ?>>Reguler</option>
        <option value="Prestasi" <?= $data['jalur_pendaftaran'] == 'Prestasi' ? 'selected' : '' ?>>Prestasi</option>
        <option value="Afirmasi" <?= $data['jalur_pendaftaran'] == 'Afirmasi' ? 'selected' : '' ?>>Afirmasi</option>
    </select><br><br>

    <input type="submit" value="Simpan Perubahan">
</form>
