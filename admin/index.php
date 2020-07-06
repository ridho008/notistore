<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php 
session_start();
require_once 'config/koneksi.php';

if(!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}

if(!isset($_GET['p'])) {
  header("Location: index.php?p=home");
  exit;
}


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?php 
    if(isset($_GET['p'])) {
      if($_GET['p'] == 'produk') {
        echo "Produk | Noti Store";
      } else if($_GET['p'] == 'pembelian') {
        echo "Pembelian | Noti Store";
      } else if($_GET['p'] == 'pelanggan') {
        echo "Pelanggan | Noti Store";
      } else if($_GET['p'] == 'detail') {
        echo "Detail | Noti Store";
      } else if($_GET['p'] == 'tambah_produk') {
        echo "Tambah Data Produk | Noti Store";
      } else if($_GET['p'] == 'home') {
        echo "Noti Store | Dashboard";
      } else if($_GET['p'] == 'tambah_pelanggan') {
        echo "Tambah Data Pelanggan | Noti Store";
      } else if($_GET['p'] == 'ubahproduk') {
        echo "Ubah Data Produk | Noti Store";
      } else if($_GET['p'] == 'ubahpelanggan') {
        echo "Ubah Data Pelanggan | Noti Store";
      } else if($_GET['p'] == 'pembayaran') {
        echo "Pembayaran | Noti Store";
      } 
    }
    ?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="index.php?p=home" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../gambar/Profile.jpg">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          NOTI STORE
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <?php if(isset($_GET['p'])) { ?>
          <?php if($_GET['p'] == 'home') { ?>
          <li class="active">
            <a href="index.php?p=home">
              <i class="nc-icon nc-shop"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <?php } else { ?>
          <li>
            <a href="index.php?p=home">
              <i class="nc-icon nc-shop"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <?php  
          } ?>
          <?php } ?>

          <?php if(isset($_GET['p'])) { ?>
          <?php if($_GET['p'] == 'produk') { ?>
          <li class="active">
            <a href="index.php?p=produk">
              <i class="nc-icon nc-bag-16"></i>
              <p>Produk</p>
            </a>
          </li>
          <?php } else { ?>
          <li>
            <a href="index.php?p=produk">
              <i class="nc-icon nc-bag-16"></i>
              <p>Produk</p>
            </a>
          </li>
          <?php  
          } ?>
          <?php } ?>

          <?php if(isset($_GET['p'])) { ?>
          <?php if($_GET['p'] == 'pembelian') { ?>
          <li class="active">
            <a href="index.php?p=pembelian">
              <i class="nc-icon nc-basket"></i>
              <p>Pembelian</p>
            </a>
          </li>
          <?php } else { ?>
          <li>
            <a href="index.php?p=pembelian">
              <i class="nc-icon nc-basket"></i>
              <p>Pembelian</p>
            </a>
          </li>
          <?php  
            } ?>
          <?php } ?>

          <?php if(isset($_GET['p'])) { ?>
          <?php if($_GET['p'] == 'pelanggan') { ?>
          <li class="active">
            <a href="index.php?p=pelanggan">
              <i class="nc-icon nc-single-02"></i>
              <p>Pelangganan</p>
            </a>
          </li>
          <?php } else { ?>
          <li>
            <a href="index.php?p=pelanggan">
              <i class="nc-icon nc-single-02"></i>
              <p>Pelangganan</p>
            </a>
          </li>
          <?php  
            } ?>
          <?php } ?>
          <li>
            <a href="index.php?p=logout">
              <i class="nc-icon nc-button-power"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
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
            <?php 
            if(isset($_GET['p'])) {
              if($_GET['p'] == 'produk') { 
                echo "<a class='navbar-brand' href=''>Produk</a>";
              } else if($_GET['p'] == 'pelanggan') {
                echo "<a class='navbar-brand' href=''>Pelangganan</a>";
              } else if($_GET['p'] == 'pembelian') {
                echo "<a class='navbar-brand' href=''>Pembelian</a>";
              } else if($_GET['p'] == 'detail') {
                echo "<a class='navbar-brand' href=''>Detail</a>";
              } else if($_GET['p'] == 'tambah_produk') {
                echo "<a class='navbar-brand' href=''>Tambah Produk</a>";
              } else if($_GET['p'] == 'home') {
                echo "<a class='navbar-brand' href=''>Dashboard</a>";
              } else if($_GET['p'] == 'tambah_pelanggan') {
                echo "<a class='navbar-brand' href=''>Tambah Pelanggan</a>";
              } else if($_GET['p'] == 'ubahproduk') {
                echo "<a class='navbar-brand' href=''>Ubah Produk</a>";
              } else if($_GET['p'] == 'ubahpelanggan') {
                echo "<a class='navbar-brand' href=''>Ubah Pelanggan</a>";
              } else if($_GET['p'] == 'pembayaran') {
                echo "<a class='navbar-brand' href=''>Pembayaran</a>";
              } 
            }             ?>
            <!-- <a class="navbar-brand" href="javascript:;">Dashboard</a> -->
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
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
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
            </ul>
            <a href="index.php?p=logout" class="btn btn-danger btn-sm">Logout</a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <section>
            <?php
            if(isset($_GET['p'])) {
              if($_GET['p'] == 'produk') {
                require_once 'produk/produk.php';
              } else if($_GET['p'] == 'pelanggan') {
                require_once 'pelanggan/pelanggan.php';
              } else if($_GET['p'] == 'pembelian') {
                require_once 'pembelian.php';
              } else if($_GET['p'] == 'detail') {
                require_once 'detail.php';
              } else if($_GET['p'] == 'tambah_produk') {
                require_once 'produk/tambah_produk.php';
              } else if($_GET['p'] == 'home') {
                require_once 'home.php';
              } else if($_GET['p'] == 'tambah_pelanggan') {
                require_once 'pelanggan/tambah_pelanggan.php';
              } else if($_GET['p'] == 'hapusproduk') {
                require_once 'produk/hapus_produk.php';
              } else if($_GET['p'] == 'ubahproduk') {
                require_once 'produk/ubah_produk.php';
              } else if($_GET['p'] == 'ubahpelanggan') {
                require_once 'pelanggan/ubah_pelanggan.php';
              } else if($_GET['p'] == 'hapuspelanggan') {
                require_once 'pelanggan/hapus_pelanggan.php';
              } else if($_GET['p'] == 'logout') {
                require_once 'logout.php';
              } else if($_GET['p'] == 'pembayaran') {
                require_once 'pembayaran.php';
              }
            } 
            ?>
            </section>
          </div>
        </div>
      </div>
      <footer class="footer" style="position: absolute; bottom: 0; width: -webkit-fill-available;">
        <div class="container-fluid mt-5">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="https://www.creative-tim.com" target="_blank">Creative Tim</a></li>
                <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © 2020, made with <i class="fa fa-heart heart"></i> by Creative Tim
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
</body>

</html>
