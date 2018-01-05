<?php

include "../konfigurasi/sesi.php";
if (!isset($_SESSION['login_user'])) {
  
  header("location:../konfigurasi/login.php");
}
if (isset($_GET['submit'])) {
	

$nama_wisata = $_GET['nama_wisata'];
$alamat = $_GET['alamat'];
$kategori = $_GET['kategori'];
$deskripsi = $_GET['deskripsi'];

	$query = "insert into wisata values ( '', '$nama_wisata', '$alamat', $kategori, '$deskripsi')";

	if ($db->query($query)===TRUE){
		//ambil id terakhir insert
		$id_wisata = mysqli_insert_id($db);
		
	
}
	
		 else {
			echo "<script>alert('Mohon Masukan Data Dengan Benar')</script>";
			echo "<meta http-equiv='refresh' content='1 url=input.php'>";
			}
		
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
          if(!$insert = mysql_query("INSERT into foto VALUES ('', 'id_wisata', '$imgContent')"))
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