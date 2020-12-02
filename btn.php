<?php

$con=mysqli_connect('127.0.0.1','root','','throttleup');

if(isset($_POST['detailsbtn']))
{
	$id = $_POST['id'];	
	$query = "SELECT * from sales where id='$id' ";
	$query_run = mysqli_query($con,$query);

	while($rows = mysqli_fetch_array($query_run))
	{
		 echo "<img src='".$rows['image']."' width='250' height='190' >";
			 echo $rows['pcategory']; 
			 echo $rows['company'];
			 echo $rows['model']; 
			 echo $rows['price']; 
			 echo $rows['enginecc']; 
			 echo $rows['details']; 
			

			 

			


	}
}

?>