<?php
include "koneksi.php";

if (isset($_GET['nama'])) {
  $nama = mysqli_real_escape_string($conn, $_GET['nama']);

  $cek = mysqli_query($conn, "SELECT * FROM calon_siswa WHERE nama LIKE '%$nama%'");

  if (mysqli_num_rows($cek) == 0) {
    echo "<p style='color:red; font-weight:bold;'>❗ Nama yang Anda cari belum terdaftar sebagai calon siswa.</p>";
  } else {
    $query = "SELECT cs.nama, 
                     IF(p.id_siswa IS NOT NULL, 'Sudah Mendaftar', 'Belum Mendaftar') AS status_daftar,
                     hs.status AS hasil
              FROM calon_siswa cs
              LEFT JOIN pendaftaran p ON cs.id_siswa = p.id_siswa
              LEFT JOIN hasil_seleksi hs ON cs.id_siswa = hs.id_siswa
              WHERE cs.nama LIKE '%$nama%'";

    $result = mysqli_query($conn, $query);

    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<li><b>Nama: " . htmlspecialchars($row['nama']) . "</b><br>";

      if ($row['status_daftar'] === "Sudah Mendaftar") {
        echo "Status Pendaftaran: <span style='color:green;'>Calon siswa telah melakukan proses pendaftaran.</span><br>";
      } else {
        echo "Status Pendaftaran: <span style='color:red;'>Calon siswa belum melakukan proses pendaftaran.</span><br>";
      }

      echo "Hasil Seleksi: ";
      if ($row['hasil'] === "Lulus") {
        echo "<span style='color:green;font-weight:bold;'>Dinyatakan LULUS dan berhak melanjutkan ke tahap berikutnya ✅</span>";
      } elseif ($row['hasil'] === "Tidak Lulus") {
        echo "<span style='color:red;font-weight:bold;'>Dinyatakan TIDAK LULUS ❌</span>";
      } else {
        echo "<span style='color:gray;'>Hasil seleksi belum tersedia untuk calon siswa ini.</span>";
      }

      echo "</li><hr>";
    }
    echo "</ul>";
  }
}
?>
