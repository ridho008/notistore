<h3 class="description">Data Produk</h3>

<div class="row">
<div class="col-md-12">
  <a href="index.php?p=tambah_produk" class="btn btn-danger">Tambah Data Produk</a>
    <div class="card">
      <!-- <div class="card-header">
        <h4 class="card-title"> Simple Table</h4>
      </div> -->
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>No</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Berat</th>
              <th>Foto</th>
              <th>Aksi</th>
              <!-- <th class="text-right">
                Salary
              </th> -->
            </thead>
            <tbody>
              <?php 
              $no = 1;
              $produk = $conn->query("SELECT * FROM tb_produk") or die(mysqli_error($conn));
              while($row = $produk->fetch_assoc()) {
              ?>
              <tr>
              	<td><?= $no++; ?></td>
              	<td><?= $row['nama_produk']; ?></td>
              	<td><?= $row['harga_produk']; ?></td>
              	<td><?= $row['berat_produk']; ?></td>
              	<td>
                 <img src="../gambar/produk/<?= $row['foto_produk']; ?>" width="100"> 
                </td>
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