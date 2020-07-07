<?php 
require_once 'function_produk.php';

if(isset($_POST['ubah_produk'])) {
	if(ubah_produk($_POST) > 0) {
		echo "<script>alert('Data Produk Berhasil Diubah.');window.location='index.php?p=produk';</script>";
	} else {
		echo "<script>alert('Data Produk Gagal Diubah.');window.location='index.php?p=produk';</script>";
	}
}

$id = $_GET['id'];
$query = $conn->query("SELECT * FROM tb_produk WHERE id_produk =$id") or die(mysqli_error($conn));
$row = $query->fetch_assoc();

// menampilkan kategori
$dataKategori = [];
$ambil = $conn->query("SELECT * FROM tb_kategori") or die(mysqli_error($conn));
while ($pecah = $ambil->fetch_assoc()) {
	$dataKategori[] = $pecah;
}

?>
<h3 class="description">Ubah Data Produk</h3>

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
					<option value="<?= $value['id_kategori'] ?>" <?php
					if($value['id_kategori'] == $value['id_kategori']){
						echo 'selected';
					} ?>>
						<?= $value['nama_kategori']; ?>
					</option>
					<?php endforeach; ?>
				</select>
			</div>	
			<div class="form-group">
				<label>Nama Produk</label>
				<input type="hidden" name="id_produk" value="<?= $row['id_produk']; ?>">
				<input type="hidden" name="foto_produk_lama" value="<?= $row['foto_produk']; ?>">
				<input type="text" class="form-control" name="nama_produk" placeholder="Masukan nama produk" autofocus="on" required value="<?= $row['nama_produk']; ?>">
			</div>
			<div class="form-group">
				<label>Harga (RP)</label>
				<input type="number" class="form-control" name="harga_produk" placeholder="Masukan harga produk" required value="<?= $row['harga_produk']; ?>">
			</div>
			<div class="form-group">
				<label>Berat (KG)</label>
				<input type="number" class="form-control" name="berat_produk" placeholder="Masukan berat produk" required value="<?= $row['berat_produk']; ?>">
			</div>
			<div class="form-group">
				<label>Stok Produk</label>
				<input type="number" class="form-control" name="stok" placeholder="Masukan stok produk" required value="<?= $row['stok_produk']; ?>">
			</div>
			<div class="form-group">
				<label>Foto (Klik Tulisan Foto)</label>
				
				<input type="file" class="form-control" name="foto_produk">
				<img src="../gambar/produk/<?= $row['foto_produk']; ?>" width="100" style="display: block;">
			</div>
			<div class="form-group">
				<textarea name="deskripsi_produk" cols="60" class="form-control" rows="5" required><?= $row['deskripsi_produk']; ?></textarea>
			</div>
			<div class="form-group">
				<button type="submit" name="ubah_produk" class="btn btn-danger">Ubah Data Produk</button>
			</div>
			</form>
		</div>
	</div>
</div>
</div>