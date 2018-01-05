<?php
$host       = "localhost";
$user       = "root";
$password   = "";
$database   = "skripsi";
$db    = new mysqli($host, $user, $password, $database);
	if($db->connect_error)  { die ("" . $db->connect_error);
	}
?>