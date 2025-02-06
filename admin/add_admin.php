<?php
 include('../koneksi/koneksi.php');

$username = 'aliefia'; 
$password = '111'; 


$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$query = "INSERT INTO admin (username, password) VALUES ('$username', '$hashed_password')";
if (mysqli_query($koneksi, $query)) {
    echo "Admin berhasil ditambahkan.";
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
