<h3 class="description">Data Pembelian</h3>

<div class="row">
<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <!-- <h4 class="card-title"> Simple Table</h4> -->
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>No</th>
              <th>Nama Pelanggan</th>
              <th>Tanggal</th>
              <th>Total</th>
              <th>Aksi</th>
              <!-- <th class="text-right">
                Salary
              </th> -->
            </thead>
            <tbody>
              <?php 
              $no = 1;
              $pembelian = $conn->query("SELECT * FROM tb_pembelian JOIN tb_pelanggan ON tb_pembelian.id_pelanggan = tb_pelanggan.id_pelanggan") or die(mysqli_error($conn));
              while($row = $pembelian->fetch_assoc()) {
              ?>
              <tr>
              	<td><?= $no++; ?></td>
              	<td><?= $row['nama_pelanggan']; ?></td>
              	<td><?= $row['tgl_pembelian']; ?></td>
              	<td><?= $row['total_pembelian']; ?></td>
              	<td>
              		<a href="index.php?p=detail&id=<?= $row['id_pembelian'] ?>" class="btn btn-danger btn-sm">Details</a>
              		<a href="" class="btn btn-info btn-sm">Edit</a>
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