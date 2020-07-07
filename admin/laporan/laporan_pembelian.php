<?php 
$tglMulai = "-";
$tglSampai = "-";
$semuadata = [];
if(isset($_POST['lihat'])) {
	$tglMulai = $_POST['tglm'];
	$tglSampai = $_POST['tgls'];

	$ambil = $conn->query("SELECT * FROM tb_pembelian pm LEFT JOIN tb_pelanggan pl ON pm.id_pelanggan = pl.id_pelanggan WHERE tgl_pembelian BETWEEN '$tglMulai' AND '$tglSampai'") or die(mysqli_error($conn));
	while($pecah = $ambil->fetch_assoc()) {
		$semuadata[] = $pecah;
	}
}

echo "<pre>";
var_dump($semuadata);
echo "</pre>";
?>
<h3 class="description">Data Laporan</h3>

<div class="row" style="height: 100vh;">
	<div class="col-md-12">
		<div class="card">
      <div class="card-body">
				<div class="row">
					<div class="col-md-5">
						<form action="" method="post">
							<div class="form-group">
								<label for="tglm">Dari Tanggal</label>
								<input type="date" name="tglm" id="tglm" class="form-control" value="<?= $tglMulai; ?>">
							</div>
						</div>
							<div class="col-md-5">
								<label for="tgls">Sampai Tanggal</label>
								<input type="date" name="tgls" id="tgls" class="form-control" value="<?= $tglSampai; ?>">
							</div>
							<div class="col-md-2 mt-3">
								<div class="form-group">
									<button type="submit" name="lihat" class="btn btn-primary btn-sm">Lihat</button>
								</div>
							</div>
						</form>
				</div>

				<div class="row">
					<div class="col-md-12">
						<h5>Laporan Pembelian Dari <?= $tglMulai ?> Hingga <?= $tglSampai; ?></h5>
						<table class="table">
							<thead>
							<tr>
								<th>No.</th>
								<th>Pelanggan</th>
								<th>Tanggal</th>
								<th>Jumlah</th>
								<th>Status</th>
							</tr>
							</thead>
							<tbody>
								<?php 
								$total = 0;
								foreach($semuadata as $key => $value) : ?>
								<?php 
								
								$total += $value['total_pembelian'];
								?>
							<tr>
								<td><?= $key + 1; ?></td>
								<td><?= $value['nama_pelanggan']; ?></td>
								<td><?= $value['tgl_pembelian']; ?></td>
								<td>Rp. <?= number_format($value['total_pembelian']); ?></td>
								<td><?= $value['status_pembelian']; ?></td>
							</tr>
								<?php endforeach ?>
							</tbody>
							<tfoot>
								<tr>
									<th colspan="3">Total</th>
									<th>Rp. <?= number_format($total); ?></th>
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>