<?php
include('../koneksi/koneksi.php');

$error = '';
$success = '';

if (isset($_POST['submit'])) {
    $nip = trim($_POST['nip']);
    $nama = trim($_POST['nama']);
    $kode_mtkul = trim($_POST['kode_mtkul']);
    $password = trim($_POST['password']);

    if (empty($nip) || empty($nama) || empty($kode_mtkul) || empty($password)) {
        $error = 'Harap isi semua kolom!';
    } else {
        // Hash password sebelum disimpan
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Cek apakah NIP sudah ada
        $check_query = "SELECT * FROM dosen WHERE nip = ?";
        $stmt = mysqli_prepare($koneksi, $check_query);
        mysqli_stmt_bind_param($stmt, 's', $nip);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_fetch_assoc($result)) {
            $error = 'NIP sudah terdaftar!';
        } else {
            // Simpan ke database
            $insert_query = "INSERT INTO dosen (nip, nama, kode_mtkul, password) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($koneksi, $insert_query);
            mysqli_stmt_bind_param($stmt, 'ssss', $nip, $nama, $kode_mtkul, $hashed_password);

            if (mysqli_stmt_execute($stmt)) {
                $success = 'Dosen berhasil ditambahkan!';
            } else {
                $error = 'Terjadi kesalahan, coba lagi.';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <title>.: Sistem Informasi Nilai Online - Universitas Komputer Indonesia :.</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../images/logoicon.ico">
    <link rel="stylesheet" href="../css/style-sheet.css"> <!-- CSS SAMA DENGAN LOGIN PAGE -->
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
                        <h2>TAMBAH DOSEN</h2>
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
                            <td><input type="text" name="nip" placeholder="NIP" required></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="nama" placeholder="Nama Dosen" required></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="kode_mtkul" placeholder="Kode Mata Kuliah" required></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="password" placeholder="Password" required></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="submit" value="Tambah Dosen"></td>
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
