<?php
include "config.php";
session_start();
$error=''; 
if (isset($_POST['submit'])) 
{
	if (empty($_POST['username']) || empty($_POST['password'])) 
	{
		$error = "Username or Password is invalid";
	}
	else
	{

		$username=$_POST['username'];
		$password=$_POST['password'];
		// Untuk melindungi MySQL injection 
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysqli_real_escape_string($db,$username);
		$password = mysqli_real_escape_string($db,$password);

		$query = mysqli_query($db,"select * from administrator where username='$username' AND password='$password'");
		$rows = mysqli_num_rows($query);
		if ($rows == 1)
		{
			$_SESSION['login_user'] = $username; 
			header("location: index.php"); 
		} 
		else
		{
			echo "<script>alert('Username atau Password Salah')</script>";
			echo "<meta http-equiv='refresh' content='1 url=login.php'>";
		}
		mysqli_close($db); 
	}
}

?>