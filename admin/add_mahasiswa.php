<?php
include('../koneksi/koneksi.php');

$error = '';
$success = '';

if (isset($_POST['submit'])) {
    $nim = trim($_POST['nim']);
    $nama = trim($_POST['nama']);
    $jk = trim($_POST['jk']);
    $jurusan = trim($_POST['jur']);
    $password = trim($_POST['password']);

    if (empty($nim) || empty($nama) || empty($jk) || empty($jur) || empty($password)) {
        $error = 'Harap isi semua kolom!';
    } else {
        // Hash password sebelum disimpan
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Cek apakah NIM sudah ada
        $check_query = "SELECT * FROM mahasiswa WHERE nim = ?";
        $stmt = mysqli_prepare($koneksi, $check_query);
        mysqli_stmt_bind_param($stmt, 's', $nim);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_fetch_assoc($result)) {
            $error = 'NIM sudah terdaftar!';
        } else {
            // Simpan ke database
            $insert_query = "INSERT INTO mahasiswa (nim, nama, jk, jur, password) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($koneksi, $insert_query);
            mysqli_stmt_bind_param($stmt, 'sssss', $nim, $nama, $jk, $jur, $hashed_password);

            if (mysqli_stmt_execute($stmt)) {
                $success = 'Mahasiswa berhasil ditambahkan!';
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
                        <h2>TAMBAH MAHASISWA</h2>
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
                            <td><input type="text" name="nim" placeholder="NIM" required></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="nama" placeholder="Nama Mahasiswa" required></td>
                        </tr>
                        <tr>
                            <td>
                                <select name="jk" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="text" name="jur" placeholder="Jurusan" required></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="password" placeholder="Password" required></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="submit" value="Tambah Mahasiswa"></td>
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
