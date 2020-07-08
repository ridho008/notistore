<?php 
$id_produk = $_GET['id'];

$ambilPoduk = $conn->query("SELECT * FROM tb_produk INNER JOIN tb_kategori ON tb_produk.id_kategori = tb_kategori.id_kategori WHERE id_produk = $id_produk") or die(mysqli_error($conn));
$detailProduk = $ambilPoduk->fetch_assoc();

// mengambil tb_produk_foto berdasarkan idnya
$fotoProduk = [];
$ambilFotoProduk = $conn->query("SELECT * FROM tb_produk_foto WHERE id_produk = $id_produk") or die(mysqli_error($conn));
while($ambilFoto = $ambilFotoProduk->fetch_assoc()) {
  $fotoProduk[] = $ambilFoto;
}


?>
<!-- <pre>
  <?php var_dump($detailProduk); ?>
  <?php var_dump($fotoProduk); ?>
</pre> -->
<h3 class="description">Data Detail</h3>

<div class="row">
<div class="col-md-12" style="height: 100vh;">
    <div class="card">
      <!-- <div class="card-header">
        <h4 class="card-title"> Simple Table</h4>
      </div> -->
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
              <tr>
                <th>Kategori</th>
                <td><?= $detailProduk['nama_kategori']; ?></td>
              </tr>
              <tr>
                <th>Produk</th>
                <td><?= $detailProduk['nama_produk']; ?></td>
              </tr>
              <tr>
                <th>Harga</th>
                <td>Rp. <?= number_format($detailProduk['harga_produk']); ?></td>
              </tr>
              <tr>
                <th>Berat</th>
                <td><?= $detailProduk['berat_produk']; ?></td>
              </tr>
              <tr>
                <th>Deskripsi</th>
                <td><?= $detailProduk['deskripsi_produk']; ?></td>
              </tr>
              <tr>
                <th>Stok</th>
                <td><?= $detailProduk['stok_produk']; ?></td>
              </tr>
          </table>
        </div>
        <div class="row mt-2">
          <?php foreach($fotoProduk as $key => $value) : ?>
            <?php if($key === 0) : ?>
          <div class="col-md-4 text-center">
            <img src="../gambar/produk/<?= $value['nama_produk_foto']; ?>" width="300">
            <div class="alert"></div>
          </div>
          <?php else: ?>
            <div class="col-md-4 text-center">
            <img src="../gambar/produk/<?= $value['nama_produk_foto']; ?>" width="300">
            <a href="index.php?p=hapusfotoproduk&idfoto=<?= $value['id_produk_foto']; ?>&idproduk=<?= $id_produk; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            <div class="alert"></div>
          </div>
        <?php endif; ?>
        <?php endforeach; ?>
        </div>
      <div class="row">
        <div class="col-md-6">
          <form action="" method="post" enctype="multipart/form-data">
            <label for="file_foto">File Foto</label><br>
            <input type="file" name="file_foto" id="file_foto">
            <div class="form-group">
              <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
        <?php if(isset($_POST['simpan'])) {
          $lokasiFoto = $_FILES['file_foto']['tmp_name'];
          $namaFoto = $_FILES['file_foto']['name'];

          $namaFoto = date("YmdHis") . $namaFoto;

          // upload
          move_uploaded_file($lokasiFoto, '../gambar/produk/' . $namaFoto);

          $conn->query("INSERT INTO tb_produk_foto (id_produk, nama_produk_foto) VALUES ('$id_produk', '$namaFoto')") or die(mysqli_error($conn));
          echo "<script>alert('foto Produk Berhasil Disimpan.');window.location='index.php?p=detailproduk&id=$id_produk';</script>";

        } 
        ?>
      </div>
      </div>
    </div>
  </div>
  </div>