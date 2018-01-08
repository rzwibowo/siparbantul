<?php
include "konfigurasi/sesi.php";
$id_wisata = $_GET['id_wisata'];
$result = $db->query("SELECT * FROM wisata WHERE id_wisata ='$id_wisata'")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
  <title>PKKSIP BANTUL</title>  <!-- title dibikin format "Nama Wisata | PKKSIP BANTUL" -->
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
  	<nav class="navbar navbar-default navbar-fixed-top">
  	    <div class="container">
	  	    <!-- Brand and toggle get grouped for better mobile display -->
  	        <div class="navbar-header">
  	            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
  	            	<span class="sr-only">Toggle navigation</span>
  	            	<span class="icon-bar"></span>
  	            	<span class="icon-bar"></span>
  	            	<span class="icon-bar"></span>
  	            </button>
  	            <a class="navbar-brand" href="#">Logo</a>
  	        </div>

	  	    <!-- Collect the nav links, forms, and other content for toggling -->
  	        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  	            <ul class="nav navbar-nav">
  	            	<li><a href="#">Top Wisata</a></li>
  	            	<li><a href="#">Wisata Pantai</a></li>
  	            	<li><a href="#">Wisata Alam</a></li>
  	            	<li class="dropdown">
  	              		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Wisata Lainnya <span class="caret"></span></a>
  	            		<ul class="dropdown-menu">
  	                		<li><a href="#">Wisata Candi</a></li>
  	                		<li><a href="#">Wisata Kuliner</a></li>
  	                		<li><a href="#">Desa Wisata</a></li>
  	            		</ul>
  	        		</li>
  	            </ul>
  	        </div><!-- /.navbar-collapse -->
  	    </div><!-- /.container-fluid -->
  	</nav>
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
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3" selected="selected">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <p class="alamat-wisata detail">
                  Alamat wisata jalani aja dulu jadian kagak. Alamat wisata jalani aja dulu jadian kagak. Alamat wisata jalani aja dulu jadian kagak. Alamat wisata jalani aja dulu jadian kagak. Alamat wisata jalani aja dulu jadian kagak. Alamat wisata jalani aja dulu jadian kagak.
                </p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <p class="deskripsi-wisata detail">
                  Deskripsi perasaanku kepadamu. Deskripsi perasaanku kepadamu. Deskripsi perasaanku kepadamu. Deskripsi perasaanku kepadamu. Deskripsi perasaanku kepadamu. Deskripsi perasaanku kepadamu. Deskripsi perasaanku kepadamu. Deskripsi perasaanku kepadamu.
                </p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="peta-wisata" style="height: 15em; background-color: rgb(153, 204, 153);"  id="map">
                  <!-- PERHATIAN: hilangkan atribut style saat sudah menggunakan maps sesungguhnya -->

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- akhir info wisata -->

      <!-- awal form ulasan wisata -->
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="input-ulasan">
            <form action="">
              <div class="row">
                <label for="nama-pengulas" class="col-md-2 control-label">Nama:</label>
                <div class="col-md-4">
                  <input type="text" id="nama-pengulas" name="nama-pengulas" class="form-control" placeholder="Isikan nama anda">
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
                  <textarea name="uraian-ulasan" id="uraian-ulasan" cols="30" rows="3" class="form-control" placeholder="Deskripsikan penilaian anda terhadap wisata ini"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="pull-right">
                    <input type="submit" value="Kirim Ulasan" class="btn btn-primary">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- akhir form ulasan wisata -->

      <!-- awal daftar ulasan -->
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="kartu-ulasan">
            <div class="row">
              <div class="col-md-6">
                <span class="nama-pengulas-daftar">
                  Mantan
                </span>
              </div>
              <div class="col-md-6 wadah-nilai">
                <select class="nilai-wisata" id="nilai-wisata">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4" selected="selected">4</option>
                  <option value="5">5</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <p class="uraian-ulasan-daftar">
                  Yakinkan aku Tuhan Dia bukan milikku Biarkan waktu waktu Hapus aku…
                  Sadarkan aku Tuhan Dia bukan milikku Biarkan waktu waktu Hapus aku…
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
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

    <script>
    var latitude =   parseFloat($('#latitude').val());
    var longitude =   parseFloat($('#longitude').val());
    var namaWisata = $('#nama_wisata').val();
    	$('#slide-foto').slick({
    		autoplay: true,
    		dots: true,
    		fade: true,
    		centerMode: true
    	});
    	$('.nilai-wisata').barrating({
    		theme: 'bootstrap-stars'
    	});
      $('.nilai-ulasan').barrating({
        theme: 'bootstrap-stars'
      });
    	$('.nilai-wisata').barrating('readonly',true);


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
        var infoWindow = new google.maps.InfoWindow;

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
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });

            //});
        //  });
        }
      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };
        request.open('GET', url, true);
        request.send(null);
      }

  //    function doNothing() {}
    </script>
    <script async defer
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCl_lUALnXByOhoR2C539GbSQrHfYwmUU&callback=initMap">
   </script>
  </body>
</html>
