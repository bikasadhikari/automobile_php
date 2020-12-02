<?php require 'dbcon.php' ?>
<?php
session_start();
$username=$_SESSION['username'];
$curpass=$_POST['curpass1'];
$newpass=$_POST['newpass1'];

$sql="SELECT password from registration where username='$username'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
$pass=$row['password'];

if($pass != $curpass)
{
	echo "The Current Password You Entered Is Incorrect !";
}
elseif($pass == $newpass)
{
	echo "New Password You Entered is same as Old Password !";
}
else
{
	$update="UPDATE registration SET password='$newpass' where username='$username'";
	mysqli_query($con,$update);
	echo "Password Successfully Updated";
}
?>