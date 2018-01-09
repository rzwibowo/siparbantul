<?php

include "../konfigurasi/config.php";

        $id_wisata = $_POST['id-wisata'];
        $namapengulas = $_POST['nama-pengulas'];
        $nilaiulasan = $_POST['nilai-ulasan'];
        $uraianulasan = $_POST['uraian-ulasan'];

        $query = "insert into ulasan_penilaian values ( '', '$id_wisata','$namapengulas','$nilaiulasan','$uraianulasan')";
        if ($db->query($query)===TRUE)
        {
            echo"<script>alert('Data berhasil Disimpan!');location.href='../home.php';</script>";
        }
        else
        {
          echo"<script>alert('Terjadi Kesalahan!');location.href='../home.php';</script>";
        }
?>
