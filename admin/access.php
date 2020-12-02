<?php

require '../dbcon.php';
$brand=$_POST['brand'];
$name=$_POST['name'];
$price=$_POST['price'];
$category=$_POST['category'];
$stock=$_POST['stock'];

	$v1=rand(1111,9999);
	$v2=rand(1111,9999);
	$v3=$v1.$v2;
	$v3=md5($v3);

	$fnm = $_FILES["image"]["name"];
	$dst = "./../accessimage/".$v3.$fnm;
	$dst1 = "accessimage/".$v3.$fnm;
	move_uploaded_file($_FILES["image"]["tmp_name"], $dst);


$sql="INSERT into accessories(brand,name,price,stock,image,category,display) values('$brand','$name','$price','$stock','$dst1','$category','yes')";
if(mysqli_query($con,$sql))
{
session_start();
$_SESSION['bikeadd'] = "<script>alert('New Accessory Added');</script>";
header("location: accessadd.php");

}
else
{
	session_start();
$_SESSION['bikeaddfail'] = "<script>alert('Process Failed !');</script>";	
header("location: accessadd.php");

}

?>