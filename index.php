<?php 
session_start();
include 'koneksi/koneksi.php';

$error = '';

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = 'Harap isi Username dan Password!';
    } else {
        
        $query = "SELECT * FROM admin WHERE username = ?";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if ($user = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_role'] = 'admin';
                header('Location: admin/index.php');
                exit;
            }
        }

        $query = "SELECT * FROM mahasiswa WHERE nim = ?";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if ($user = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_role'] = 'mahasiswa';
                header('Location: admin/mahasiswaview.php');
                exit;
            }
        }

        
        $query = "SELECT * FROM dosen WHERE nip = ?";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if ($user = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_role'] = 'dosen';
                header('Location: admin/dosenAdd.php');
                exit;
            }
        }
        
        $error = 'Username atau Password salah!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>.: Sistem Informasi Nilai Online - Universitas Komputer Indonesia :.</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/logoicon.ico">
    <link rel="stylesheet" href="css/style-sheet.css">
</head>

<body>
    <header>
        <section class="logo"><a href="#"><img src="images/logo.png" /></a></section>
        <section class="title">Sistem Informasi Nilai Online <br /> <span>UNIVERSITAS KOMPUTER INDONESIA</span></section>
        <section class="clr">
            <center>Jl. Dipati Ukur No.112-116, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132</center>
        </section>
    </header>

    <section id="container">
        <div>
            <center>
                <section id="navigator">
                    <h2>LOGIN PAGE</h2>
                </section>
                <br><br>
                
                <?php if (!empty($error)): ?>
                    <p style="color: red;"> <?php echo $error; ?> </p>
                <?php endif; ?>
                
                <form method="post" class="form-login">
                    <table>
                        <tr>
                            <td><input type="text" name="username" placeholder="Username (Admin) / NIM / NIP" required></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="password" placeholder="Password" required></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="submit" value="Login"></td>
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
