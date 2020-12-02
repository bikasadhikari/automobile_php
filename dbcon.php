<?php
$con=mysqli_connect('127.0.0.1','root','');
if(!$con)
{
	echo "Database not connected";
}

if(!mysqli_select_db($con,'throttleup'))
{
	echo "Database not selected";
}
?>