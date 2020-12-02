<?php
require '../dbcon.php';
$cusid=$_POST['cusid'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$address=$_POST['address'];
$address2=$_POST['address2'];
$state=$_POST['state'];
$city=$_POST['city'];
$pincode=$_POST['pincode'];
$userstatus=$_POST['userstatus'];

if($fname == '' || $lname == '' || $contact == '' || $address == '' || $state =='' || $city == '' || $pincode == ''){
	$response = "2";
}
elseif(strlen($contact) !== 10)
{
	$response = "3";
}
else
{
	$sql = "UPDATE registration SET name='$fname',lname='$lname',contact='$contact',address='$address',address2='$address2',state='$state',city='$city',pincode='$pincode',email='$email',userstatus='$userstatus' where cusid='$cusid'";
	if(mysqli_query($con,$sql))
	{
		$response = "1";
		
	}
	else
	{
		$response = "0";
	}
	
}
echo $response;
?>