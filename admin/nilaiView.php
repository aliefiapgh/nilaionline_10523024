<?php
include('../koneksi/koneksi.php');

// Query untuk menampilkan data nilai
$query = "SELECT nilai.nim, nilai.nip, mahasiswa.nama AS mahasiswa, dosen.nama AS dosen, nilai.tugas, nilai.uts, nilai.uas
          FROM nilai
          JOIN mahasiswa ON nilai.nim = mahasiswa.nim
          JOIN dosen ON nilai.nip = dosen.nip";
$result = mysqli_query($koneksi, $query);
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

        <h3>Data Nilai Mahasiswa</h3>

        <!-- Tombol untuk tambah nilai -->
        <a href="nilaiAdd.php"><input type="button" class="buttonadm" value="Tambah Nilai" /></a>
        <br><br>

        <?php
        // Menampilkan tabel nilai jika ada
        if (mysqli_num_rows($result) > 0) {
            echo '<table border="1">
                    <tr>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Nama Dosen</th>
                        <th>Nilai Tugas</th>
                        <th>Nilai UTS</th>
                        <th>Nilai UAS</th>
                        <th>Opsi</th>
                    </tr>';

            // Menampilkan data dari database
            while ($data = mysqli_fetch_array($result)) {
                echo '<tr>
                        <td>' . $data['nim'] . '</td>
                        <td>' . $data['mahasiswa'] . '</td>
                        <td>' . $data['dosen'] . '</td>
                        <td>' . $data['tugas'] . '</td>
                        <td>' . $data['uts'] . '</td>
                        <td>' . $data['uas'] . '</td>
                        <td>
                            <a href="nilaiEdit.php?nim=' . $data['nim'] . '&nip=' . $data['nip'] . '">Edit</a> | 
                            <a href="nilaiDelete.php?nim=' . $data['nim'] . '&nip=' . $data['nip'] . '" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">Delete</a>
                        </td>
                    </tr>';
            }

            echo '</table>';
        } else {
            echo 'Tidak ada data nilai.';
        }
        ?>
    </section>

    <footer>
        <font color="#000">Copyright &copy; 2025 - Universitas Komputer Indonesia <br /> Developed By <a href="#" target="_new">Aliefia Puan Ghifari</a></font>
    </footer>
</body>
</html>
