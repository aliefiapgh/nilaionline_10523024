<?php
include ('../koneksi/koneksi.php');

$nip = $_GET["nip"];
$editDosen = "SELECT * FROM dosen WHERE nip = '$nip'";
$resultDosen = mysqli_query($koneksi, $editDosen);
$dataDosen = mysqli_fetch_array($resultDosen);
?>

<h3>EDIT DATA DOSEN</h3>
<br /><br /><br />

<?php
if (!isset($_POST['submit'])) {
?>

<form enctype="multipart/form-data" method="post">
    <table width="100%" border="0">
        <tr>
            <td width="27%">NIP</td>
            <td width="4%">:</td>
            <td width="69%"><input type="text" name="nip" size="30" value="<?php echo $dataDosen[0] ?>" readonly="readonly"></td>
        </tr>
        <tr>
            <td>NAMA DOSEN</td>
            <td>:</td>
            <td><input name="nama" type="text" id="nama" size="30" value="<?php echo $dataDosen[1] ?>" /></td>
        </tr>
        <tr>
            <td>KODE MATKUL</td>
            <td>:</td>
                <td>
                   <input type="text" id="kd" name="kode_mtkul" size="30" value="<?php echo $dataDosen[2]?>">
                </td>
        </tr>
        <tr>
            <td>PASSWORD</td>
            <td>:</td>
            <td><input name="password" type="text" id="password" size="30" value="<?php echo $dataDosen[3] ?>"></td>
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
    $nip                    = $_POST["nip"];
    $nama                   = $_POST["nama"];
    $kode_mtkul             = $_POST["kode_mtkul"];
    $password               = md5 ($_POST["password"]);

    // Input data nilaii
    $updateDosen = "UPDATE dosen SET nama='$nama', kode_mtkul='$kode_mtkul', password='$password' WHERE nip='$nip'";
    $queryDosen = mysqli_query($koneksi, $updateDosen);

    if ($queryDosen) {
        echo "<script>alert('Data Dosen Berhasil Diubah !');</script>";
        echo "<script type='text/javascript'>window.location = 'dosenView.php';</script>";
    }
    else 
    {
        echo "<script>alert('Data Dosen Gagal Diubah !');</script>";
        echo "<script type='text/javascript'>window.location = 'dosenView.php';</script>";
    }
}
?>
<a href="dosenView.php">&raquo:KEMBALI</a>

