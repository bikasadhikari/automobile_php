
<?php
require '../dbcon.php' ;
$id=$_POST['id'];
$category=$_POST['pcategory'];
$model=$_POST['model'];
$company=$_POST['company'];
$stock=$_POST['stock'];
$displacement=$_POST['enginecc'];
$price=$_POST['price'];
$mileage=$_POST['mileage'];
$fuelcap=$_POST['fuelcap'];
$abs=$_POST['abs'];
$image1=$_POST['image1'];
$power=$_POST['power'];
$display=$_POST['display'];
$fnm = $_FILES["image"]["name"];
if($fnm == "")
{
	$sql="UPDATE sales set image='$image1',pcategory='$category',company='$company',model='$model',stock='$stock',enginecc='$displacement',price='$price',mileage='$mileage',fuelcap='$fuelcap',abs='$abs',power='$power',display='$display' where id='$id'";
	if(mysqli_query($con,$sql))
	{
		session_start();
		$_SESSION['saleupdate'] = "<script>alert('Update Successfull');</script>";
		header("location: addbikes.php");
	}
}
else
{
	$v1=rand(1111,9999);
	$v2=rand(1111,9999);
	$v3=$v1.$v2;
	$v3=md5($v3);
	$dst = "./../bikeimage/".$v3.$fnm;
	$dst1 = "bikeimage/".$v3.$fnm;
	move_uploaded_file($_FILES["image"]["tmp_name"], $dst);
	$sql1="UPDATE sales set image='$dst1',pcategory='$category',company='$company',model='$model',stock='$stock',enginecc='$displacement',price='$price',mileage='$mileage',fuelcap='$fuelcap',abs='$abs',power='$power',display='$display' where id='$id'";
	if(mysqli_query($con,$sql1))
	{
	session_start();
	$_SESSION['saleupdate'] = "<script>alert('Update Successfull');</script>";
	header("location: addbikes.php");
}
}
?>