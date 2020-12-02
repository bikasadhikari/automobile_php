<?php require'../dbcon.php';
if(isset($_POST['bike1']))
{
	$status=$_POST['status'];
	$adminupdate=$_POST['adminupdate'];
	$payid=$_POST['payid'];
	$sql="UPDATE fullpay1 set status='$status',adminupdate='$adminupdate' where payid='$payid'";
	$res=mysqli_query($con,$sql);
	header("location: bikeorders.php");
	echo "<script>alert('Updated !');</script>";

}

if(isset($_POST['emibike']))
{
	$status=$_POST['status'];
	$adminupdate=$_POST['adminupdate'];
	$payid=$_POST['payid'];

	$sql="UPDATE emipay set status='$status',adminupdate='$adminupdate' where payid='$payid'";
	$res=mysqli_query($con,$sql);
	header("location: bikeorders.php");
	echo "<script>alert('Updated !');</script>";
	
}

if(isset($_POST['cusquery']) && isset($_POST['payid']))
{
	$payid=$_POST['payid'];
	$query=$_POST['cusquery'];
	$sql1="UPDATE emipay set cusquery='$query' where payid='$payid'";
	$sql2="UPDATE fullpay1 set cusquery='$query' where payid='$payid'";
	mysqli_query($con,$sql1);
	mysqli_query($con,$sql2);

}
if(isset($_POST['servicenew']))
{
	$status=$_POST['status'];
	$adminupdate=$_POST['adminupdate'];
	$sid=$_POST['sid'];
	$sql="UPDATE service set status='$status',adminupdate='$adminupdate' where sid='$sid'";
	$res=mysqli_query($con,$sql);
	header("location: servicereqs.php");
	echo "<script>alert('Updated !');</script>";

}

if(isset($_POST['cusquery']) && isset($_POST['sid']))
{
	$sid=$_POST['sid'];
	$query=$_POST['cusquery'];
	$sql1="UPDATE service set cusquery='$query' where sid='$sid'";
	mysqli_query($con,$sql1);
	

}

if(isset($_POST['servicedone']))
{
	$adminupdate=$_POST['adminupdate'];
	$sid=$_POST['sid'];
	$sql="UPDATE service set adminupdate='$adminupdate' where sid='$sid'";
	$res=mysqli_query($con,$sql);
	header("location: servicereqs.php");
	echo "<script>alert('Updated !');</script>";

}
if(isset($_POST['bikedel']))
{
	$adminupdate=$_POST['adminupdate'];
	$payid=$_POST['payid'];
	$sql="UPDATE fullpay1 set adminupdate='$adminupdate' where payid='$payid'";
	$res=mysqli_query($con,$sql);
	header("location: bikeorders.php");
	echo "<script>alert('Updated !');</script>";


}

if(isset($_POST['emibikedel']))
{
	$adminupdate=$_POST['adminupdate'];
	$payid=$_POST['payid'];

	$sql="UPDATE emipay set adminupdate='$adminupdate' where payid='$payid'";
	$res=mysqli_query($con,$sql);
	header("location: bikeorders.php");
	echo "<script>alert('Updated !');</script>";


}

if(isset($_POST['subscribe']))
{
	$status=$_POST['status'];
	$adminupdate=$_POST['adminupdate'];
	$payid=$_POST['payid'];
	$sql="UPDATE subbook set status='$status',adminupdate='$adminupdate' where payid='$payid'";
	$res=mysqli_query($con,$sql);
	header("location: subcriptionorders.php");
	echo "<script>alert('Updated !');</script>";

}

if(isset($_POST['subscribedel']))
{
	
	$adminupdate=$_POST['adminupdate'];
	$payid=$_POST['payid'];
	$sql="UPDATE subbook set adminupdate='$adminupdate' where payid='$payid'";
	$res=mysqli_query($con,$sql);
	header("location: subcriptionorders.php");
	echo "<script>alert('Updated !');</script>";

}


if(isset($_POST['cusquerysub']) && isset($_POST['payidsub']))
{
	$payid=$_POST['payidsub'];
	$query=$_POST['cusquerysub'];
	$sql1="UPDATE subbook set cusquery='$query' where payid='$payid'";
	mysqli_query($con,$sql1);

}

if(isset($_POST['access']))
{
	$status=$_POST['status'];
	$adminupdate=$_POST['adminupdate'];
	$payid=$_POST['payid'];
	$sql="UPDATE paydet set status='$status',adminupdate='$adminupdate' where payid='$payid'";
	$res=mysqli_query($con,$sql);
	header("location: accessorders.php");
	echo "<script>alert('Updated !');</script>";

}
if(isset($_POST['cusqueryacc']) && isset($_POST['payidacc']))
{
	$payid=$_POST['payidacc'];
	$query=$_POST['cusqueryacc'];
	$sql1="UPDATE paydet set cusquery='$query' where payid='$payid'";
	mysqli_query($con,$sql1);

}

if(isset($_POST['accessdel']))
{
	$adminupdate=$_POST['adminupdate'];
	$payid=$_POST['payid'];
	$sql="UPDATE paydet set adminupdate='$adminupdate' where payid='$payid'";
	$res=mysqli_query($con,$sql);
	header("location: accessorders.php");
	echo "<script>alert('Updated !');</script>";

}