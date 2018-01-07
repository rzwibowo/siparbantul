<?php

 include('../konfigurasi/config.php');
 $id = $_GET['id_kategori'];


$sql = "DELETE FROM kategori WHERE id_kategori=$id";

if ($db->query($sql) === TRUE) {
    echo "<script> alert('hapus sucess!')</script>";
    echo "<script>location.href='list_kategori.php';</script>";
} else {
    echo "Error deleting record: " . $db->error;
}




?>
