<?php
include "../konfigurasi/sesi.php";
if (!isset($_SESSION['login_user'])) {
  
  header("location:../konfigurasi/login.php");
}

	$nama_kategori = $_GET['nama_kategori'];
	$query = "insert into kategori values ( '', '$nama_kategori')";
	
	if ($db->query($query)===TRUE){
			echo "<script>alert('Kategori Baru Berhasil disimpan')</script>";
			echo "<meta http-equiv='refresh' content='1 url=input.php'>";
		} else {
			echo "<script>alert('Mohon Masukan Data Dengan Benar')</script>";
			echo "<meta http-equiv='refresh' content='1 url=input.php'>";
			}

?>