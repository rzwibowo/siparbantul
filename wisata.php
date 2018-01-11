<?php
include "konfigurasi/sesi.php";
$id_wisata = $_GET['id_wisata'];
$result = $db->query("SELECT * FROM wisata WHERE id_wisata ='$id_wisata'")->fetch_assoc();
$queryRata2 = "SELECT AVG(jml_penilaian) AS ratarata FROM ulasan_penilaian WHERE id_wisata ='$id_wisata'";
$RataRata = $db->query($queryRata2)->fetch_assoc();
$TotalReting = round($RataRata['ratarata']);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title><?php echo $result['nama_wisata']; ?> | PKKSIP BANTUL</title>  <!-- title dibikin format "Nama Wisata | PKKSIP BANTUL" -->
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

    /* Always set the map height explicitly to define the size of the div
           * element that contains the map. */
          #map {
            height: 100%;
          }
          /* Optional: Makes the sample page fill the window. */
          html, body {
            height: 100%;
            margin: 0;
            padding: 0;
          }
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
          <?php
            $query_foto="SELECT nama FROM foto WHERE id_wisata='".$result['id_wisata']."'";
            $ambil_foto=$db->query($query_foto);
            while($nama_file_foto=$ambil_foto->fetch_array()){
          ?>
					<div><img src="Images/<?php echo $nama_file_foto['nama']; ?>" alt=""></div>
          <?php
            }
          ?>
				</div>
			</div>
		</div>
		<!-- akhir slider foto -->

		<!-- awal info wisata -->
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="info-wisata">
          <div class="row">
            <div class="col-md-9">
              <span class="nama-wisata detail"><?php echo $result['nama_wisata'] ?></span>
            </div>
            <div class="col-md-3 wadah-nilai">
              <select class="nilai-wisata">
                <option value="1" <?php if($TotalReting == "1") echo "selected='selected'"?>>1</option>
                <option value="2" <?php if($TotalReting == "2") echo "selected='selected'"?>>2</option>
                <option value="3" <?php if($TotalReting == "3") echo "selected='selected'"?>>3</option>
                <option value="4" <?php if($TotalReting == "4") echo "selected='selected'"?>>4</option>
                <option value="5" <?php if($TotalReting == "5") echo "selected='selected'"?>>5</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <p class="alamat-wisata detail">
                  <?php echo $result['alamat']?>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <p class="deskripsi-wisata detail">
              <?php echo $result['deskripsi']?>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="peta-wisata" style="height: 15em;"  id="map">
                <!-- PERHATIAN: hilangkan atribut style saat sudah menggunakan maps sesungguhnya -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- akhir info wisata -->

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <span class="judul-section">
          Berikan Ulasan Anda:
        </span>
      </div>
    </div>

    <!-- awal form ulasan wisata -->
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="input-ulasan">
          <form action="admin/penilaian_proses.php" method="post" name="Fpenilaian">
            <input type="hidden" id="id_wisata" name="id-wisata" value="<?php echo $id_wisata ?>">
            <div class="row">
              <label for="nama-pengulas" class="col-md-2 control-label">Nama:</label>
              <div class="col-md-4">
                <input type="text" id="namapengulas" name="nama-pengulas" class="form-control" placeholder="Isikan nama anda">
                <span id="warningnamapengulas" style="color:#FFA500;"></span>
              </div>
              <label for="nilai-wisata-input" class="col-md-1 col-md-offset-2 control-label">Nilai:</label>
              <div class="col-md-3 wadah-nilai">
                <select class="nilai-ulasan" id="nilai-ulasan" name="nilai-ulasan">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>
              <div>
                <input type="hidden" id="nama_wisata" value="<?php echo $result['nama_wisata']?>"/>
                <input type="hidden" id="latitude" value="<?php echo $result['latitude'] ?>"/>
                <input type="hidden" id="longitude" value="<?php echo $result['longitude'] ?>"/>
              </div>
            </div>
            <div class="row">
              <label for="uraian-ulasan" class="col-md-2 control-label">Ulasan:</label>
              <div class="col-md-10">
                <textarea name="uraian-ulasan" id="ulasan" cols="30" rows="3" class="form-control" placeholder="Deskripsikan penilaian anda terhadap wisata ini"></textarea>
                <span id="warningulasan" style="color:#FFA500;"></span>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="pull-right">
                  <input type="submit" value="Kirim Ulasan" onclick="Submit()" class="btn btn-primary">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- akhir form ulasan wisata -->

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <span class="judul-section">
          Ulasan Pengunjung:
        </span>
      </div>
    </div>

    <!-- awal daftar ulasan -->
    <?php
    $Query = "SELECT * FROM ulasan_penilaian WHERE id_wisata ='$id_wisata'";
    $resUlsan = $db->query($Query);
    if (mysqli_num_rows($resUlsan)==0) {
      # code...
    ?>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <span class="judul-section kosong">
          <span class="glyphicon glyphicon-option-horizontal"></span>
          <br>
          Belum ada Ulasan
        </span>
      </div>
    </div>
    <?php
    }
     while($restData=$resUlsan->fetch_array()){

    ?>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="kartu-ulasan">
          <div class="row">
            <div class="col-md-6">
              <span class="nama-pengulas-daftar">
                  <?php echo $restData['nama_pengunjung']?>
              </span>
            </div>
            <div class="col-md-6 wadah-nilai">
              <select class="nilai-wisata" id="nilai-wisata">
                <option value="1" <?php if($restData['jml_penilaian'] == "1") echo "selected='selected'" ?>>1</option>
                <option value="2" <?php if($restData['jml_penilaian'] == "2")echo "selected='selected'" ?>>2</option>
                <option value="3" <?php if($restData['jml_penilaian'] == "3")echo "selected='selected'" ?>>3</option>
                <option value="4" <?php if($restData['jml_penilaian'] == "4")echo "selected='selected'" ?>>4</option>
                <option value="5" <?php if($restData['jml_penilaian'] == "5")echo "selected='selected'" ?>>5</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <p class="uraian-ulasan-daftar">
                <?php echo $restData['ulasan']?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    }
    ?>
    <!-- akhir daftar ulasan -->
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

  <script>
  var latitude =   parseFloat($('#latitude').val());
  var longitude =   parseFloat($('#longitude').val());
  var namaWisata = $('#nama_wisata').val();
  	

   $("form").submit(function() {
     var namaPengulas = $("#namapengulas").val();
     var ulasan = $("#ulasan").val();
    if(namaPengulas == "" || ulasan == "" ){
      if(namaPengulas == ""){
        $("#warningnamapengulas").html("Nama Belum Diisi");
      }
      if(ulasan == ""){
          $("#warningulasan").html("Ulasan Belum diisi");
      }
      return false;
    }else {
      return true;
    }

  });

    var customLabel = {
      restaurant: {
        label: 'R'
      },
      bar: {
        label: 'B'
      }
    };

    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(latitude, longitude),
        zoom: 12,
      });
    //  var infoWindow = new google.maps.InfoWindow;

        // Change this depending on the name of your PHP or XML file
    //  downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function(data) {
      //    var xml = data.responseXML;
        //  var markers = xml.documentElement.getElementsByTagName('marker');
        //  Array.prototype.forEach.call(markers, function(markerElem) {
          //  var name = markerElem.getAttribute('name');
          //  var address = markerElem.getAttribute('address');
          //  var type = markerElem.getAttribute('type');
            var point = new google.maps.LatLng(
                latitude,
                longitude);

            var infowincontent = document.createElement('div');
            var strong = document.createElement('strong');
            strong.textContent = name
            infowincontent.appendChild(strong);
            infowincontent.appendChild(document.createElement('br'));

            var text = document.createElement('text');
          //  text.textContent = address
            infowincontent.appendChild(text);
          //  var icon = customLabel[type] || {};
            var marker = new google.maps.Marker({
              map: map,
              position: point,
              label: namaWisata
            });
            // marker.addListener('click', function() {
            //   infoWindow.setContent(infowincontent);
            //   infoWindow.open(map, marker);
            // });

          //});
      //  });
      google.maps.event.addListener(map, "click", function (e) {

    //lat and lng is available in e object
    console.log(e.latLng.lat(),e.latLng.lng());

      });
      }
    // function downloadUrl(url, callback) {
    //   var request = window.ActiveXObject ?
    //       new ActiveXObject('Microsoft.XMLHTTP') :
    //       new XMLHttpRequest;
    //
    //   request.onreadystatechange = function() {
    //     if (request.readyState == 4) {
    //       request.onreadystatechange = doNothing;
    //       callback(request, request.status);
    //     }
    //   };
    //   request.open('GET', url, true);
    //   request.send(null);
    // }



//    function doNothing() {}
  </script>
  <script async defer
 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCl_lUALnXByOhoR2C539GbSQrHfYwmUU&callback=initMap">
 </script>
</body>
</html>
