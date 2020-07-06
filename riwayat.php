<?php 
session_start();
require_once 'admin/config/koneksi.php';

if(!isset($_SESSION['pelanggan'])) {
  header("Location: login.php");
  exit;
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
            <h4 class="card-title">Riwayat Belanja <?= $_SESSION['pelanggan']['nama_pelanggan']; ?></h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;
                  // mendapatkan id_pelanggan yang login dari session
                  $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
                  $ambil = $conn->query("SELECT * FROM tb_pembelian WHERE id_pelanggan = $id_pelanggan") or die(mysqli_error($conn));
                  while($pecah = $ambil->fetch_assoc()) {


                  ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pecah['tgl_pembelian']; ?></td>
                    <td>
                      <?= $pecah['status_pembelian']; ?><br>
                      <?php if(!empty($pecah['resi_pengiriman'])) : ?>
                        Resi : <?= $pecah['resi_pengiriman']; ?>
                      <?php endif; ?>
                      </td>
                    <td>Rp. <?= number_format($pecah['total_pembelian']); ?></td>
                    <td>
                      <a href="nota.php?id=<?= $pecah['id_pembelian']; ?>" class="btn btn-success btn-sm">Nota</a>
                      <a href="pembayaran.php?id=<?= $pecah['id_pembelian']; ?>" class="btn btn-info btn-sm">Pembayaran</a>
                    </td>
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