<?php
include ('../koneksi/koneksi.php');

$kode_mtkul = $_GET["kode_mtkul"];
$delMatkul = "DELETE FROM matakuliah WHERE kode_mtkul='$kode_mtkul'";
$resultMatkul = mysqli_query($koneksi, $delMatkul);

if ($resultMatkul) {
    echo "<script>alert('Data Mata Kuliah Berhasil Dihapus');</script>";
    echo "<script type='text/javascript'>window.location='matkulView.php';</script>";
} else {
    echo "<script>alert('Data Mata Kuliah Gagal Dihapus');</script>";
    echo "<script type='text/javascript'>window.location='matkulView.php';</script>";
}
?>
