<?php 
require_once 'config/koneksi.php';
?>
<h3 class="description">Detail Pembelian</h3>

<?php 
$idD = $_GET['id'];
$detailPembelian = $conn->query("SELECT * FROM tb_pembelian JOIN tb_pelanggan ON tb_pembelian.id_pelanggan = tb_pelanggan.id_pelanggan WHERE tb_pembelian.id_pembelian = $idD") or die(mysqli_error($conn));
$detail = $detailPembelian->fetch_assoc();

?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <h5>Pembelian</h5>
            <p>
              Tanggal : <?= date('d F Y', strtotime($detail['tgl_pembelian'])); ?><br>
              Total : <?= number_format($detail['total_pembelian']); ?><br>
              Status : <?= $detail['status_pembelian']; ?>
            </p>
          </div>
          <div class="col-md-4">
            <h5>Pelanggan</h5>
            <b><?= $detail['nama_pelanggan']; ?></b>
            <p>
              <?= $detail['telepon_pelanggan']; ?><br>
              <?= $detail['email_pelanggan'] ?>
            </p>
          </div>
          <div class="col-md-4">
            <h5>Pengiriman</h5>
            <p class="card-title"><?= $detail['tipe']; ?>, <?= $detail['distrik']; ?>, <?= $detail['provinsi']; ?></p>
                    <p class="card-title">Ongkos Kirim : Rp. <?= $detail['ongkir'] ?></p>
                    <p class="card-title">Ekspedisi : <?= $detail['ekspedisi']; ?>, <?= $detail['paket']; ?>, <?= $detail['estimasi']; ?></p>
                    <p class="card-title">Alamat : Rp. <?= $detail['alamat_pengiriman'] ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row" style="height: 100vh;">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
			<div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>No</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Sub Total</th>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              $pembelian_produk = $conn->query("SELECT * FROM tb_pembelian_produk JOIN tb_produk ON tb_pembelian_produk.id_produk = tb_produk.id_produk WHERE tb_pembelian_produk.id_pembelian = $idD") or die(mysqli_error($conn));
              while($row = $pembelian_produk->fetch_assoc()) {
              ?>
              <tr>
              	<td><?= $no++; ?></td>
								<td><?= $row['nama_produk']; ?></td>
								<td>Rp. <?= number_format($row['harga_produk']); ?></td>
								<td><?= $row['jumlah']; ?></td>
								<td>
									<?= number_format($row['harga_produk'] * $row['jumlah']); ?>
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