<?php
require '../dbcon.php';

$adminuser=$_POST['username'];
$adminpassword=$_POST['password'];
$sql="SELECT * from admin where username='$adminuser' and password='$adminpassword'";
$res=mysqli_query($con,$sql);

if(mysqli_num_rows($res) > 0 )
{
	echo "1";
	session_start();
	$_SESSION['adminuser'] = $adminuser;
	$_SESSION['loginsuccess'] = '<script>alert("Login Success");</script>';
}
else
{
	
	echo "0";
}

?>