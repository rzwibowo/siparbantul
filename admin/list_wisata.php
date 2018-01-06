<?php

include "../konfigurasi/sesi.php";
if (!isset($_SESSION['login_user'])) {

  header("location:../konfigurasi/login.php");
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
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
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
        <li class="active treeview">
          <a href="list_wisata.php">
            <i class="fa fa-fw fa-th-list"></i> <span>List Wisata</span>
              </a>
        </li>
        <li>
          <a href="input_wisata.php">
            <i class="fa fa-fw fa-file-text-o"></i> <span>Input Data</span>
              </a>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Destinasi Wisata
        <small>All Data <i class="fa fa-fw fa-bar-chart"></i></small>
      </h1>
    </section>

 <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">

            <div class="box-body">
              <?php
                      include "../konfigurasi/config.php";
                      $sqlwisata = "SELECT wisata.id_wisata, wisata.nama_wisata, wisata.alamat, wisata.id_kategori, kategori.nama_kategori FROM wisata, kategori WHERE wisata.id_kategori = kategori.id_kategori";
                    $hasil = $db->query($sqlwisata);
                    $nomer = 0;
                     if ($hasil->num_rows > 0) {
                       echo "
                         <table class='table table-bordered'>
                <tr>
                  <th style='width: 10px'>No.</th>
                  <th>Nama Wisata</th>
                  <th> Alamat</th>
                  <th style='width: 120px'> Kategori</th>
                  <th style='width: 150px'> Tindakan </th>
                </tr> ";

                    while($data=$hasil->fetch_assoc()){
                      $nomer++;

                      $id = $data["id_wisata"];
                      echo "
                <tr>
                  <td>  $nomer </td>
                  <td>" .$data["nama_wisata"]."</td>
                  <td>" .$data["alamat"]. "</td>
                  <td>" .$data["nama_kategori"]. "</td>
                  <td><a href='edit_wisata.php?id_wisata=".$data["id_wisata"]."' class='fa fa-edit'> Edit </a> &nbsp; <a href='hapus_proses.php?id_wisata=".$data["id_wisata"]."' class='fa fa-trash' data-toggle='modal' data-target='#hapus'> Hapus </a>
                </td>
                </tr>";}
                echo " </table>";
                     } else {
                      echo "0 results";
                     }
                    ?>

            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>

  </div>

<script>
        function hapus()
        {    $('#hapus').modal('show');
        }
      </script>

      <div id="hapus" class="modal fade" role="dialog">
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
                                    <p>Yakin menghapus data ini?...</p>


                              </div>

                            <!-- footer modal -->
                           <div class="modal-footer">
                             <button type="button" class="btn btn-default pull-left" data-dismiss="modal"> Batal </button>
                             <button type="button" id="ya"> Hapus </button>
                           </div>

                         </div>
                         </div>
                        </div>
      </div>


  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2017 SKRIPSI Persepsi Kemudahan Kegunaan Sistem Informasi Pariwisata Di Kabupaten Bantul.</strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
