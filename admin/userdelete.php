<?php
session_start();
require '../dbcon.php';
$cusid=$_GET['cusid'];
$sql="DELETE from registration where cusid='$cusid'";
if(mysqli_query($con,$sql))
{
	
	 echo "<script>alert('User Deleted..');</script>"; 
	 header("location: adminindex.php");
}
else
{
	echo "<script>alert('Deletion Failed !');</script>";
}
?>