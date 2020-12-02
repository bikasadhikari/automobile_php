<?php

require '../dbcon.php';
$company=$_POST['company'];
$model=$_POST['model'];
$price=$_POST['price'];
$enginecc=$_POST['enginecc'];
$category=$_POST['category'];
$stock=$_POST['stock'];

	$v1=rand(1111,9999);
	$v2=rand(1111,9999);
	$v3=$v1.$v2;
	$v3=md5($v3);

	$fnm = $_FILES["image"]["name"];
	$dst = "./../subbikeimage/".$v3.$fnm;
	$dst1 = "subbikeimage/".$v3.$fnm;
	move_uploaded_file($_FILES["image"]["tmp_name"], $dst);


$sql="INSERT into subscribe(company,model,bikeprice,stock,image,enginecc,category,display) values('$company','$model','$price','$stock','$dst1','$enginecc','$category','yes')";
if(mysqli_query($con,$sql))
{
session_start();
$_SESSION['bikeadd'] = "<script>alert('New Subscription Added');</script>";
header("location: addsubs.php");

}
else
{
	session_start();
$_SESSION['bikeaddfail'] = "<script>alert('Process Failed !');</script>";	
header("location: addsubs.php");

}

?>