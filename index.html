<?php
include 'koneksi.php';

// Proses tambah siswa baru
if (isset($_POST['daftar'])) {
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $tempat = $_POST['tempat_lahir'];
    $tanggal = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    mysqli_query($conn, "INSERT INTO calon_siswa (nama, nisn, tempat_lahir, tanggal_lahir, alamat, no_hp)
                         VALUES ('$nama', '$nisn', '$tempat', '$tanggal', '$alamat', '$no_hp')");
    header("Location: index.php");
    exit;
}

// Tambah pendaftaran
if (isset($_POST['simpan_pendaftaran'])) {
    $id_siswa = $_POST['id_siswa'];
    $tanggal = $_POST['tanggal_pendaftaran'];
    $jalur = $_POST['jalur_pendaftaran'];
    mysqli_query($conn, "INSERT INTO pendaftaran (id_siswa, tanggal_pendaftaran, jalur_pendaftaran) 
                         VALUES ('$id_siswa', '$tanggal', '$jalur')");
    header("Location: index.php");
    exit;
}

// Tambah hasil seleksi
if (isset($_POST['simpan_hasil'])) {
    $id_siswa = $_POST['id_siswa'];
    $status = $_POST['status'];
    mysqli_query($conn, "INSERT INTO hasil_seleksi (id_siswa, status) VALUES ('$id_siswa', '$status')");
    header("Location: index.php");
    exit;
}

// Hapus data
if (isset($_GET['hapus_siswa'])) {
    mysqli_query($conn, "DELETE FROM calon_siswa WHERE id_siswa = " . $_GET['hapus_siswa']);
    header("Location: index.php");
    exit;
}
if (isset($_GET['hapus_pendaftaran'])) {
    mysqli_query($conn, "DELETE FROM pendaftaran WHERE id_pendaftaran = " . $_GET['hapus_pendaftaran']);
    header("Location: index.php");
    exit;
}
if (isset($_GET['hapus_hasil'])) {
    mysqli_query($conn, "DELETE FROM hasil_seleksi WHERE id = " . $_GET['hapus_hasil']);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Penerimaan Siswa</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        h2, h3 { background: #f2f2f2; padding: 10px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background: #eee; }
        form div { margin-bottom: 10px; }
        a { margin: 0 5px; }
    </style>
     <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
</head>
<body>

<h2>Form Pendaftaran Siswa Baru</h2>
<form method="POST" action="">
    <div>Nama: <input type="text" name="nama" required></div>
    <div>NISN: <input type="text" name="nisn" required></div>
    <div>Tempat Lahir: <input type="text" name="tempat_lahir" required></div>
    <div>Tanggal Lahir: <input type="text" name="tanggal_lahir" id="tanggal_lahir" required></div>
    <div>Alamat: <input type="text" name="alamat" required></div>
    <div>No HP: <input type="text" name="no_hp" required></div>
    <button type="submit" name="daftar">Daftar</button>
</form>
<script>
$(function() {
    $("#tanggal_lahir").datepicker({ dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: "1950:2030" });
    $("input[name='tanggal_pendaftaran']").datepicker({ dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true });
});
</script>
<h2>Data Calon Siswa</h2>
<table>
<tr><th>ID</th><th>Nama</th><th>NISN</th><th>Tempat Lahir</th><th>Tanggal Lahir</th><th>Alamat</th><th>No HP</th><th>Aksi</th></tr>
<?php
$siswa = mysqli_query($conn, "SELECT * FROM calon_siswa");
while($row = mysqli_fetch_assoc($siswa)) {
?>
<tr>
    <td><?= $row['id_siswa'] ?></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['nisn'] ?></td>
    <td><?= $row['tempat_lahir'] ?></td>
    <td><?= $row['tanggal_lahir'] ?></td>
    <td><?= $row['alamat'] ?></td>
    <td><?= $row['no_hp'] ?></td>
    <td>
        <a href="editsiswa.php?id=<?= $row['id_siswa'] ?>">Edit</a>
        <a href="?hapus_siswa=<?= $row['id_siswa'] ?>" onclick="return confirm('Hapus siswa ini?')">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>

<h2>Data Pendaftaran</h2>
<table>
<tr><th>ID</th><th>Nama</th><th>Tanggal</th><th>Jalur</th><th>Aksi</th></tr>
<?php
$pendaftaran = mysqli_query($conn, "SELECT p.id_pendaftaran, cs.nama, p.tanggal_pendaftaran, p.jalur_pendaftaran 
    FROM pendaftaran p JOIN calon_siswa cs ON p.id_siswa = cs.id_siswa");
while($row = mysqli_fetch_assoc($pendaftaran)) {
?>
<tr>
    <td><?= $row['id_pendaftaran'] ?></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['tanggal_pendaftaran'] ?></td>
    <td><?= $row['jalur_pendaftaran'] ?></td>
    <td>
    <a href="edit_pendaftaran.php?id=<?= $row['id_pendaftaran'] ?>">Edit</a>
    <a href="?hapus_pendaftaran=<?= $row['id_pendaftaran'] ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
 </td>  
</tr>
<?php }?>
</table>

<h3>Form Tambah Pendaftaran</h3>
<form method="POST" action="">
    <label>Nama Siswa:</label>
    <select name="id_siswa" required>
        <option value="">-- Pilih --</option>
        <?php
        $cs = mysqli_query($conn, "SELECT * FROM calon_siswa");
        while($r = mysqli_fetch_assoc($cs)) {
            echo "<option value='{$r['id_siswa']}'>{$r['nama']}</option>";
        }
        ?>
    </select><br><br>
    <label>Tanggal Pendaftaran:</label>
    <input type="text" name="tanggal_pendaftaran" required><br><br>
    <label>Jalur Pendaftaran:</label>
    <select name="jalur_pendaftaran" required>
        <option value="Reguler">Reguler</option>
        <option value="Prestasi">Prestasi</option>
        <option value="Afirmasi">Afirmasi</option>
    </select><br><br>
    <button type="submit" name="simpan_pendaftaran">Simpan</button>
</form>

<h2>Data Hasil Seleksi</h2>
<table>
<tr><th>ID</th><th>Nama</th><th>NISN</th><th>Status</th><th>Aksi</th></tr>
<?php
$hasil = mysqli_query($conn, "SELECT hs.id, cs.nama, cs.nisn, hs.status 
    FROM hasil_seleksi hs JOIN calon_siswa cs ON hs.id_siswa = cs.id_siswa");
while($row = mysqli_fetch_assoc($hasil)) {
?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['nisn'] ?></td>
    <td><?= $row['status'] ?></td>
    <td>
        <a href="edit_hasil.php?id=<?= $row['id'] ?>">Edit</a>
        <a href="?hapus_hasil=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus hasil?')">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>

<h3>Form Tambah Hasil Seleksi</h3>
<form method="POST" action="">
    <label>Nama Siswa:</label>
    <select name="id_siswa" required>
        <option value="">-- Pilih --</option>
        <?php
        $pilih = mysqli_query($conn, "SELECT * FROM calon_siswa");
        while($p = mysqli_fetch_assoc($pilih)) {
            echo "<option value='{$p['id_siswa']}'>{$p['nama']}</option>";
        }
        ?>
    </select><br><br>
    <label>Status:</label>
    <select name="status" required>
        <option value="Lulus">Lulus</option>
        <option value="Tidak Lulus">Tidak Lulus</option>
    </select><br><br>
    <button type="submit" name="simpan_hasil">Simpan</button>
</form>

<hr>
<h2>Cek Status Pendaftaran & Hasil Seleksi</h2>
<input type="text" id="cariNama" placeholder="Ketik nama calon siswa..." style="padding:8px; width:300px;" />
<div id="hasilPencarian" style="margin-top: 15px;"></div>
<script src="script.js"></script>
</body>
</html>

