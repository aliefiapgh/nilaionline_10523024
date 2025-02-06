<?php
include ('../koneksi/koneksi.php');

$nip = $_GET["nip"];
$delDosen = "DELETE FROM dosen WHERE nip='$nip'";
$resultDosen = mysqli_query($koneksi, $delDosen);

if ($resultDosen) {
    echo "<script>alert('Data Dosen Berhasil Dihapus');</script>";
    echo "<script type='text/javascript'>window.location='dosenView.php';</script>";
} else {
    echo "<script>alert('Data Dosen Gagal Dihapus');</script>";
    echo "<script type='text/javascript'>window.location='dosenView.php';</script>";
}
?>
