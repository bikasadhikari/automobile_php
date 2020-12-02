<?php include 'dbcon.php' ?>
<?php
session_start();
$username=$_SESSION['username'];
$email=$_POST['email1'];
$sql="SELECT email from registration where email='$email'";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res) > 0)
{
	echo "Email ID already Exists Or Currently Being Used !";
}
else
if(!filter_var($email,FILTER_VALIDATE_EMAIL ))
{
	echo "Invalid Email";
}
else
{
	$update="UPDATE registration SET email='$email' where username='$username'";
	mysqli_query($con,$update);
	echo "Email Successfully Updated..";
}
?>