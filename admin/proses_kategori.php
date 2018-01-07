<?php

include "../konfigurasi/sesi.php";

if (!isset($_SESSION['login_user'])) {
header("location:../konfigurasi/login.php");
}
else{
  if (isset($_POST['submit'])) {
    if(!isset($_POST['id_kategori'])){
        $kategori = $_POST['kategori'];
        $query = "insert into kategori values ( '', '$kategori')";
        if ($db->query($query)===TRUE)
        {
            echo"<script>alert('Data berhasil Disimpan!');location.href='list_kategori.php';</script>";
        }
        else
        {
          echo"<script>alert('Gagal menyimpan Data!');history.go(-1);</script>";
        }
    }else {
      $id_kategori = $_POST['id_kategori'];
      $kategori = $_POST['kategori'];

      $query = "UPDATE kategori SET nama_kategori='$kategori'  WHERE id_kategori=$id_kategori";
      if ($db->query($query)===TRUE)
      {
        echo"<script>alert('Data Berhasil DiUpdate !');location.href='list_kategori.php';</script>";
      }
      else
      {
        echo"<script>alert('Data Gagal DiUpdate !');history.go(-1);</script>";
      }
    }
  }
}
?>
