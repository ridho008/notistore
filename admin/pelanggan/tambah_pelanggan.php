<?php 
if(isset($_POST['tambah_pelanggan'])) {
	$nama_pelanggan = htmlspecialchars($_POST['nama_pelanggan']);
	$email = htmlspecialchars($_POST['email_pelanggan']);
	$password = htmlspecialchars($_POST['password_pelanggan']);
	$telepon = htmlspecialchars($_POST['telepon']);

	$query = $conn->query("INSERT INTO tb_pelanggan (email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan) VALUES('$email', '$password', '$nama_pelanggan', '$telepon')") or die(mysqli_error($conn));
	if($query) {
		echo "<script>alert('Data Pelanggan Berhasil Ditambahkan.');window.location='index.php?p=pelanggan';</script>";
	} else {
		echo "<script>alert('Data Pelanggan Gagal Ditambahkan.');window.location='index.php?p=tambah_produk';</script>";
	}
}

?>
<h3 class="description">Tambah Data Pelanggan</h3>

<div class="row">
<div class="col-md-12">
  <div class="card card-user">
		<div class="card-body">
			<form action="" method="post">
			<div class="form-group">
				<label>Nama Pelanggan</label>
				<input type="text" class="form-control" name="nama_pelanggan" placeholder="Masukan nama anda" autofocus="on" required>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email_pelanggan" placeholder="Masukan email anda" required>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password_pelanggan" placeholder="Masukan password anda" required>
			</div>
			<div class="form-group">
				<label>Telepon</label>
				<input type="number" class="form-control" placeholder="Masukan nomor aktif anda" name="telepon" required>
			</div>
			<div class="form-group">
				<button type="submit" name="tambah_pelanggan" class="btn btn-danger">Tambah Data Pelanggan</button>
			</div>
			</form>
		</div>
	</div>
</div>
</div>