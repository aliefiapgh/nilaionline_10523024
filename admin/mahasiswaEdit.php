<?php
include ('../koneksi/koneksi.php');

$getNim = $_GET["nim"];
$editMhs = "SELECT * FROM mahasiswa WHERE nim = '$getNim'";
$resultMhs = mysqli_query($koneksi, $editMhs);
$dataMhs = mysqli_fetch_array($resultMhs);
?>

<h3>EDIT DATA MAHASISWA</h3>
<br /><br /><br />

<?php
if (!isset($_POST['submit'])) {
?>

<form enctype="multipart/form-data" method="post">
    <table width="100%" border="0">
        <tr>
            <td width="27%">NIM</td>
            <td width="4%">:</td>
            <td width="69%"><input type="text" name="nim" size="30" value="<?php echo $dataMhs[0] ?>" readonly="readonly"></td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td>:</td>
            <td><input name="nama" type="text" id="nama" size="30" value="<?php echo $dataMhs[1] ?>" /></td>
        </tr>
        <tr>
            <td>JENIS KELAMIN</td>
            <td>:</td>
            <td>
                <label>
                    <input type="radio" name="jk" value="Laki-Laki" id="RadioGroup1_0" checked="checked">
                    Laki-Laki
                </label>
                <label>
                    <input type="radio" name="jk" value="Perempuan" id="RadioGroup1_1">
                    Perempuan
                </label>
            </td>
        </tr>
    </tr>
<tr>
    <td height="50">JURUSAN</td>
    <td>:</td>
    <td><label>
        <select name="jurusan">
            <option value="<?php echo $dataMhs[3] ?>"><?php echo $dataMhs[3] ?></option>
            <option value="">--PILIH--</option>
            <option value="Sistem Informasi">SISTEM INFORMASI</option>
            <option value="Teknik Informatika">TEKNIK INFORMATIKA</option>
            <option value="Teknik Komputer">TEKNIK KOMPUTER</option>
        </select>
    </label></td>
</tr>
<tr>
    <td>PASSWORD</td>
    <td>:</td>
    <td><input name="password" type="text" id="password" size="30" value="<?php echo $dataMhs[4] ?>"></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $jk = $_POST["jk"];
    $jurusan = $_POST["jurusan"];
    $password = md5($_POST["password"]);

    // Input Data Mahasiswa
    $updateMhs = "UPDATE mahasiswa SET nama='$nama', jk='$jk', jurusan='$jurusan', password='$password' WHERE nim='$nim'";

    $queryMhs = mysqli_query($koneksi, $updateMhs);

    if ($queryMhs) {
        echo "<script>alert('Data Berhasil Diubah !');</script>";
        echo "<script type='text/javascript'>window.location = 'mahasiswaView.php';</script>";
    }
    else 
    {
        echo "<script>alert('Data Gagal Diubah !');</script>";
        echo "<script type='text/javascript'>window.location = 'mahasiswaView.php';</script>";
    }
}
?>
<a href="mahasiswaView.php">&raquo:KEMBALI</a>

