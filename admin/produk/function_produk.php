<?php
require_once 'config/koneksi.php';

function upload_foto_produk() {
	$nama_foto_produk = $_FILES['foto_produk']['name'];
	$ukuran_foto_produk = $_FILES['foto_produk']['size'];
	$error = $_FILES['foto_produk']['error'];
	$tmp_foto_produk = $_FILES['foto_produk']['tmp_name'];
	$foto_produk_lama = $_POST['foto_produk_lama'];

	if($error === 4) { //4 = tidak ada gambar yang di upload
		echo "<script>alert('pilih gambar terlebih dahulu.')</script>";
		return false;
	}

	$ekstensiGambarValid = ['jpg','jpeg','png'];
	$ekstensiGambar = explode('.', $nama_foto_produk);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	// cek apakah bukan gambar yang diupload
	if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>alert('yang anda upload bukan gambar.')</script>";
		return false;
	}

	// cek ukuran gambar yang diupload
	if($ukuran_foto_produk > 1000000) {
		echo "<script>alert('gambar yang anda upload terlalu besar.')</script>";
		return false;
	}

	// generate/acak nama file gambar
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	// $select = query("SELECT * FROM tb_berita WHERE id_berita = $id") or die(mysqli_error($conn));

	// $path = "../gambar/produk/" . $foto_produk_lama;
	// if(file_exists($path)) {
	// 	unlink($path);
	// }
	// echo "File telah dihapus";
	move_uploaded_file($tmp_foto_produk, '../gambar/produk/' . $namaFileBaru);
	
	return $namaFileBaru;
}

function ubah_produk($data) {
	global $conn;
	$id = $_GET['id'];
	$nama_produk = htmlspecialchars($data['nama_produk']);
	$harga_produk = htmlspecialchars($data['harga_produk']);
	$berat_produk = htmlspecialchars($data['berat_produk']);
	$deskripsi_produk = htmlspecialchars($data['deskripsi_produk']);
	$foto_produk_lama = $data['foto_produk_lama'];

	// cek gambar
	if($_FILES['foto_produk']['error'] === 4) {
		$foto_produk = $foto_produk_lama;
	} else {
		$foto_produk = upload_foto_produk();
	}

	$query = $conn->query("UPDATE tb_produk SET nama_produk = '$nama_produk', harga_produk = '$harga_produk', berat_produk = '$berat_produk', foto_produk = '$foto_produk', deskripsi_produk = '$deskripsi_produk' WHERE id_produk = $id") or die(mysqli_error($conn));
	return mysqli_affected_rows($conn);
	
}