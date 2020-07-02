<?php 
require_once 'config/koneksi.php';
$query = $conn->query("SELECT * FROM tb_admin") or die(mysqli_error($conn));
$row = $query->fetch_assoc();
$_SESSION['nama_lengkap'] = $row['nama_lengkap'];

?>
<h3 class="description">Selamat Datang <?= $_SESSION['nama_lengkap'] ?></h3>