<?php  
$id = $_GET['id'];
$query = $conn->query("SELECT * FROM tb_produk WHERE id_produk = $id") or die(mysqli_error($conn));
$row = $query->fetch_assoc();
$gambar = $row['foto_produk'];
if(file_exists('../gambar/produk/' . $gambar)) {
	unlink('../gambar/produk/' . $gambar);
}

$Dproduk = $conn->query("DELETE FROM tb_produk WHERE id_produk = $id") or die(mysqli_error($conn));
if($Dproduk) {
	echo "<script>alert('Data Produk Berhasil Dihapus.');window.location='index.php?p=produk';</script>";
} else {
	echo "<script>alert('Data Produk Gagal Dihapus.');window.location='index.php?p=produk';</script>";
}

?>