<?php include 'userheader.php' ?>
<?php require 'dbcon.php' ?>
<?php
$query="SELECT * from accessories where category='Helmets' and display='yes'";
$result=mysqli_query($con,$query);
?>

<html>
<head>
	<script type="text/javascript" src="validation.js"></script>
	<link rel="stylesheet" href="headers/jquery-confirm.css">
<script src="headers/confirm.js"></script>
	<script type="text/javascript">
		function btnValacc()
{
 if(document.getElementById('username1').value == '')
 {
 document.getElementById('cartbtn').disabled = true;
   document.getElementById('cartbtn').style.visibility = 'hidden';
    $(':button').prop('disabled', true);
    document.getElementById('regbtn').disabled = false;
}

   else
   {
     document.getElementById('msg').style.visibility = 'hidden'; 

   }

   }

   
	</script>
	<style type="text/css">

		.form-inline{
	width: 25%;
	transform: translate(150%,-1300%);
	top:0
	left:0;
}
#list
{
	display: inline-block;
	
	border: 0px solid black;
	margin: 8px;	
	margin-bottom: 25px;
	background-color: pink; 
	list-style-type: 	none;
	box-shadow: 1px 1px 4px 1px pink,-1px -1px 4px 1px pink;
	position: relative;		
			
}

	</style>

	<script type="text/javascript">
		function gridview()
		{
			var x = document.getElementById('id').value;
			if(x=="0")
			{
              alert("No rsult");
			}
		}
	</script>
</head>
<body onload="function1();btnValacc();">
	<div id="msg" class="msg text-danger" style="margin-top: 10px; position: absolute; border: 1px solid red; width: 200px;font-size: 110%;height: 30px;transform: translate(300%,0%);" align="center" >
		        	Login for Add to Cart !
		        </div>
	<input type="hidden" id="username1" value=<?php session_start(); echo $_SESSION['username']; ?>>
<form action="procart.php">
		<button type="submit" id="cartbtn" class="fa fa-shopping-cart fa-3x" style="background-color: Transparent;background-repeat:no-repeat;border: none;cursor:pointer;overflow: hidden; margin-left: 1275px; margin-top: 10px;"></button>
	</form>

<nav class="nav flex-column" style="width: 180px;margin-left: 15px;margin-top: 13px; background-color: white;background-color: #F4F6F6; border: 1px solid black;">
	<h5 style="margin-top: 10px;"><center><u>Categories</u></center></h5>
	<center>
  <a id="gear" class="nav-link"  href="gear.php">Protective gear & clothing</a>
  <a class="nav-link" href="accessories.php">Accessories</a>

  <a class="nav-link" href="safety.php">Bike safety</a>
  <a class="nav-link" href="helmets.php">Helmets</a>
  <a class="nav-link" href="lubricants.php">Lubricants</a>
  <a class="nav-link" href="others.php">Others</a></center>
</nav>

<div class="container" style="margin-left: 200px; margin-top: -316px;">
<div id="view">
<?php
	while($rows=mysqli_fetch_assoc($result))
	{

		?>
		
		<ol id='list'>
	<div style="border: 1px solid pink;">
		<div class="stockmsg" style="width: 100%; background: rgba(0,0,0,0.6); height: 25px;position: absolute; top: 44%;color: white;text-align: center;">
			<?php
			if($rows['stock'] == 0)
			{
				echo "Out of Stock";
			
			}
			else
			{
				echo $rows['stock']." pieces left";
			}
			?>
			</div>	
	<?php echo "<img src='".$rows['image']."' width='200' height='150' >"?><br>
			 <div style="margin-left: 10px;">
			<b class="row1"> <u>Brand:</u></b><?php echo $rows['brand']; ?><br>
			<b class="row2"><u> Name:</u></b><?php echo $rows['name']; ?><br>
			<b class="row4"> <u>  Price:</u> </b><?php echo $rows['price']; ?><br>
			<form action="helmets.php" method="post">
			<script src="./src/bootstrap-input-spinner.js"></script>
<script>
    $("input[type='number']").inputSpinner()
</script>
  <b class="row5"> <u>  Qty</u><span style="padding: 5px;">:</span>  </b> <input type="number" name="qty" maxlength="10" minlength="1" required="" value="1" min="1" max="10" onkeypress="return onlyNumbers(event);"/>
</div>
			
			<input  type="hidden"  name="stockval" value="<?php echo $rows['stock']; ?>"/>
			<input type="hidden" name="id"  value="<?php echo $rows['id']; ?>"/>
			<input type="hidden" name="brand" value="<?php echo $rows['brand']; ?>"/>
			<input type="hidden" name="name" value="<?php echo $rows['name']; ?>"/>
			<input type="hidden" name="price" value="<?php echo $rows['price']; ?>"/>
			<input type="hidden" name="image" value="<?php echo $rows['image']; ?>"/>

			<div style="margin-top: 5px; margin-bottom: 5px;">
			<center><button type="submit" name="submit" class="btn btn-success" style="height: 25px;"><p style="text-align: center; margin-top: -5px;font-size: 80%;">Add to Cart</p></button>
				</div>
		</form>
	</center>
			</ol>

				<?php

	}
	?>
</div>
<?php
session_start();
if(isset($_SESSION['success3']) && ! empty($_SESSION['success3']))
{
  echo $_SESSION['success3'];
 unset($_SESSION['success3']);
}
?>
</div>
<br><br>
<?php include 'userfooter.php' ?>

</body>
</html>

<?php
if(isset($_POST['submit'])){
	$stock=$_POST['stockval'];
$id=$_POST['id'];
$brand=$_POST['brand'];
$name=$_POST['name'];
$price=$_POST['price'];
$qty=$_POST['qty'];
session_start();
$username=$_SESSION['username'];
$image=$_POST['image'];
if($stock >= $qty)
{
	$sql1="SELECT * from cart where username='$username'";

$result1=mysqli_query($con,$sql1);
while($rows1=mysqli_fetch_assoc($result1))
{
$cartid=$rows1['id'];
}
if($id == $cartid)
{
	echo "'<script>
window.location.href='helmets.php';
alert('Item already added !');
	</script>'";
}
else
{
$sql="INSERT into cart(username,id,brand,price,qty,name,image) values('$username','$id','$brand','$price','$qty','$name','$image')";
$result=mysqli_query($con,$sql);

$_SESSION['success3'] = '<script>$.alert({
    backgroundDismiss: true,
    type: "green",
   
    title: "",
    content: "Item Added to Cart !",

});</script>';

echo "'<script>
window.location.href='helmets.php';
	</script>'";
}
}
else
{
	echo "'<script>
window.location.href='helmets.php';
alert('Available Quantity = ' + $stock);
	</script>'";
    
}
}
?>