<?php require 'dbcon.php' ?>
<?php
$id=$_POST['id'];
session_start();
$username=$_SESSION['username'];

$querydel="DELETE from cart where id='$id' and username='$username'";
$resultdel=mysqli_query($con,$querydel);
header("location: procart.php");



?>