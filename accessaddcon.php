<?php require 'dbcon.php' ?>
<?php
$brand=$_POST['brand'];
$name=$_POST['name'];
$price=$_POST['price'];

$category=$_POST['category'];

if(isset($_POST["submit"]))
{
	$v1=rand(1111,9999);
	$v2=rand(1111,9999);
	$v3=$v1.$v2;
	$v3=md5($v3);

	$fnm = $_FILES["image"]["name"];
	$dst = "./accessimage/".$v3.$fnm;
	$dst1 = "accessimage/".$v3.$fnm;
	move_uploaded_file($_FILES["image"]["tmp_name"], $dst);

$sql="INSERT into accessories (brand,name,price,image,category) values('$brand','$name','$price','$dst1','$category')";
$results=mysqli_query($con,$sql);

}


	?>