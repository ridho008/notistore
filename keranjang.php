<?php 
session_start();
require_once 'admin/config/koneksi.php';
$keranjang = @$_SESSION['keranjang'];

if(!isset($_SESSION['pelanggan'])) {
  header("Location: login.php");
  exit;
}

// jika user akses halaman keranjang
if(empty($_SESSION['keranjang'])) {
  echo "<script>alert('Keranjang belanja kosong, silahkan beli beberapa produk.');window.location='index.php';</script>";
}

?>
<!-- <pre>
	<?php 
	var_dump($_SESSION['keranjang']);
	?>
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

    <title>Keranjang Belanja | Noti Store</title>
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
        		<div class="col-md-4 float-right">
        		<a href="index.php" class="btn btn-primary">Lanjut Belanja</a>
        		<a href="checkout.php" class="btn btn-info">Checkout</a>
      			</div>
        	<h4 class="card-title">Keranjang Belanja</h4>
      		</div>
					<div class="card-body">
	        	<div class="table-responsive">
	       	 		<table class="table">
									<thead>
										<tr>
											<td>No</td>
											<td>Produk</td>
											<td>Harga</td>
											<td>Jumlah</td>
											<td>Subharga</td>
                      <td>Hapus Belanja</td>
										</tr>
									</thead>
									<tbody>
										<?php foreach($keranjang as $id_produk => $jumlah) : ?>
										<!-- menampilkan produk yg sedang di perulangkan berdasarkan id_produk -->
										<?php 
										$no = 1;
										$queryK = $conn->query("SELECT * FROM tb_produk WHERE id_produk = $id_produk") or die(mysqli_error($conn));
										$row = $queryK->fetch_assoc();
										// harga di kali dengan jumlah barang yang di beli
										$subharga = $row['harga_produk'] * $jumlah;
										// var_dump($row);
										?>
										<tr>
											<td><?= $no; ?></td>
											<td><?= $row['nama_produk']; ?></td>
											<td><?= number_format($row['harga_produk']); ?></td>
											<td><?= $jumlah; ?></td>
											<td>Rp.<?= number_format($subharga); ?></td>
                      <td>
                        <a href="hapus_keranjang.php?id=<?= $id_produk; ?>" class="btn btn-danger btn-xs">X</a>
                      </td>
										</tr>
										<?php $no++; ?>
										<?php endforeach; ?>
                  
									</tbody>

	       	 		</table>

	       	 	</div>
            
	       	</div>
	      </div>
			</div>
    </div>
</div>

</div> <!-- main-panel -->