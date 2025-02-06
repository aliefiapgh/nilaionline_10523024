<?php
include('../koneksi/koneksi.php');

$error = '';
$success = '';

if (isset($_POST['submit'])) {
    $mhs = trim($_POST['mhs']);
    $dosen = trim($_POST['dosen']);
    $tugas = trim($_POST['tugas']);
    $uts = trim($_POST['uts']);
    $uas = trim($_POST['uas']);

    // Validasi input
    if (empty($mhs) || empty($dosen) || empty($tugas) || empty($uts) || empty($uas)) {
        $error = 'Harap isi semua kolom!';
    } else {
        // Simpan data nilai ke database
        $insert_query = "INSERT INTO nilai (nim, nip, tugas, uts, uas) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($koneksi, $insert_query);
        mysqli_stmt_bind_param($stmt, 'sssss', $mhs, $dosen, $tugas, $uts, $uas);

        if (mysqli_stmt_execute($stmt)) {
            $success = 'Nilai berhasil disimpan!';
        } else {
            $error = 'Terjadi kesalahan saat menyimpan data nilai!';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <title>Input Nilai Mahasiswa - Universitas Komputer Indonesia</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../images/logoicon.ico">
    <link rel="stylesheet" href="../css/style-sheet.css"> 
</head>

<body>
    <header>
        <section class="logo"><a href="#"><img src="../images/logo.png" /></a></section>
        <section class="title">Sistem Informasi Nilai Online <br /> 
            <span>UNIVERSITAS KOMPUTER INDONESIA</span>
        </section>
        <section class="clr">
            <center>Jl. Dipati Ukur No.112-116, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132</center>
        </section>
    </header>

    <section id="container">
        <div>
            <center>
                <section id="navigator">
                    <ul class="menus">
                        <h2>INPUT NILAI MAHASISWA</h2>
                    </ul>
                </section>
                <br /><br />

                <?php if (!empty($error)): ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>
                <?php if (!empty($success)): ?>
                    <p style="color: green;"><?php echo $success; ?></p>
                <?php endif; ?>

                <form method="post" class="form-login">
                    <table>
                        <tr>
                            <td>NAMA MAHASISWA</td>
                            <td>:</td>
                            <td>
                                <select name="mhs" required class="form-control">
                                    <option value="">-=PILIH=-</option>
                                    <?php
                                    // Ambil data mahasiswa dari database
                                    $querymhs = "SELECT nim, nama FROM mahasiswa";
                                    $resultmhs = mysqli_query($koneksi, $querymhs);
                                    while ($datamhs = mysqli_fetch_array($resultmhs, MYSQLI_NUM)) {
                                        echo "<option value='$datamhs[0]'>$datamhs[1]</option>";
                                    }
                                    ?>  
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>NAMA DOSEN</td>
                            <td>:</td>
                            <td>
                                <select name="dosen" required class="form-control">
                                    <option value="">-=PILIH=-</option>
                                    <?php
                                    // Ambil data dosen dari database
                                    $querydosen = "SELECT nip, nama FROM dosen";
                                    $resultdosen = mysqli_query($koneksi, $querydosen);
                                    while ($datadosen = mysqli_fetch_array($resultdosen, MYSQLI_NUM)) {
                                        echo "<option value='$datadosen[0]'>$datadosen[1]</option>";
                                    }
                                    ?>  
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>NILAI TUGAS</td>
                            <td>:</td>
                            <td><input type="number" name="tugas" placeholder="Nilai Tugas" required class="form-control"></td>
                        </tr>

                        <tr>
                            <td>NILAI UTS</td>
                            <td>:</td>
                            <td><input type="number" name="uts" placeholder="Nilai UTS" required class="form-control"></td>
                        </tr>

                        <tr>
                            <td>NILAI UAS</td>
                            <td>:</td>
                            <td><input type="number" name="uas" placeholder="Nilai UAS" required class="form-control"></td>
                        </tr>

                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="submit" name="submit" value="Simpan Nilai" class="btn-submit"></td>
                        </tr>
                    </table>
                </form>
            </center>
        </div>
        <section class="clr"></section>
    </section>

    <footer>
        <p>&copy; 2025 - Universitas Komputer Indonesia | Developed by <a href="#">Aliefia Puan Ghifari</a></p>
    </footer>
</body>

</html>
