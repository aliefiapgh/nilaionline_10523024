<?php
include('../koneksi/koneksi.php');

// Ambil parameter NIM dan NIP dari URL
$nim = $_GET['nim'];
$nip = $_GET['nip'];

// Query untuk mendapatkan data nilai berdasarkan NIM dan NIP
$query = "SELECT nilai.nim, nilai.nip, mahasiswa.nama AS mahasiswa, dosen.nama AS dosen, nilai.tugas, nilai.uts, nilai.uas
          FROM nilai
          JOIN mahasiswa ON nilai.nim = mahasiswa.nim
          JOIN dosen ON nilai.nip = dosen.nip
          WHERE nilai.nim = '$nim' AND nilai.nip = '$nip'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

// Jika data ditemukan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil nilai yang diinputkan
    $tugas = $_POST['tugas'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];

    // Update data nilai
    $update_query = "UPDATE nilai SET tugas = '$tugas', uts = '$uts', uas = '$uas' WHERE nim = '$nim' AND nip = '$nip'";
    if (mysqli_query($koneksi, $update_query)) {
        echo '<script>alert("Data nilai berhasil diperbarui!"); window.location.href="nilaiView.php";</script>';
    } else {
        echo '<script>alert("Terjadi kesalahan saat mengupdate data nilai.");</script>';
    }
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

        <h3>Edit Data Nilai</h3>
        <form method="post">
            <table border="1">
                <tr>
                    <td>NIM</td>
                    <td><input type="text" name="nim" value="<?php echo $data['nim']; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Nama Mahasiswa</td>
                    <td><input type="text" name="mahasiswa" value="<?php echo $data['mahasiswa']; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Nama Dosen</td>
                    <td><input type="text" name="dosen" value="<?php echo $data['dosen']; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Nilai Tugas</td>
                    <td><input type="number" name="tugas" value="<?php echo $data['tugas']; ?>" required></td>
                </tr>
                <tr>
                    <td>Nilai UTS</td>
                    <td><input type="number" name="uts" value="<?php echo $data['uts']; ?>" required></td>
                </tr>
                <tr>
                    <td>Nilai UAS</td>
                    <td><input type="number" name="uas" value="<?php echo $data['uas']; ?>" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Update Nilai" class="buttonadm">
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
