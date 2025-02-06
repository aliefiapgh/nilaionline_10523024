<?php
include ('../koneksi/koneksi.php');

$kode_mtkul = $_GET["kode_mtkul"];
$editMatkul = "SELECT * FROM matakuliah WHERE kode_mtkul = '$kode_mtkul'";
$resultMatkul = mysqli_query($koneksi, $editMatkul);
$dataMatkul = mysqli_fetch_array($resultMatkul);
?>

<h3>EDIT DATA MATA KULIAH</h3>
<br /><br /><br />

<?php
if (!isset($_POST['submit'])) {
?>

<form enctype="multipart/form-data" method="post">
    <table width="100%" border="0">
        <tr>
            <td>KODE MATKUL</td>
            <td>:</td>
            <td><input name="kode_mtkul" type="text" id="kode_mtkul" size="30" value="<?php echo $dataMatkul[0] ?>" /></td>
        </tr>
        <tr>
            <td>NAMA MATKUL</td>
            <td>:</td>
            <td><input name="nama_mtkul" type="text" id="nama_mtkul" size="30" value="<?php echo $dataMatkul[1] ?>" /></td>
        </tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input id="submit" name="submit" type="submit" value="UBAH"></td>
</tr>
</table>
</form>

<?php
} else {
    $kode_mtkul                   = $_POST["kode_mtkul"];
    $nama_mtkul                   = $_POST["nama_mtkul"];

    // Input data nilaii
    $updateMatkul = "UPDATE matakuliah SET nama_mtkul='$nama_mtkul' WHERE kode_mtkul='$kode_mtkul'";
    $queryMatkul = mysqli_query($koneksi, $updateMatkul);

    if ($queryMatkul) {
        echo "<script>alert('Data Mata Kuliah Berhasil Diubah !');</script>";
        echo "<script type='text/javascript'>window.location = 'matkulView.php';</script>";
    }
    else 
    {
        echo "<script>alert('Data Mata Kuliah Gagal Diubah !');</script>";
        echo "<script type='text/javascript'>window.location = 'matkulView.php';</script>";
    }
}
?>
<a href="matkulView.php">&raquo:KEMBALI</a>

