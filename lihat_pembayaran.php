<?php  
session_start();
require_once 'admin/config/koneksi.php';
$id_pembelian = $_GET['id'];

$ambil = $conn->query("SELECT * FROM tb_pembayaran 
 LEFT JOIN tb_pembelian ON tb_pembayaran.id_pembelian = tb_pembelian.id_pembelian	WHERE tb_pembelian.id_pembelian = $id_pembelian") or die(mysqli_error($conn));
$pecah = $ambil->fetch_assoc();

// jika id pembayaran kosong
if(empty($pecah['id_pembayaran'])) {
	header("Location: riwayat.php");
	exit;
}

// jika data pelanggan yg byar tidak sesuai dengan login
// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";
if($_SESSION['pelanggan']['id_pelanggan'] != $pecah['id_pelanggan']) {
	header("Location: riwayat.php");
	exit;
}

?>
<?php 
session_start();
require_once 'admin/config/koneksi.php';

if(!isset($_SESSION['pelanggan'])) {
  header("Location: login.php");
  exit;
}

?>
<!-- <pre>
<?php var_dump($pecah); ?>
</pre> -->
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

    <title>Lihat Pembayaran | Noti Store</title>
  </head>
  <body>

<div class="main-panel" style="width: 100%;height: 100vh;">
<!-- Navbar/Menu.php -->
<?php require_once 'themeplates/menu.php'; ?>

  <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
            <!-- <pre><?php var_dump($_SESSION['pelanggan']); ?></pre> -->
            <h4 class="card-title">Lihat Pembayaran <?= $_SESSION['pelanggan']['nama_pelanggan']; ?></h4>
							<div class="row">
								<div class="col-md-6">
									<table class="table">
										<tr>
											<th>Nama</th>
											<td><?= $pecah['nama'] ?></td>
										</tr>
										<tr>
											<th>Bank</th>
											<td><?= $pecah['bank'] ?></td>
										</tr>
										<tr>
											<th>Tanggal</th>
											<td><?= $pecah['tanggal'] ?></td>
										</tr>
										<tr>
											<th>Jumlah</th>
											<td>Rp. <?= number_format($pecah['jumlah']); ?></td>
										</tr>
									</table>
								</div>
								<div class="col-md-6 mb-4">
									<img src="gambar/bukti/<?= $pecah['bukti']; ?>">
								</div>
							</div>
          	</div>
				</div>
			</div>
	</div>
</div>