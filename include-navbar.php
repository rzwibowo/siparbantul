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
            <a class="navbar-brand" href="home.php"><img src="img/logo.png" alt=""></a>
        </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            	<li><a href="#">Top Wisata</a></li>
            	<?php
          $QueryKategori = "SELECT * FROM kategori";
          $resultKategori = $db->query($QueryKategori);
           while($Kategori=$resultKategori->fetch_array()){
            echo "<li><a href='homebycategory.php?id=".$Kategori['id_kategori']."'>".$Kategori['nama_kategori']."</a></li>";
          }
          ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>