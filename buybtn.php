


<?php
error_reporting(E_ALL & ~E_NOTICE);
?>
	<?php
session_start();


?> 
<?php

$con=mysqli_connect('127.0.0.1','root','','throttleup');

?>

<!DOCTYPE html>
<html>
<head>
	<input type="hidden" id="usernameval1" name="usernameval" value=<?php echo $_SESSION['username']; ?>>
	
	<link rel="stylesheet" type="text/css" href="indexsalebuybtn1.css">
<script type="text/javascript" src="validation.js"></script>

<title>BUY</title>
 <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="headers/jquery.js"></script>
  <script src="headers/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="headers/facss/all.css">
 <link rel="stylesheet" type="text/css" href="headers/v4-shims.css">
  <link rel="stylesheet" href="headers/material-icons.css">

    <script>
        function function1()
       {
        if(document.getElementById('usernameval').value == '')
        {
             element = document.getElementById('logoutlink');
          element.style.visibility='hidden';
        }else
        {
            element1 = document.getElementById('loginlink');
            element1.style.visibility='hidden';
        }

    }
    function stock()
    {
    	if(document.getElementById('stock').value == '0')
        {
        	document.getElementById('btn1').disabled = true;
        	document.getElementById('emibtn').disabled = true;
        	document.getElementById('outstock').style.visibility = 'visible';
        }

    }
    </script>
<title>Throttle up</title>
<link rel="stylesheet" type="text/css" href="style.css">

<style type="text/css">
.logo{
  height: 110px;
    width: auto;
    margin-top: -30px;
    margin-left: -20px;
}
</style>
	
  
</head>
<body onload="function1();stock();btnVal();">
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="throttleup.php"><img src="logo.png" class="logo" style="" alt=""></a>
  <div class="uname">
  <?php

session_start();

echo "Welcome " .$_SESSION['username'] . "!";


?>
</div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">

      <li class="nav-item ">
        <a class="nav-link" id="loginlink" href="logindes.php">Login <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="indexsale.php">Buy</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="indexsubs.php">Subscribe</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="service.php">Service</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="acces.php">Accessories</a>
      </li>
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" id="logoutlink" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
          Profile
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="">
        	<a class="dropdown-item" href="account.php">My Account</a>
          <a class="dropdown-item" href="myorders.php">My Orders</a>
          <a class="dropdown-item" href="logout.php">Logout</a>
      </li>
      
    </ul>
  </div>
</nav>
 


     <?php
     if(isset($_GET['id']))
     {
$id1=$_GET['id'];
?>
<br><br><br>

<div class="dblock">
<?php

	

	$query1 = "SELECT * from sales where id='$id1'";
	$query_run1 = mysqli_query($con,$query1);

	while($rows1 = mysqli_fetch_array($query_run1))
	{
		?>
		  	
		
			<div class="blockimg" style="margin-left: 230px; background-color: black; ">
					<?php echo "<img src='".$rows1['image']."' width='380' height='365' >"?>
						
					</div><br>
		

		<div class="rows" style="float: none; margin-left: 650px; margin-top: -365px; overflow: hidden; ">
			<!--<p class="row1"><strong><u>Details</u></strong></p>-->
			 <b> CATEGORY</b><span style="padding-left: 52px"> :</span><span style="padding-left: 52px; "> </b><?php echo $rows1['pcategory']; ?></span><br>
			<b>COMPANY</b><span style="padding-left: 60px">:</span><span style="padding-left: 52px"></span> </b><?php echo $rows1['company']; ?></span><br>
			 <b>MODEL</b><span style="padding-left: 91px">: </span><span style="padding-left: 52px"></span> </b><?php echo $rows1['model']; ?><br>
		      <b>PRICE</b><span style="padding-left: 107px">:</span><span style="padding-left: 52px"></span> </b><?php echo $rows1['price']; ?><br>
		      <b>DISPLACEMENT</b><span style="padding-left: 8px">:<span style="padding-left: 52px"></span> </b><?php echo $rows1['enginecc']; ?><br>
		      <b>MILEAGE</b><span style="padding-left: 75px">:<span style="padding-left: 52px"></span> </b><?php echo $rows1['mileage']; ?><br>
		      <b>POWER</b><span style="padding-left: 90px">:<span style="padding-left: 52px"></span> </b><?php  echo $rows1['power']; ?><br>
		      <b>ABS</b><span style="padding-left: 125px">:<span style="padding-left: 52px"></span> </b><?php  echo $rows1['abs']; ?><br>
		      <b>FUEL-CAPACITY</b><span style="padding-left: 10px">:<span style="padding-left: 52px"></span> </b><?php echo $rows1['fuelcap']; ?><br>
		         <br>



<?php
}
?>
</div>
<?php
}
?>

 <div class="welcome">
    <h4>
<input type="hidden" id="usernameval"  value=<?php session_start(); echo $_SESSION['username']; ?>>
</h4>
	  <br>
	  <br>

<div class="dblock">

<?php

	$id = $_POST['id'];

	$query = "SELECT * from sales where id='$id'";
	$query_run = mysqli_query($con,$query);

	while($rows = mysqli_fetch_array($query_run))
	{
		?>
		  	
		
			
<div class="blockimg" style="margin-left: 230px; background-color: black;position: relative; ">
	
		<?php echo "<img src='".$rows['image']."' width='380' height='365' >"?>
			<div id="outstock" style="background: rgba(0,0,0,0.85); width: 100%; height: 50px;position:absolute; top:50%;text-align: center; visibility: hidden;">
				<span style="color: white;font-size: 180%;">Out Of Stock</span>
		</div>
		

		</div>
		<br>
<input type="hidden" name="stock" id="stock" value="<?php echo $rows['stock']; ?>"/>
		<div class="rows" style="float: none; margin-left: 650px; margin-top: -365px; overflow: hidden; ">
			<!--<p class="row1"><strong><u>Details</u></strong></p>-->
			 <b> CATEGORY</b><span style="padding-left: 52px"> :</span><span style="padding-left: 52px; "> </b><?php echo $rows['pcategory']; ?></span><br>
			<b>COMPANY</b><span style="padding-left: 60px">:</span><span style="padding-left: 52px"></span> </b><?php echo $rows['company']; ?></span><br>
			 <b>MODEL</b><span style="padding-left: 91px">: </span><span style="padding-left: 52px"></span> </b><?php echo $rows['model']; ?><br>
		      <b>PRICE</b><span style="padding-left: 107px">:</span><span style="padding-left: 52px"></span> </b><?php echo $rows['price']; ?><br>
		      <b>DISPLACEMENT</b><span style="padding-left: 8px">:<span style="padding-left: 52px"></span> </b><?php echo $rows['enginecc']; ?><br>
		      <b>MILEAGE</b><span style="padding-left: 75px">:<span style="padding-left: 52px"></span> </b><?php echo $rows['mileage']; ?><br>
		      <b>POWER</b><span style="padding-left: 90px">:<span style="padding-left: 52px"></span> </b><?php  echo $rows['power']; ?><br>
		      <b>ABS</b><span style="padding-left: 125px">:<span style="padding-left: 52px"></span> </b><?php  echo $rows['abs']; ?><br>
		      <b>FUEL-CAPACITY</b><span style="padding-left: 10px">:<span style="padding-left: 52px"></span> </b><?php echo $rows['fuelcap']; ?><br>
		         <br>


		        <div id="msg" class="msg text-danger" style="margin-top: -30px; border: 1px solid red; width: 200px; margin-left: 60px;font-size: 80%;" align="center" >
		        	Login to Continue!
		        </div>

		         

		        <form action="del.php" method="post" onload="btnVal();">
		        	<input type="hidden" name="id" value=<?php echo $rows['id']; ?> >
		        	<input type="hidden" name="company" value=<?php echo $rows['company']; ?> >
		        	<input type="hidden" name="model" value="<?php echo $rows['model']; ?>" />
		        	<input type="hidden" name="price1" value=<?php echo $rows['price'];?> >
		        	<input type="hidden" name="image"  value=<?php echo $rows['image'];?> >
		        	<input type="hidden" name="category"  value=<?php echo $rows['pcategory'];?> >
		        	<input type="hidden" name="enginecc"  value="<?php echo $rows['enginecc'];?>" />
		        	<input type="hidden" name="mileage" value=<?php echo $rows['mileage'];?> >
		        	<input type="hidden" name="abs" value=<?php echo $rows['abs'];?> >
		        	<input type="hidden" name="power"  value=<?php echo $rows['power'];?> >
		        	<input type="hidden" name="fuelcap"  value=<?php echo $rows['fuelcap'];?> >

		        	<input id="btn1" class="btn btn-success" type="submit" value="Buy Now" name="buynow" onclick="">
		        		<input id="emibtn" class="btn btn-primary" type="submit" value="Pay with EMI" name="emi" formaction="emi.php">
		        	<!--<input class="btn2" type="submit" name="emi" value="EMI"></center>-->
		        </form>
		   

	
		
			
			

		 

		<?php


	}

?>
</div>
	
</body>
</html>
<?php include 'userfooter.php' ?>

