<?php

include "sesi.php";
if (!isset($_SESSION['login_user'])) {
    header("location:login.php");
}
?>