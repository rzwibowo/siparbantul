<?php
include "../konfigurasi/sesi.php";
include "../konfigurasi/config.php";
  if (!isset($_SESSION['login_user'])) {
      header("location:../konfigurasi/login.php");
  }else {
    $id_wisata = $_GET['id_wisata'];
    $result = $db->query("SELECT w.nama_wisata nama_wisata,w.alamat alamat,w.deskripsi deskripsi,w.latitude latitude, w.longitude longitude, k.nama_kategori nama_kategori FROM wisata w
                          JOIN kategori k on w.id_kategori = k.id_kategori  WHERE id_wisata = '$id_wisata'")->fetch_assoc();
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>PKKSIP BANTUL</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<style>
  .example-modal .modal {
  position: relative;
  top: auto;
  bottom: auto;
  right: auto;
  left: auto;
  display: block;
  z-index: 1;
  }

  .example-modal .modal {
  background: transparent !important;
  }
  input[type=file]{

      color:transparent;
  }
</style>
</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <header class="main-header">

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         <!-- User Account: style can be found in dropdown.less -->
         <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/user3-128x128.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Miftahul Huda</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                <p>
                  Miftahul Huda
                  <small>Since November. 2017</small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../konfigurasi/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
         <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Navigasi Admin</li>
            <li>
              <a href="../konfigurasi/index.php">
                <i class="fa fa-dashboard"></i> <span>Beranda</span>
              </a>
            </li>
            <li>
              <a href="list_kategori.php">
                <i class="fa fa-fw fa-th-list"></i> <span>List Kategori</span>
              </a>
            </li>
            <li>
              <a href="list_wisata.php">
                <i class="fa fa-fw fa-th-list"></i> <span>List Wisata</span>
              </a>
            </li>
            <li class="active treeview">
              <a href="input_wisata.php">
                <i class="fa fa-fw fa-file-text-o"></i> <span>Input Data Wisata</span>
              </a>
            </li>
        </section>
          <!-- /.sidebar -->
    </aside>
      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- /.box -->
            <!-- general form elements disabled -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Detail Data Wisata</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">

                <div>
                  <!-- text input -->
                  <div class="form-group">
                    <label>Nama Wisata : </label>
                    <span><?php echo $result['nama_wisata']?></span>
                  </div>
                  <!-- textarea -->
                  <div class="form-group">
                    <label> Alamat :</label>
                    <span> <?php echo $result['alamat']?></span>
                  </div>
                  <!-- select -->
                  <div class="form-group">
                    <label>Kategori :</label>
                    <span><?php echo  $result['nama_kategori'];?></span>
                  </div>
                  <div class="form-group">
                    <label>Latitude:</label>
                    <span id="latitude"><?php echo  $result['latitude'];?></span>
                  </div>
                  <div class="form-group">
                    <label>Longitude:</label>
                    <span id="longitude"><?php echo  $result['longitude'];?></span>
                  </div>
                  <div class="form-group">
                    <label>Deskripsi:</label>
                    <span><?php echo $result['deskripsi']; ?></span>
                  </div>
                  <div class="form-group">
                   <label>Lokasi:</label>
                    <div class="col-md-12">
                      <div class="peta-wisata" style="height: 15em; background-color: rgb(153, 204, 153);"  id="map">
                        <!-- PERHATIAN: hilangkan atribut style saat sudah menggunakan maps sesungguhnya -->

                      </div>
                    </div>
                  </div>
                  <div class='form-group'>
                  <label>Foto:</label>
                  <div id="ViewFoto" class="row">
                  <?php
                   $query = $db->query("SELECT * FROM foto WHERE id_wisata=$id_wisata");
                      while($Foto=mysqli_fetch_array($query)){
                      echo "<div class='col-md-4'><img src='../Images/".$Foto['nama']."' class='img-thumbnail'></img></div>";
                      }
                  ?>
                  </div>
                </div>
                <div class="form-group">
                   <a class="btn btn-default pull-left" href="list_wisata.php">Kembali </a>
                </div>
              </div>

              </div>
               </div>
                <!-- /.box-body -->
              </div>
               <!-- /.box -->
            </div>
             <!--/.col (right) -->
          </div>
           <!-- /.row -->
        </section>
            <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
   </ul>
  </section>
</div>

  <!-- Modal -->
  <script>
    function kategori()
    {    $('#kategori').modal('show');
    }
    function CheckInput(){
      var IsValid = true;

    }
    function RedFile(input){
      if(input.files.length > 0){
    $('#ViewFoto').empty();
    if (input.files) {
    var reader = new FileReader();
    for (i = 0; i < input.files.length; i++) {
        var reader = new FileReader();
        reader.onload = function(e) {
             $('#ViewFoto').append("<div class='col-md-4'><img src="+e.target.result+" class='img-thumbnail'></img></div>");
        }
    reader.readAsDataURL(input.files[i]);
    }
    }
    }
    }
    function clearFoto(){
      $('#ViewFoto').empty();
      var input = $("#foto");
      input.replaceWith(input.val('').clone(true));
    }
  </script>

  <div id="kategori" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                       <!-- konten modal-->
                     <div class="modal-content">
                       <!-- heading modal -->
                        <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Input Kategori</h4>
                       </div>
                         <!-- body modal -->
                       <div class="modal-body">
                          <div class="box-body">
                                <p>Masukan Kategori Baru</p>

                                <form role="form" action="input_kategori.php" method="get">
                                <!-- text input -->
                                    <div class="form-group">
                                      <label>Nama Kategori</label>
                                        <input type="text" class="form-control" placeholder="Enter ..." name="nama_kategori">
                                    </div>

                          </div>

                        <!-- footer modal -->
                       <div class="modal-footer">
                         <button type="button" class="btn btn-default pull-left" data-dismiss="modal"> Batal Simpan </button>
                         <button type="submit" name="submit" class="btn btn-warning"> Simpan </button>
                       </div>
                     </form>
                     </div>
                     </div>
                    </div>
  </div>

<footer class="main-footer">
  <div class="pull-right hidden-xs">
   <b>Version</b> 2.3.6
  </div>
  <strong>Copyright &copy; 2017 SKRIPSI Persepsi Kemudahan Kegunaan Sistem Informasi Pariwisata Di Kabupaten Bantul.</strong> All rights reserved.
</footer>


<!-- jQuery 2.2.3 -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCl_lUALnXByOhoR2C539GbSQrHfYwmUU&callback=initMap">
</script>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script type="text/javascript">
var latitude = parseFloat($('#latitude').html());
var longitude = parseFloat($('#longitude').html());
    function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: new google.maps.LatLng(latitude, longitude),
      zoom: 12,
    });
    var point = new google.maps.LatLng(
              latitude,
              longitude);

    var marker = new google.maps.Marker({
            map: map,
            position: point,
            label: ""
    });

    }
</script>
</body>
</html>
