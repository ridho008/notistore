<?php 
session_start();
// mendapatkan id di url
$id_produk = $_GET['id'];

// jika sudah ada produk di keranjang, maka produk itu akan di jumlah +1
if(isset($_SESSION['keranjang'][$id_produk])) {
	$_SESSION['keranjang'][$id_produk] += 1;
} else {
	// selain itu, (belum ada produk di keranjang), maka produk itu di anggap dibeli 1
	$_SESSION['keranjang'][$id_produk] = 1;
}

// var_dump($_SESSION);
// redirect ke halaman keranjang.php
echo "<script>alert('Produk telah masuk ke keranjang belanja anda.');window.location='keranjang.php';</script>";

?>