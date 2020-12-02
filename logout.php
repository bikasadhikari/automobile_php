<?php
session_start();
unset($_SESSION["username"]);
header("location:logindes.php");

if(isset($_POST['register']))
{
	session_start();
unset($_SESSION["username"]);
	header("location: registrationdes.php");
}
?>