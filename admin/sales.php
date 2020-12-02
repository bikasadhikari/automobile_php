<?php
require '../dbcon.php';

if(isset($_POST["add"]))
{
	$v1=rand(1111,9999);
	$v2=rand(1111,9999);
	$v3=$v1.$v2;
	$v3=md5($v3);

	$fnm = $_FILES["image"]["name"];
	$dst = "./../bikeimage/".$v3.$fnm;
	$dst1 = "bikeimage/".$v3.$fnm;
	move_uploaded_file($_FILES["image"]["tmp_name"], $dst);

mysqli_query($con,"INSERT into sales values('','$_POST[company]','$_POST[model]','$_POST[stock]',$_POST[price],'$dst1',$_POST[enginecc],'$_POST[pcategory]','$_POST[mileage]','$_POST[abs]','$_POST[power]','$_POST[fuelcap]','yes')");

session_start();
$_SESSION['bikeadd'] = "<script>alert('New Motorbike Added');</script>";
header("location: addbikes.php");

}
else
{
	session_start();
$_SESSION['bikeaddfail'] = "<script>alert('Process Failed !');</script>";	
header("location: addbikes.php");
}
?>

