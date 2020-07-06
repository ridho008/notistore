<?php 
// mendapatkan id_pembelian melalui url
$id_pembelian = $_GET['id'];

// mengambil data tb pembayaran dengan id_pembelian
$ambil = $conn->query("SELECT * FROM tb_pembayaran WHERE id_pembelian = $id_pembelian") or die(mysqli_error($conn));
$detail = $ambil->fetch_assoc();

// jika tombol proses diklik
if(isset($_POST['proses'])) {
	$resi = $_POST['resi'];
	$status = $_POST['status'];

	$conn->query("UPDATE tb_pembelian SET resi_pengiriman = '$resi', status_pembelian = '$status' WHERE id_pembelian = $id_pembelian") or die(mysqli_error($conn));
	echo "<script>alert('data pembelian sudah di update.');window.location='index.php?p=pembelian';</script>";
}

?>
<h3 class="description">Data Pembayaran</h3>
<!-- <pre><?php var_dump($detail); ?></pre> -->

<div class="row" style="height: 100vh;">
	<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Data Pembayaran</h4>
      </div>
      <div class="card-body">
      	<div class="row">
	      	<div class="col-md-6">
		        <div class="table-responsive">
							<table class="table">
									<tr>
										<th>Nama</th>
										<td><?= $detail['nama']; ?></td>
									</tr>
									<tr>
										<th>BANK</th>
										<td><?= $detail['bank']; ?></td>
									</tr>
									<tr>
										<th>Jumlah</th>
										<td><?= $detail['jumlah']; ?></td>
									</tr>
									<tr>
										<th>Nama</th>
										<td><?= $detail['tanggal']; ?></td>
									</tr>
							</table>
						</div>
						<form action="" method="post">
							<div class="form-group">
								<label for="resi">No. Resi Pengiriman</label>
								<input type="text" class="form-control" id="resi" name="resi">
							</div>
							<div class="form-group">
								<label for="status">Status</label>
								<select name="status" id="status" class="form-control">
									<option value="">Pilih Status</option>
									<option value="barang dikirim">Barang Dikirim</option>
									<option value="batal">Batal</option>
								</select>
							</div>
							<div class="form-group">
								<button type="submit" name="proses" class="btn btn-primary">Proses</button>
							</div>
						</form>
					</div>
					<div class="col-md-6">
						<img src="../gambar/bukti/<?= $detail['bukti']; ?>">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>