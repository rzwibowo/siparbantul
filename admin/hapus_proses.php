<?php

 include('../konfigurasi/config.php');
 $id = $_GET['id_wisata'];


$sql = "DELETE FROM wisata WHERE id_wisata=$id";

if ($db->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $db->error;
}




?>