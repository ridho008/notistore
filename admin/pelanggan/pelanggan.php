<h3 class="description">Data Pelanggan</h3>

<div class="row">
<div class="col-md-12">
  <a href="index.php?p=tambah_pelanggan" class="btn btn-danger">Tambah Data Pelanggan</a>
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
              <th>Email</th>
              <th>Telepon</th>
              <th>Aksi</th>
              <!-- <th class="text-right">
                Salary
              </th> -->
            </thead>
            <tbody>
              <?php 
              $no = 1;
              $pelanggan = $conn->query("SELECT * FROM tb_pelanggan") or die(mysqli_error($conn));
              while($row = $pelanggan->fetch_assoc()) {
              ?>
              <tr>
              	<td><?= $no++; ?></td>
              	<td><?= $row['nama_pelanggan']; ?></td>
              	<td><?= $row['email_pelanggan']; ?></td>
              	<td><?= $row['telepon_pelanggan']; ?></td>
              	<td>
              		<a href="" class="btn btn-danger btn-sm">Hapus</a>
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