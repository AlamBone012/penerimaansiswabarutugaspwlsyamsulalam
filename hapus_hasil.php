<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM hasil_seleksi WHERE id=$id");
header("Location: tampilsiswa.php");
?>
