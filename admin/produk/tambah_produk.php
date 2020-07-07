<?php
if(isset($_POST['tambah_produk'])) {
	$kategori_produk = htmlspecialchars($_POST['kategori']);
	$nama_produk = htmlspecialchars($_POST['nama_produk']);
	$harga_produk = htmlspecialchars($_POST['harga_produk']);
	$berat_produk = htmlspecialchars($_POST['berat_produk']);
	$deskripsi_produk = htmlspecialchars($_POST['deskripsi_produk']);
	$stok_produk = htmlspecialchars($_POST['stok']);
	$nama_foto = $_FILES['foto_produk']['name'];
	$lokasi_foto = $_FILES['foto_produk']['tmp_name'];
	
	$ektensiGambar = explode('.', $nama_foto);
	$ektensiGambar = strtolower(end($ektensiGambar));

	// generate nama foto
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ektensiGambar;

	move_uploaded_file($lokasi_foto, '../gambar/produk/' . $namaFileBaru);	

	$query = $conn->query("INSERT INTO tb_produk (id_kategori, nama_produk, harga_produk, berat_produk, foto_produk, deskripsi_produk, stok_produk) VALUES ('$kategori_produk', '$nama_produk', '$harga_produk', '$berat_produk', '$namaFileBaru', '$deskripsi_produk', '$stok_produk')") or die(mysqli_error($conn));
	if($query) {
		echo "<script>alert('Data Produk Berhasil Ditambahkan.');window.location='index.php?p=produk';</script>";
	} else {
		echo "<script>alert('Data Produk Gagal Ditambahkan.');window.location='index.php?p=tambah_produk';</script>";
	}
	return $namaFileBaru;
}  

// menampilkan kategori
$dataKategori = [];
$ambil = $conn->query("SELECT * FROM tb_kategori") or die(mysqli_error($conn));
while ($pecah = $ambil->fetch_assoc()) {
	$dataKategori[] = $pecah;
}

// echo "<pre>";
// var_dump($dataKategori);
// echo "</pre>";

?>
<h3 class="description">Tambah Data Produk</h3>

<div class="row">
<div class="col-md-12">
  <div class="card card-user">
		<div class="card-body">
			<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="kategori">Kategori</label>
				<select name="kategori" id="kategori" class="form-control">
					<option value="">Pilih Kategori</option>
					<?php foreach($dataKategori as $key => $value) : ?>
					<option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>	
			<div class="form-group">
				<label>Nama Produk</label>
				<input type="text" class="form-control" name="nama_produk" placeholder="Masukan nama produk" autofocus="on" required>
			</div>
			<div class="form-group">
				<label>Stok Produk</label>
				<input type="number" class="form-control" name="stok" placeholder="Masukan stok produk" required>
			</div>
			<div class="form-group">
				<label>Harga (RP)</label>
				<input type="number" class="form-control" name="harga_produk" placeholder="Masukan harga produk" required>
			</div>
			<div class="form-group">
				<label>Berat (KG)</label>
				<input type="number" class="form-control" name="berat_produk" placeholder="Masukan berat produk" required>
			</div>
			<div class="form-group">
				<label>Foto (Klik Tulisan Foto)</label>
				<input type="file" class="form-control" name="foto_produk" required>
			</div>
			<div class="form-group">
				<textarea name="deskripsi_produk" cols="60" class="form-control" rows="5" required></textarea>
			</div>
			<div class="form-group">
				<button type="submit" name="tambah_produk" class="btn btn-danger">Tambah Data Produk</button>
			</div>
			</form>
		</div>
	</div>
</div>
</div>