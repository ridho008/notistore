<?php 
session_start();
require_once 'admin/config/koneksi.php';

$id = $_GET['id'];

$detail = $conn->query("SELECT * FROM tb_produk WHERE id_produk = $id") or die(mysqli_error($conn));
$pecahDetail = $detail->fetch_assoc();

// jika tombol beli di klik
if(isset($_POST['beli'])) {
	$jumlah = $_POST['jumlah'];

	// masukan ke keranjang
	$_SESSION['keranjang'][$id] = $jumlah;

	// jika ingin menambahkan produk ke dalam keranjang, tetapi belum login
	if(!isset($_SESSION['keranjang'][$id])) {
	echo "<script>alert('Silahkan login terlebih dahulu.');window.location='login.php';</script>";
	} else {
		echo "<script>alert('Produk berhasil masuk ke keranjang belanja anda.');window.location='keranjang.php';</script>";
	}

	
}

print_r($pecahDetail);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="admin/assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="admin/assets/demo/demo.css" rel="stylesheet" />

    <title>Keranjang Belanja | Noti Store</title>
  </head>
  <body>

<div class="main-panel" style="width: 100%;height: 100vh;">
<!-- Navbar/Menu.php -->
<?php require_once 'themeplates/menu.php'; ?>


<div class="content" style="height: 100vh;">
    <div class="row">
      <div class="col-md-12">
      	<div class="card">
          <div class="card-header">
          	<h4 class="card-title">Detail Produk <b><?= $pecahDetail['nama_produk']; ?></b></h4>
	          <div class="row">
							<div class="col-md-6">
								<img src="gambar/produk/<?= $pecahDetail['foto_produk']; ?>">
							</div>
							<div class="col-md-6">
								<h4><?= $pecahDetail['nama_produk']; ?></h4>
								<hr>
								<h6>Rp. <?= number_format($pecahDetail['harga_produk']); ?></h6>
								<hr>
								<form action="" method="post">
									<div class="form-group col-md-6">
										<div class="input-group">
											<input type="number" class="form-control" min="1" name="jumlah">
											<div class="input-group-btn">
												<button type="submit" name="beli" class="btn btn-primary">Beli</button>
											</div>
										</div>
									</div>
								</form>
								<hr>
								<p><?= $pecahDetail['deskripsi_produk']; ?></p>
							</div>
						</div>
					</div>
        </div>
			</div>
		</div>
</div>