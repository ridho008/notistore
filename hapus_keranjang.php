<?php 
session_start();
$id_produk = $_GET['id'];
unset($_SESSION['keranjang'][$id_produk]);

echo "<script>alert('Produk di hapus dari keranjang anda.');window.location='keranjang.php';</script>";

?>