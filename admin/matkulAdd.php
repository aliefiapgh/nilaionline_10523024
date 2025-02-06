<?php
    include('../koneksi/koneksi.php');
?>

<h3>TAMBAH DATA MATA KULIAH</h3>
<br/><hr/><br/>
<p>

<?php
    if(!isset($_POST['submit']))
    {
?>
    <form enctype="multipart/form-data" method="post">
        <table width="100%" border="0">
            <tr>
                <td>KODE MATKUL</td>
                <td>:</td>
                <td>
                   <input type="text" id="kode_mtkul" name="kode_mtkul" size="30" placeholder="KODE MATKUL">
                </td>
            </tr>
            <tr>
                <td>NAMA MATKUL</td>
                <td>:</td>
                <td>
                   <input type="text" id="nama_mtkul" name="nama_mtkul" size="30" placeholder="NAMA MATKUL">
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                <input id="submit" name="submit" type="submit" value="TAMBAH"></td>
            </tr>
        </table>
    </form>
    </td>
</tr>

<?php
    }
    else
    {
        $kode_mtkul        =$_POST["kode_mtkul"];
        $nama_mtkul      =$_POST["nama_mtkul"];

        $insertMatkul    ="insert into matakuliah values ('$kode_mtkul','$nama_mtkul')";
        $queryMatkul     = mysqli_query($koneksi, $insertMatkul);

        if($queryMatkul){
            echo "<script>alert('Data Nilai Berhasil Disimpan !') </script>";
            echo "<script type ='text/javascript'>window.location='matkulView.php'</script>"; 
        }
        else {
            echo "<script>alert('Data Nilai Gagal Disimpan !') </script>";
            echo "<script type ='text/javascript'>window.location='matkulView.php'</script>";
        }
    }
?>
<a href="matkulView.php">&raquoKembali</a>
</p>