<?php 
session_start();
require_once 'admin/config/koneksi.php';

if(!isset($_SESSION['pelanggan'])) {
  header("Location: login.php");
  exit;
}

// mendapatkan id_pembelian melalui url
$id_pem = $_GET['id'];
$ambil = $conn->query("SELECT * FROM tb_pembelian WHERE id_pembelian = $id_pem") or die(mysqli_error($conn));
$dataPem = $ambil->fetch_assoc();
// var_dump($dataPem);

// mendapatkan id_pelanggan yg beli
$id_pelanggan_beli = $dataPem['id_pelanggan'];

// mendapatkan id_pelanggan yang login
$id_pelanggan_login = $_SESSION['pelanggan']['id_pelanggan'];
if($id_pelanggan_beli != $id_pelanggan_login) {
	header("Location: login.php");
	exit;
}


// jika tombol kirim di tekan
if(isset($_POST['kirim'])) {
	$nama = htmlspecialchars($_POST['nama']);
	$bank = htmlspecialchars($_POST['bank']);
	$jumlah = htmlspecialchars($_POST['jumlah']);
	$tanggal = date('Y-m-d');

	$fotoBukti = $_FILES['bukti']['name'];
	$tmpBukti = $_FILES['bukti']['tmp_name'];

	$ektensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ektensiGambar = explode('.', $fotoBukti);
	$ektensiGambar = strtolower(end($ektensiGambar));

	// cek apakah sesuai dengan ektensi ?
	if(!in_array($ektensiGambar, $ektensiGambarValid)) {
		echo "<script>alert('Pastikan gambar yang anda upload JPG,JPEG,PNG.')</script>";
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ektensiGambar;
	move_uploaded_file($tmpBukti, 'gambar/bukti/' . $namaFileBaru);

	$conn->query("INSERT INTO tb_pembayaran (id_pembelian, nama, bank, jumlah, tanggal, bukti) VALUES ('$id_pem', '$nama', '$bank', '$jumlah', '$tanggal', '$namaFileBaru') ") or die(mysqli_error($conn));
	

	// update data tb_pembelian, dari pending ubah menjadi status pembayaran sukses
	$conn->query("UPDATE tb_pembelian SET status_pembelian = 'Bukti terkirim' WHERE id_pembelian = '$id_pem'") or die(mysqli_error($conn));

	echo "<script>alert('Bukti berhasil di kirim, silahkan konfirmasi melalui pesan di halaman dashboard anda.');window.location='riwayat.php';</script>";
	return $namaFileBaru;
}

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

  <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
            <!-- <pre><?php var_dump($_SESSION['pelanggan']); ?></pre> -->
            <h4 class="card-title">Pembayaran Belanja <?= $_SESSION['pelanggan']['nama_pelanggan']; ?></h4>
            <p>Kirim bukti pembayaran anda.</p>
            <div class="col-md-12">
              <div class="alert alert-info alert-with-icon alert-dismissible fade show" data-notify="container">
              <span data-notify="icon" class="nc-icon nc-bell-55"></span>
              <span data-notify="message">
                Total tagihan anda sebesar <b>Rp. <?= number_format($dataPem['total_pembelian']); ?> BANK BRI 182-098787-2341 AN. Marini Alsa Khairana
                </b>
              </span>
            </div>
            </div>
          </div>
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
            	<div class="form-group">
            		<label for="nama">Nama Pembayar</label>
            		<input type="text" name="nama" id="nama" class="form-control">
            	</div>
            	<div class="form-group">
            		<label for="bank">Bank</label>
            		<input type="text" name="bank" id="bank" class="form-control">
            	</div>
            	<div class="form-group">
            		<label for="jumlah">Jumlah</label>
            		<input type="number" name="jumlah" id="jumlah" class="form-control">
            	</div>
            	<div class="form-group">
            		<label for="bukti">Bukti Pembayaran</label>
            		<input type="file" name="bukti" id="bukti" class="form-control">
            	</div>
            	<div class="form-group">
            		<button type="submit" name="kirim" class="btn btn-danger">Kirim</button>
            	</div>
            </form>
          </div>
          </div>
        </div>
      </div>
  </div>

</div>