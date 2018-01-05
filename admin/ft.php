<?php

include "../konfigurasi/sesi.php";
if (!isset($_SESSION['login_user'])) {
  
  header("location:../konfigurasi/login.php");
}
if (isset($_POST['submit'])) {

			//Upload foto
			if(!isset($_FILES['fotoSatu'])){
        echo 'Pilih file gambar';
    }
    else
    {
 $image   = addslashes(file_get_contents($_FILES['fotoSatu']['tmp_name']));
     $image_name = addslashes($_FILES['fotoSatu']['name']);
        $image_size = getimagesize($_FILES['fotoSatu']['tmp_name']);
    if($image_size == false){
   echo 'File yang anda pilih Bukan gambar';
        }
        else
        {
          if(!$insert = mysql_query("INSERT into foto VALUES ('', '4', '$imgContent')"))
            {
                echo 'Gagal upload gambar';
     } else
            {
        // Informasi berhasil dan kembali ke inputan
  echo"<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>";
     }

     }
    }

}
	

	
?>