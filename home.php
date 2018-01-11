<?php
include "konfigurasi/sesi.php";
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
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- slick slider -->
  <link rel="stylesheet" type="text/css" href="plugins/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="plugins/slick/slick-theme.css"/>

  <!-- bar-rating -->
  <link rel="stylesheet" type="text/css" href="plugins/jquery-bar-rating/themes/bootstrap-stars.css">

  <!-- custom own css -->
  <link rel="stylesheet" type="text/css" href="css/me.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <style>

     /* .example-modal .modal {
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
      }*/

    </style>
  </head>

  <body>
  	<!-- awal navbar -->
  	<?php include 'include-navbar.php'; ?>
  	<!-- akhir navbar -->

  	<!-- awal kontainer utama -->
  	<div class="container"  id="main">
  		<!-- awal slider foto -->
  		<div class="row">
  			<div class="col-md-12">
  				<div id="slide-foto">
  					<div><img src="img/b5.jpg" alt=""></div>
  					<div><img src="img/background.jpg" alt=""></div>
  					<div><img src="img/content.jpg" alt=""></div>
  				</div>
  				<div id="kata-pengantar">
  					<p>Ini adalah Kata Pengantar. Ini adalah Kata Pengantar. Ini adalah Kata Pengantar. Ini adalah Kata Pengantar. Ini adalah Kata Pengantar. Ini adalah Kata Pengantar. Ini adalah Kata Pengantar. </p>
  				</div>
  			</div>
  		</div>
  		<!-- akhir slider foto -->

  		<!-- awal daftar wisata -->
      <?php
      $Query = "SELECT a.id_wisata id_wisata,
       a.nama_wisata nama_wisata,
       a.alamat alamat,
       a.latitude latitude,
       a.longitude longitude,
       a.deskripsi deskripsi,
       ROUND(AVG(b.jml_penilaian)) TotalReting FROM wisata a 
       LEFT JOIN ulasan_penilaian b
       on a.id_wisata = b.id_wisata
       GROUP BY id_wisata
       ORDER BY TotalReting DESC";
       $result = $db->query($Query);
       while($data=$result->fetch_array()){
      ?>
  		<div class="row">
  			<div class="col-md-12">
  				<!-- item wisata -->
  				<div class="row">
					<div class="kartu-wisata">
	  					<div class="col-md-12">
		  					<div class="col-md-2">
		  						<div class="wadah-foto">
                    <?php
                    $resultFoto = $db->query("SELECT nama FROM foto WHERE id_wisata=$data[id_wisata] LIMIT 1")->fetch_assoc();
                    if($resultFoto  !== NULL){
                      echo 	"<img class='foto-wisata' src='Images/".$resultFoto['nama']."' alt=''>";
                    }else {
                      echo "<img class='foto-wisata' src'/img/preloader.gif' alt=''>";
                    }
                    ?>
		  						</div>
		  					</div>
		  					<div class="col-md-10">
		  						<div class="row">
		  							<div class="col-md-12">
		  								<span class="nama-wisata"><?php echo $data['nama_wisata'] ?></span>
		  							</div>
		  						</div>
		  						<div class="row">
		  							<div class="col-md-12">
		  								<p class="alamat-wisata"><?php echo $data['alamat']?>
		  								</p>
		  							</div>
		  						</div>
		  						<div class="row">
		  							<div class="col-md-3">
		  								<label>Penilaian: </label>
		  								<select class="nilai-wisata">
			  								<option value="1" <?php if($data['TotalReting'] == "1") echo "selected='selected'" ?>>1</option>
			  								<option value="2" <?php if($data['TotalReting'] == "2") echo "selected='selected'" ?>>2</option>
			  								<option value="3" <?php if($data['TotalReting'] == "3") echo "selected='selected'" ?>>3</option>
			  								<option value="4" <?php if($data['TotalReting'] == "4") echo "selected='selected'" ?>>4</option>
			  								<option value="5" <?php if($data['TotalReting'] == "5") echo "selected='selected'" ?>>5</option>
		  								</select>
		  							</div>
		  							<div class="col-md-2 col-md-offset-7">
		  								<a class="btn btn-info" href="wisata.php?id_wisata=<?php echo $data['id_wisata'] ?>">Selengkapnya</a>
		  							</div>
		  						</div>
		  					</div>
  						</div>
  						<div class="clearfix"></div>
  					</div>
  				</div>
  			</div>
  		</div>
      <?php
      }
       ?>
  		<!-- akhir daftar wisata -->
  	</div>
  	<!-- akhir kontainer utama -->

  	<!-- awal footer -->
  	<footer class="kaki">
  		<div class="container">
  			Persepsi Kemudahan Kegunaan Sistem Informasi pariwisata di Kabupaten Bantul
  		</div>
  	</footer>
  	<!-- akhir footer -->

    <!-- jQuery 2.2.3 -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- slick slider -->
    <script type="text/javascript" src="plugins/slick/slick.min.js"></script>
    <!-- bar rating -->
    <script type="text/javascript" src="plugins/jquery-bar-rating/jquery.barrating.min.js"></script>
    <!-- custom js -->
    <script type="text/javascript" src="js/me.js"></script>

  </body>
</html>
