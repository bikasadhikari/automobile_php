<?php
require '../dbcon.php' ;
$id=$_POST['id'];
$category=$_POST['category'];
$brand=$_POST['brand'];
$name=$_POST['name'];
$stock=$_POST['stock'];
$price=$_POST['price'];
$image1=$_POST['image1'];
$display=$_POST['display'];
$fnm = $_FILES["image"]["name"];
if($fnm == "")
{
	$sql="UPDATE accessories set image='$image1',category='$category',brand='$brand',name='$name',stock='$stock',price='$price',display='$display' where id='$id'";
	if(mysqli_query($con,$sql))
	{
		session_start();
		$_SESSION['saleupdate'] = "<script>alert('Update Successfull');</script>";
		header("location: accessadd.php");
	}
}
else
{
	$v1=rand(1111,9999);
	$v2=rand(1111,9999);
	$v3=$v1.$v2;
	$v3=md5($v3);
	$dst = "./../accessimage/".$v3.$fnm;
	$dst1 = "accessimage/".$v3.$fnm;
	move_uploaded_file($_FILES["image"]["tmp_name"], $dst);
	$sql1="UPDATE accessories set image='$dst1',category='$category',brand='$brand',name='$name',stock='$stock',price='$price',display='$display' where id='$id'";
	if(mysqli_query($con,$sql1))
	{
	session_start();
	$_SESSION['saleupdate'] = "<script>alert('Update Successfull');</script>";
	header("location: accessadd.php");
}
}
?>