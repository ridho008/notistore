<?php 
session_start();
require_once 'admin/config/koneksi.php';
$keranjang = @$_SESSION['keranjang'];

if(!isset($_SESSION['pelanggan'])) {
  header("Location: login.php");
  exit;
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

<div class="main-panel" style="width: 100%;">
<!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="index.php">NOTI STORE</a>
            <div class="collapse navbar-collapse" id="navbarNav">
              
            </div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="keranjang.php">Keranjang</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="checkout.php">Checkout</a>
                </li>
                <?php if(isset($_SESSION['pelanggan'])) : ?>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">Logout</a>
                </li>
                <?php else: ?>
                  <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
                </li>
              <?php endif; ?>
              </ul>
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <!-- <div class="col-md-2 float-right">
            <a href="checkout.php" class="btn btn-info">Checkout</a>
            </div> -->
          <h4 class="card-title">Detail Pembelian</h4>
          <hr>
          </div>
          <?php 
          $idD = $_GET['id'];
          $detailPembelian = $conn->query("SELECT * FROM tb_pembelian JOIN tb_pelanggan ON tb_pembelian.id_pelanggan = tb_pelanggan.id_pelanggan JOIN tb_ongkir ON tb_ongkir.id_ongkir WHERE tb_pembelian.id_pembelian = $idD") or die(mysqli_error($conn));
          $detail = $detailPembelian->fetch_assoc();
          ?>
          <div class="card-body">
                <div class="places-buttons">
                  <div class="row">
                    <div class="col-md-4">
                    <div class="card-header">
                      <h4 class="card-title">Pembelian</h4>
                      <hr>
                    <h6 class="card-title">No. Pembelian : <?= $detail['id_pembelian'] ?></h6>
                    <h6 class="card-title">Tanggal : <?= $detail['tgl_pembelian'] ?></h6>
                    <h6 class="card-title">Total : <?= number_format($detail['total_pembelian']); ?></h6>
                    <!-- <h6 class="card-title">Ongkos Kirim : <?= $detail['tarif'] ?>, Pengiriman <?= $detail['nama_kota'] ?> </h6>
                    <h6 class="card-title">Total : <?= number_format($detail['total_pembelian']); ?></h5> -->
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card-header">
                      <h4 class="card-title">Pelanggan</h4>
                      <hr>
                    <h6 class="card-title"><?= $detail['nama_pelanggan'] ?></h6>
                    <h6 class="card-title"><?= $detail['email_pelanggan'] ?></h6>
                    <!-- <h6 class="card-title">Ongkos Kirim : <?= $detail['tarif'] ?>, Pengiriman <?= $detail['nama_kota'] ?> </h6>
                    <h6 class="card-title">Total : <?= number_format($detail['total_pembelian']); ?></h5> -->
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card-header">
                      <h4 class="card-title">Pengiriman</h4>
                      <hr>
                    <h6 class="card-title"><?= $detail['nama_kota'] ?></h6>
                    <h6 class="card-title">Ongkos Kirim : Rp. <?= $detail['tarif'] ?></h6>
                    <h6 class="card-title">Alamat : Rp. <?= $detail['alamat_pengiriman'] ?></h6>
                    <!-- <h6 class="card-title">Ongkos Kirim : <?= $detail['tarif'] ?>, Pengiriman <?= $detail['nama_kota'] ?> </h6>
                    <h6 class="card-title">Total : <?= number_format($detail['total_pembelian']); ?></h5> -->
                    </div>
                  </div>
                  </div>
                  </div> <!-- endrow -->

<!-- Informasi Detail Harga -->
  <!-- <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="alert alert-info alert-with-icon alert-dismissible fade show" data-notify="container">
        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
          <i class="nc-icon nc-simple-remove"></i>
        </button>
        <span data-notify="icon" class="nc-icon nc-bell-55"></span>
        <span data-notify="message">
          Silahkan melakukan pembayaran <b>Rp. <?= number_format($detail['total_pembelian']); ?> BANK BRI 182-098787-2341 AN. Marini Alsa Khairana
          </b>
        </span>
      </div>
    </div>
  </div>  --> 

  <!-- TABLE detail pembelian -->
<div class="col-md-12">
                    <div class="alert alert-info alert-with-icon alert-dismissible fade show" data-notify="container">
                    <span data-notify="icon" class="nc-icon nc-bell-55"></span>
                    <span data-notify="message">
                      Silahkan melakukan pembayaran <b>Rp. <?= number_format($detail['total_pembelian']); ?> BANK BRI 182-098787-2341 AN. Marini Alsa Khairana
                      </b>
                    </span>
                  </div>
                  </div>
  <div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
      <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>No</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Berat</th>
              <th>Jumlah</th>
              <th>Sub Berat</th>
              <th>Sub Total</th>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              $pembelian_produk = $conn->query("SELECT * FROM tb_pembelian_produk WHERE id_pembelian = $idD") or die(mysqli_error($conn));
              while($row = $pembelian_produk->fetch_assoc()) {
              ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td>Rp. <?= number_format($row['harga']); ?></td>
                <td><?= $row['berat']; ?> Gr.</td>
                <td><?= $row['jumlah']; ?></td>
                <td><?= $row['subberat']; ?> Gr.</td>
                <td>Rp<?= number_format($row['subharga']); ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
    </div>
  </div>
  </div>
</div>    
                      
                      
                  </div>  
                </div>
            
            
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

</div> <!-- main-panel -->
