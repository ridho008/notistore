<h3 class="description">Data Kategori</h3>

<div class="row">
<div class="col-md-12">
  <a href="index.php?p=tambah_kategori" class="btn btn-danger">Tambah Data Kategori</a>
    <div class="card">
      <div class="card-header">
        <!-- <h4 class="card-title"> Simple Table</h4> -->
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>No</th>
              <th>Nama Kategori</th>
              <!-- <th class="text-right">
                Salary
              </th> -->
            </thead>
            <tbody>
              <?php
              $no = 1; 
              $ambil = $conn->query("SELECT * FROM tb_kategori") or die(mysqli_error($conn));
              while($pecah = $ambil->fetch_assoc()) {
              ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $pecah['nama_kategori']; ?></td>
                <td>
                  <a href="" class="btn btn-info">Ubah</a>
                  <a href="" class="btn btn-danger">Hapus</a>
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