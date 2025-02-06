<?php
    include "../koneksi/koneksi.php";

    $queryMhs   ="SELECT * FROM mahasiswa";
    $resultMhs  =mysqli_query ($koneksi, $queryMhs);
    $countMhs   =mysqli_num_rows ($resultMhs);
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
        <section class="clr" style="text-align: center;">
            Jl. Dipati Ukur No.112-116, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132
        </section>
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
        <h3 align="center">Data Mahasiswa</h3>

        <!-- Tombol untuk tambah mahasiswa -->
        <a href="add_mahasiswa.php"><input type="button" class="buttonadm" value="Tambah Mahasiswa" /></a>
        <br><br>
        <?php if (mysqli_num_rows($resultMhs) > 0): ?>
        
            <table border="1">
                <tr>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Jurusan</th>
                    <th>Password</th>
                    <th>Opsi</th>
                </tr>
                <?php while ($data = mysqli_fetch_assoc($resultMhs)): ?>
                    <tr>
                        <td><?= htmlspecialchars($data['nim']) ?></td>
                        <td><?= htmlspecialchars($data['nama']) ?></td>
                        <td><?= htmlspecialchars($data['jk']) ?></td>
                        <td><?= htmlspecialchars($data['jur']) ?></td>
                        <td><?= htmlspecialchars($data['password']) ?></td>
                        <td>
                            <a href="mahasiswaEdit.php?nim=<?= urlencode($data['nim']) ?>">Edit</a> | 
                            <a href="mahasiswaDelete.php?nim=<?= urlencode($data['nim']) ?>" 
                               onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>Tidak ada data mahasiswa.</p>
        <?php endif; ?>
    </section>

    <footer>
        <p>&copy; 2025 - Universitas Komputer Indonesia | Developed by <a href="#">Aliefia Puan Ghifari</a></p>
    </footer>
</body>

</html>