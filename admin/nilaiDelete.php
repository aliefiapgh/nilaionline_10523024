<?php
include('../koneksi/koneksi.php');

// Ambil parameter NIM dan NIP dari URL
$nim = $_GET['nim'];
$nip = $_GET['nip'];

// Query untuk menghapus data nilai berdasarkan NIM dan NIP
if (isset($nim) && isset($nip)) {
    $queryDelete = "DELETE FROM nilai WHERE nim = '$nim' AND nip = '$nip'";
    if (mysqli_query($koneksi, $queryDelete)) {
        echo '<script>alert("Data nilai berhasil dihapus!"); window.location.href="nilaiView.php";</script>';
    } else {
        echo '<script>alert("Terjadi kesalahan saat menghapus data nilai."); window.location.href="nilaiView.php";</script>';
    }
} else {
    echo '<script>alert("Parameter tidak lengkap!"); window.location.href="nilaiView.php";</script>';
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>.: Sistem Informasi Nilai Online - Universitas Komputer Indonesia :.</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="../images/logoicon.ico" />
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Kreon:light,regular' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" type="text/css" href="../css/style-sheet.css" />
</head>
<body>
    <header>
        <section class="logo"><a href="#"><img src="../images/logo.png" /></a></section>
        <section class="title">Sistem Informasi Nilai Online <br /> <span>Universitas Komputer Indonesia</span></section>
        <section class="clr" style="text-align: center;">Jl. Dipati Ukur No.112-116, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132</section>
    </header>

    <section id="navigator">
        <ul class="menus">
            <li><a href="./?adm=home">Home</a></li>
            <li><a href="./?adm=mahasiswa">Mahasiswa</a></li>
            <li><a href="./?adm=dosen">Dosen</a></li>
            <li><a href="./?adm=nilai">Nilai</a></li>
            <li><a href="./?adm=logout">Logout</a></li>
        </ul>
    </section>

    <section id="container">
        <br><br><br>

        <h3>Apakah Anda yakin ingin menghapus data nilai?</h3>

        <form method="post">
            <table border="1">
                <tr>
                    <td>NIM</td>
                    <td><input type="text" name="nim" value="<?php echo $nim; ?>" readonly></td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td><input type="text" name="nip" value="<?php echo $nip; ?>" readonly></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Hapus Nilai" class="buttonadm">
                        <a href="nilaiView.php"><input type="button" value="Batal" class="buttonadm"></a>
                    </td>
                </tr>
            </table>
        </form>
    </section>

    <footer>
        <font color="#000">Copyright &copy; 2025 - Universitas Komputer Indonesia <br /> Developed By <a href="#" target="_new">Aliefia Puan Ghifari</a></font>
    </footer>
</body>
</html>
