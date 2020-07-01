<?php 
require_once 'function_pelanggan.php';

$id = $_GET['id'];
$ubahP = $conn->query("SELECT * FROM tb_pelanggan WHERE id_pelanggan = $id") or die(mysqli_error($conn));
$row = $ubahP->fetch_assoc();

if(isset($_POST['ubah_pelanggan'])) {
	if(ubah_pelanggan($_POST) > 0) {
		echo "<script>alert('Data Pelanggan Berhasil Diubah.');window.location='index.php?p=pelanggan';</script>";
	} else {
		echo "<script>alert('Data Pelanggan Gagal Diubah.');window.location='index.php?p=pelanggan';</script>";
	}
}

?>
<h3 class="description">Ubah Data Pelanggan</h3>

<div class="row">
<div class="col-md-12">
  <div class="card card-user">
		<div class="card-body">
			<form action="" method="post">
			<input type="hidden" name="id_pelanggan" value="<?= $row['id_pelanggan']; ?>">
			<div class="form-group">
				<label>Nama Pelanggan</label>
				<input type="text" class="form-control" name="nama_pelanggan" placeholder="Masukan nama anda" autofocus="on" required value="<?= $row['nama_pelanggan']; ?>">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email_pelanggan" placeholder="Masukan email anda" required value="<?= $row['email_pelanggan']; ?>">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password_pelanggan" placeholder="Masukan password anda" required value="<?= $row['password_pelanggan']; ?>">
			</div>
			<div class="form-group">
				<label>Telepon</label>
				<input type="number" class="form-control" placeholder="Masukan nomor aktif anda" name="telepon" required value="<?= $row['telepon_pelanggan']; ?>">
			</div>
			<div class="form-group">
				<button type="submit" name="ubah_pelanggan" class="btn btn-danger">Tambah Data Pelanggan</button>
			</div>
			</form>
		</div>
	</div>
</div>
</div>