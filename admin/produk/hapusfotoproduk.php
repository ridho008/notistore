<?php  
$id_foto = $_GET['idfoto'];
$id_produk = $_GET['idproduk'];

// ambil dayanya dulu, yaitu gambar yang ingin di hapus
$ambilFoto = $conn->query("SELECT * FROM tb_produk_foto WHERE id_produk = $id_produk") or die(mysqli_error($conn));
$detailFoto = $ambilFoto->fetch_assoc();
$namaFoto = $detailFoto['nama_produk_foto'];
unlink('../gambar/produk/' . $namaFoto);

$conn->query("DELETE FROM tb_produk_foto WHERE id_produk_foto = $id_foto") or die(mysqli_error($conn)) or die(mysqli_error($conn));
echo "<script>alert('Foto produk berhasil dihapus.');window.location='index.php?p=detailproduk&id=$id_produk';</script>";

?>