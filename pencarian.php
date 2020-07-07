<?php 
session_start();
require_once 'admin/config/koneksi.php';

$keyword = $_GET['keyword'];
// echo $keyword;
$semuaData = [];
$ambil = $conn->query("SELECT * FROM tb_produk WHERE 
  nama_produk LIKE '%$keyword%' OR
  deskripsi_produk LIKE '%$keyword%'
  ") or die(mysqli_error($conn));
while($pecah = $ambil->fetch_assoc()) {
  $semuaData[] = $pecah;
}

// echo "<pre>";
// var_dump($semuaData);
// echo "</pre>";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="admin/assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="admin/assets/demo/demo.css" rel="stylesheet" />

    <title>Noti Store | Toko Online Indonesia</title>
  </head>
  <body>

<div class="main-panel" style="width: 100%;">
<!-- Navbar/Menu.php -->
<?php require_once 'themeplates/menu.php'; ?>

<div class="content">
      
      <div class="row">
        <div class="col-md-6">
          <?php if(empty($semuaData)) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong><?= $keyword; ?></strong> tidak ditemukan.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php else : ?>
              <h4>Hasil Pencarian <?= $keyword; ?></h4>
          <?php endif; ?>
        </div>
      </div>
    <div class="row">
      <?php foreach($semuaData as $key => $value) : ?>
      <div class="col-md-3">
            <div class="card card-user">
              <img class="card-img-top" src="gambar/produk/<?= $value['foto_produk']; ?>" alt="Card image cap" width="300">
              <div class="card-body">
                <div class="author">
                <a href="#">
                    <img class="avatar border-gray" src="gambar/Profile.jpg" alt="...">
                    <h5 class="title"><?= $value['nama_produk']; ?></h5>
                  </a>
                <p class="card-text"><?= $value['deskripsi_produk']; ?></p>
                </div>
                <div class="col-md text-center">
                  <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="nc-icon nc-tag-content"></i></btn>
                  <span class="text-muted"><small>Rp.<?= number_format($value['harga_produk']); ?></small></span>
                </div>
                <div class="col-md-3 col-3 text-right">
                        
                      </div>
             
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="ml-auto mr-auto">
                      <a href="beli.php?id=<?= $value['id_produk']; ?>" class="btn btn-primary mt-1"><i class="nc-icon nc-cart-simple"></i> Beli</a>
                      <a href="detail.php?id=<?= $value['id_produk']; ?>" class="btn btn-secondary mt-1"><i class="nc-icon nc-cart-simple"></i> Detail</a>
                    </div>
                  </div>
                </div>
              </div>
               </div>
            </div>
              </div>
            <?php endforeach; ?>
            </div>
          </div>
    </div>
  </div>
</div> <!-- main-panel -->



  <!--   Core JS Files   -->
  <script src="admin/assets/js/core/jquery.min.js"></script>
  <script src="admin/assets/js/core/popper.min.js"></script>
  <script src="admin/assets/js/core/bootstrap.min.js"></script>
  <script src="admin/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="admin/assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="admin/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="admin/assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="admin/assets/demo/demo.js"></script>
  <script>
    function SelectText(element) {
      var doc = document,
        text = element,
        range, selection;
      if (doc.body.createTextRange) {
        range = document.body.createTextRange();
        range.moveToElementText(text);
        range.select();
      } else if (window.getSelection) {
        selection = window.getSelection();
        range = document.createRange();
        range.selectNodeContents(text);
        selection.removeAllRanges();
        selection.addRange(range);
      }
    }
    window.onload = function() {
      var iconsWrapper = document.getElementById('icons-wrapper'),
        listItems = iconsWrapper.getElementsByTagName('li');
      for (var i = 0; i < listItems.length; i++) {
        listItems[i].onclick = function fun(event) {
          var selectedTagName = event.target.tagName.toLowerCase();
          if (selectedTagName == 'p' || selectedTagName == 'em') {
            SelectText(event.target);
          } else if (selectedTagName == 'input') {
            event.target.setSelectionRange(0, event.target.value.length);
          }
        }

        var beforeContentChar = window.getComputedStyle(listItems[i].getElementsByTagName('i')[0], '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, ""),
          beforeContent = beforeContentChar.charCodeAt(0).toString(16);
        var beforeContentElement = document.createElement("em");
        beforeContentElement.textContent = "\\" + beforeContent;
        listItems[i].appendChild(beforeContentElement);

        //create input element to copy/paste chart
        var charCharac = document.createElement('input');
        charCharac.setAttribute('type', 'text');
        charCharac.setAttribute('maxlength', '1');
        charCharac.setAttribute('readonly', 'true');
        charCharac.setAttribute('value', beforeContentChar);
        listItems[i].appendChild(charCharac);
      }
    }
  </script>
  </body>
</html>