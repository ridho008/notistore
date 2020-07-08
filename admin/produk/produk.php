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
              <th>Kategori</th>
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
              $produk = $conn->query("SELECT * FROM tb_produk JOIN tb_kategori ON tb_produk.id_kategori = tb_kategori.id_kategori") or die(mysqli_error($conn));
              while($row = $produk->fetch_assoc()) {
              ?>
              <tr>
              	<td><?= $no++; ?></td>
              	<td><?= $row['nama_produk']; ?></td>
                <td><?= $row['nama_kategori']; ?></td>
              	<td><?= $row['harga_produk']; ?></td>
              	<td><?= $row['berat_produk']; ?></td>
              	<td>
                 <img src="../gambar/produk/<?= $row['foto_produk']; ?>" width="100"> 
                </td>
              	<td>
              		<a href="index.php?p=hapusproduk&id=<?= $row['id_produk']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ?')">Hapus</a>
              		<a href="index.php?p=ubahproduk&id=<?= $row['id_produk']; ?>" class="btn btn-info btn-sm">Ubah</a>
                  <a href="index.php?p=detailproduk&id=<?= $row['id_produk']; ?>" class="btn btn-success btn-sm">Detail</a>
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