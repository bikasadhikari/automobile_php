<?php require 'dbcon.php' ?>
<?php
session_start();
$username=$_SESSION['username'];
/*$email1=$_POST['email1'];

$emailchk="SELECT email from registration where email='$email1'";
$emailres=mysqli_query($con,$emailchk);
if((mysqli_num_rows($emailres) >= 1))
{
	echo "Email already Exists! Try another..";
}
elseif(!filter_var($email1, FILTER_VALIDATE_EMAIL)) 
{
	echo "Invalid Email";
}
else
{*/
$fname=$_POST['fname1'];
$lname=$_POST['lname1'];
$contact=$_POST['contact1'];
$address1=$_POST['address'];
$address2=$_POST['address2'];

$state=$_POST['state1'];
$city=$_POST['city1'];
$pincode=$_POST['pincode1'];


$sql="UPDATE registration SET name='$fname',lname='$lname',contact='$contact',address='$address1',address2='$address2',state='$state',city='$city',pincode='$pincode' where username='$username'";
if(mysqli_query($con,$sql))
{
echo "Account Updated Successfully";
}
else
{
echo "Update Failed !";
}

?>