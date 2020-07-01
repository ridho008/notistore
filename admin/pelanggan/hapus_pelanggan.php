<?php

$id = $_GET['id'];

$Dpelanggan = $conn->query("DELETE FROM tb_pelanggan WHERE id_pelanggan = $id") or die(mysqli_error($conn));
if($Dpelanggan) {
	echo "<script>alert('Data Pelanggan Berhasil Dihapus.');window.location='index.php?p=pelanggan';</script>";
} else {
	echo "<script>alert('Data Pelanggan Gagal Dihapus.');window.location='index.php?p=pelanggan';</script>";
}
