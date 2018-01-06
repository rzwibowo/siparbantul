<?php

 include('../konfigurasi/config.php');
 $id = $_GET['id_wisata'];


$sql = "DELETE FROM wisata WHERE id_wisata=$id";

if ($db->query($sql) === TRUE) {
    echo "<script> alert('hapus sucess!')</script>";
    echo "<script>location.href='list_wisata.php';</script>";
} else {
    echo "Error deleting record: " . $db->error;
}




?>
