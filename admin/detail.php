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
                <div class="places-buttons">
                  <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center">
								    <h5 class="card-title">Nama : <?= $detail['nama_pelanggan'] ?></h5>
								    <h5 class="card-title">Email : <?= $detail['email_pelanggan'] ?></h5>
								    <h5 class="card-title">Tanggal : <?= $detail['tgl_pembelian'] ?></h5>
								    <h5 class="card-title">Total : <?= $detail['total_pembelian'] ?></h5>
								  </div>
                  </div> <!-- endrow -->
                    	
                    		
                    	
                      
                  </div>	
                </div>
              </div>
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
								<td><?= $row['harga_produk']; ?></td>
								<td><?= $row['jumlah']; ?></td>
								<td>
									<?= $row['harga_produk'] * $row['jumlah']; ?>
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