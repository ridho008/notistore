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
            <!-- <div class="col-md-2 float-right">
            <a href="checkout.php" class="btn btn-info">Checkout</a>
            </div> -->
          <h4 class="card-title">Checkout</h4>
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
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $totalbelanja = 0;
                    $totalBerat = 0;
                    foreach($keranjang as $id_produk => $jumlah) : ?>
                    <!-- menampilkan produk yg sedang di perulangkan berdasarkan id_produk -->
                    <?php 
                    $no = 1;
                    $queryK = $conn->query("SELECT * FROM tb_produk WHERE id_produk = $id_produk") or die(mysqli_error($conn));
                    $row = $queryK->fetch_assoc();
                    // harga di kali dengan jumlah barang yang di beli
                    $subharga = $row['harga_produk'] * $jumlah;
                    // var_dump($row);
                    // subharga diperoleh dari berat produk x jumlah
                    $subberat = $row['berat_produk'] * $jumlah;
                    $totalBerat += $subberat;

                    ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $row['nama_produk']; ?></td>
                      <td><?= number_format($row['harga_produk']); ?></td>
                      <td><?= $jumlah; ?></td>
                      <td>Rp.<?= number_format($subharga); ?></td>
                    </tr>
                    <?php $no++; ?>
                    <?php $totalbelanja += $subharga; ?>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="4">Total Belanja</td>
                      <td>Rp. <?= number_format($totalbelanja); ?></td>
                    </tr>
                  </tfoot>
              </table>
            </div>
            <div class="row">
              <div class="col-md-4 mt-3">
                <form action="" method="post">
                  <div class="form-group">
                    <input type="text" readonly="" value="<?= $_SESSION['pelanggan']['nama_pelanggan'] ?>" class="form-control">
                  </div>
              </div>
              <div class="col-md-4 mt-3">
                  <div class="form-group">
                    <input type="text" readonly="" value="<?= $_SESSION['pelanggan']['telepon_pelanggan'] ?>" class="form-control">
                  </div>
              </div>
              <!-- <div class="col-md-4 mt-3">
                  <div class="form-group">
                    <select name="id_ongkir" class="form-control">
                      <option value="">Pilih Ongkir</option>
                      <?php 
                      $ongkir = $conn->query("SELECT * FROM tb_ongkir") or die(mysqli_error($conn));
                      while($rowO = $ongkir->fetch_assoc()) {
                      ?>
                      <option value="<?= $rowO['id_ongkir']; ?>"><?= $rowO['nama_kota'] . " - " . "Rp. " . number_format($rowO['tarif']); ?></option>
                      <?php } ?>
                    </select>
                  </div>
              </div> -->
              <div class="col-md-12">
                  <div class="form-group">
                    <label>Alamat Pengiriman</label>
                    <textarea name="alamat_pengiriman" class="form-control" cols="30" rows="10" placeholder="Masukan alamat lengkap anda, beserta kode pos"></textarea>
                  </div>
              </div>
              <div class="col-md-3">
              <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <select name="provinsi" id="provinsi" class="form-control">
                    </select>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="distrik">Distrik</label>
                  <select name="distrik" id="distrik" class="form-control">
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="ekspedisi">Ekspedisi</label>
                  <select name="ekspedisi" id="ekspedisi" class="form-control">
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="paket">Paket</label>
                  <select name="paket" id="paket" class="form-control">
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <input type="text" name="total_berat" value="<?= $totalBerat; ?>" class="form-control">
                  <input type="text" name="input_provinsi" class="form-control">
                  <input type="text" name="input_distrik" class="form-control">
                  <input type="text" name="input_tipe" class="form-control">
                  <input type="text" name="input_kodepos" class="form-control">
                  <input type="text" name="input_ekspedisi" class="form-control">
                  <input type="text" name="input_paket" class="form-control">
                  <input type="text" name="input_ongkir" class="form-control">
                  <input type="text" name="input_estimasi" class="form-control">
                </div>
              </div>
              <div class="col-md-6 offset-md-6">
                  <div class="form-group">
                    <button type="submit" name="checkout" class="btn btn-primary float-right">Checkout</button>
                  </div>
              </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

</div> <!-- main-panel -->

<?php 
// jika tombol checkout di klik
if(isset($_POST['checkout'])) {
  $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
  // $id_ongkir = $_POST['id_ongkir'];
  $tanggal_pembelian = date('Y-m-d');
  $alamat_pengiriman = $_POST['alamat_pengiriman'];

  $totalberat = $_POST['total_berat'];
  $provinsi = $_POST['input_provinsi'];
  $distrik = $_POST['input_distrik'];
  $tipe = $_POST['input_tipe'];
  $kodepos = $_POST['input_kodepos'];
  $ekpedisi = $_POST['input_ekspedisi'];
  $paket = $_POST['input_paket'];
  $ongkir = $_POST['input_ongkir'];
  $estimasi = $_POST['input_estimasi'];

  // if(empty($id_ongkir)) {
  //   echo "<script>alert('Pilih dulu ongkir anda.')</script>";
  //   return false;
  // }

  if(empty($alamat_pengiriman)) {
    echo "<script>alert('Isi alamat lengkap anda dulu.')</script>";
    return false;
  }

  // $ambilOngkir = $conn->query("SELECT * FROM tb_ongkir WHERE id_ongkir = '$id_ongkir'") or die(mysqli_error($conn));
  // $pecah = $ambilOngkir->fetch_assoc();
  // $nama_kota = $pecah['nama_kota'];
  // $tarif = $pecah['tarif'];

  $total_pembelian = $totalbelanja + $ongkir;

  // menynimpan data ke tabel pembelian
  $conn->query("INSERT INTO tb_pembelian (id_pelanggan, tgl_pembelian, total_pembelian, alamat_pengiriman, resi_pengiriman, totalberat, provinsi, distrik, tipe, kodepos, ekspedisi, paket, ongkir, estimasi) VALUES('$id_pelanggan', '$tanggal_pembelian', '$total_pembelian', '$alamat_pengiriman', '0', '$totalberat', '$provinsi', '$distrik', '$tipe', '$kodepos', '$ekpedisi', '$paket', '$ongkir', '$estimasi')") or die(mysqli_error($conn));

  // mendapatkan id_pembelian barusan terjadi
  $id_pembelian_barusan = $conn->insert_id;

  foreach($_SESSION['keranjang'] as $id_produk => $jumlah) {
    // mendapatkan data produk berdasarkan id_produk
    $ambil = $conn->query("SELECT * FROM tb_produk WHERE id_produk = $id_produk") or die(mysqli_error($conn));
    $perproduk = $ambil->fetch_assoc();
    $nama = $perproduk['nama_produk'];
    $harga = $perproduk['harga_produk'];
    $berat = $perproduk['berat_produk'];

    $subberat = $perproduk['berat_produk'] * $jumlah;
    $subharga = $perproduk['harga_produk'] * $jumlah;

    $conn->query("INSERT INTO tb_pembelian_produk (id_pembelian, id_produk, jumlah, nama, harga, berat, subberat, subharga) VALUES('$id_pembelian_barusan', '$id_produk', '$jumlah', '$nama', '$harga', '$berat', '$subberat', '$subharga')") or die(mysqli_error($conn));

    // mengurangi jumlah stok yg sudah di beli
    $conn->query("UPDATE tb_produk SET stok_produk = stok_produk -$jumlah WHERE id_produk = '$id_produk'") or die(mysqli_error($conn));
  }

  // mengkosongkan keranjang belanja
  unset($_SESSION['keranjang']);

  // tampilkan dialihkan ke halaman nota, nota dari pembelian yang barusan terjadi
  echo "<script>alert('Pembelian berhasil.');window.location='nota.php?id=$id_pembelian_barusan';</script>";

}
// var_dump($_SESSION['keranjang']);

 ?>

<script src="admin/assets/js/jquery-3.5.1.js"></script>
  <script>
      $(document).ready(function() {
        $.ajax({
          type: 'post',
          url: 'assets/apirajaongkir/data_provinsi.php',
          success: function(hasil_provinsi) {
            $('select[name=provinsi]').html(hasil_provinsi);
          }
        });

        // data distrik
        $('select[name=provinsi]').on('change', function() {
          // ambil id_provinsi dari select provinsi yang di pilih (dari atribut pribadi)
          const id_provinsi_terpilih = $('option:selected',this).attr('id_provinsi');
          // alert(id_provinsi_terpilih);
          $.ajax({
            type: 'post',
            url: 'assets/apirajaongkir/data_distrik.php',
            data: 'id_provinsi=' + id_provinsi_terpilih,
            success: function(hasil_distrik) {
              // console.log(hasil_distrik);
              $('select[name=distrik]').html(hasil_distrik);
            }
          });
        });

        // ekspedisi
        $.ajax({
          type: 'post',
          url: 'assets/apirajaongkir/data_ekspedisi.php',
          success: function(hasil_ekspedisi) {
            // console.log(hasil_ekspedisi);
            $('select[name=ekspedisi]').html(hasil_ekspedisi);
          }
        });

        // ongkir
        $('select[name=ekspedisi]').on('change', function() {
          // mendapatkan ongkos kirim

          // mendapatkan ekspedisi yang dipilih
          const ekspedisi_terpilih = $('select[name=ekspedisi]').val();
          // alert(ekspedisi_terpilih);

          // mendapatkan id_distrik yang dipilih pengguna
          const disktrik_terpilih = $('option:selected', 'select[name=distrik]').attr('id_distrik');
          // alert(disktrik_terpilih);

          // mendapatkan total_berat dari inputan
          const total_berat = $('input[name=total_berat]').val();
          $.ajax({
            type: 'post',
            url: 'assets/apirajaongkir/data_paket.php',
            data: 'ekspedisi='+ ekspedisi_terpilih +'&distrik='+ disktrik_terpilih +'&berat=' + total_berat,
            success: function(hasil_paket) {
              // console.log(hasil_paket);
              $('select[name=paket]').html(hasil_paket);

              // letakkan nama ekpedisi terpilih di input ekspedisi
              $('input[name=input_ekspedisi]').val(ekspedisi_terpilih);
            }
          });
        });

        // ketika inputan distrik klik pilih, atau nama kab/kota
        $('select[name=distrik]').on('change', function() {
          const prov = $('option:selected', this).attr('nama_provinsi');
          const dist = $('option:selected', this).attr('nama_distrik');
          const typ = $('option:selected', this).attr('tipe_distrik');
          const kodep = $('option:selected', this).attr('kodepos');
          // alert(prov);

          $('input[name=input_provinsi]').val(prov);
          $('input[name=input_distrik]').val(dist);
          $('input[name=input_tipe]').val(typ);
          $('input[name=input_kodepos]').val(kodep);
        });

        // ketika inputan paket/ongkir di klik & memilih pos, jne, tiki
        $('select[name=paket]').on('change', function() {
          const paket = $('option:selected', this).attr('paket');
          const ongkir = $('option:selected', this).attr('ongkir');
          const etd = $('option:selected', this).attr('etd');

          $('input[name=input_paket').val(paket);
          $('input[name=input_ongkir').val(ongkir);
          $('input[name=input_estimasi').val(etd);
        });
      });
    </script>