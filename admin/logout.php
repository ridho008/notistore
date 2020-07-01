<?php  
// session_start();
// require_once 'config/koneksi.php';
session_destroy();
session_unset();
$_SESSION = [];

// cookie
setcookie('id', '', time() + 3600);
setcookie('key', '', time() + 3600);

// menampilkan nama username saat logout
$query = $conn->query("SELECT * FROM tb_admin") or die(mysqli_error($conn));
$row = $query->fetch_assoc();
$_SESSION['admin'] = $row['username'];
echo "<script>alert('$_SESSION[admin] Berhasil Logout');window.location='login.php';</script>";
?>