<?php include 'userheader.php' ?>
<?php require 'dbcon.php' ?>
<?php
session_start();
$username=$_SESSION['username'];
$query="SELECT * from cart where username='$username'";
$result=mysqli_query($con,$query);

?>

<html>
<head>
	
	<script type="text/javascript">
		function loadTot()
		{
			var tot = document.getElementById('totalval').value;

			if(parseInt(tot) > "0")
			{
				document.getElementById('continue').disabled = false;
				document.getElementById('msg').style.visibility = 'hidden';

			}
			else
			{
				document.getElementById('table').style.visibility = "hidden";
				document.getElementById('continue').disabled = true;
			}


		}
	</script>
	<script type="text/javascript">
		function remBtn()
		{
			var x = document.getElementById('stk').value;
			if(x == "1")
			{
				document.getElementById('continue').disabled = true;
				document.getElementById('btnalert').style.visibility = "visible";
			}
		}
	</script>

</head>
<body onload="function1();loadTot();remBtn();">
	<div class="container" id="table">
    <center><h3 style="margin-top: 50px;"><u>Order Details</u></h3></center><br>

			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="10%"><center>Brand</center></th>
						<th width="40%"><center>Name</center></th>
						<th width="15%"><center>Price</center></th>
						<th width="10%"><center>Quantity</center></th>
						<th width="15%"><center>Total</center></th>
						<th width="5%"><center>Action</center></th>
					</tr>
					<?php
	while($rows=mysqli_fetch_assoc($result))
	{
		$id12=$rows['id'];
		$qty2=$rows['qty'];
		
		$sql2="SELECT * from accessories where id='$id12'";
		$results2=mysqli_query($con,$sql2);
		$rows12=mysqli_fetch_assoc($results2);
		$stock=$rows12['stock'];

		?>          

					<tr>
						<td><center><?php echo $rows["brand"]; ?></center></td>
						<td><center><?php
						if($qty2 > $stock)
						{
							
							?>

							<?php echo $rows["name"]; ?>
							<br>
							<strong>
							<?php
							echo "(Stock Not Available)";
							?>
						</strong>
					</center>
					<?php
						}
						else
						{
							?>
                             <center><?php echo $rows["name"]; ?>
							<?php

						}
						?></center></td>
						<td><center><span id="price">₹ <?php echo $rows["price"]; ?></span></center></td>
						<td><center><span id="qtyyy"> <?php echo $rows["qty"]; ?> </span><span id="stock"> </span></center></td>
						<td><center>₹ <?php echo number_format($rows["price"] * $rows["qty"], 2);?></center> 
					</td>

  
                    
						<td>
							<?php
						if($qty2 > $stock)
						{
							echo "";
							echo "<span><input type='hidden' id='stk' value='1'</span>";
							?>
							<center><form action="removeitem.php" method="post"><button type="submit" name="remove" id="rem1" class="btn btn-warning" value="<?php $rows['id']; ?>"/>Remove</button></center>
                             
							<input type="hidden" name="id" id="id" value="<?php echo $rows['id']; ?>"/></form>
                         <?php
                     }
                     else{
                     	?>
							<center><form action="removeitem.php" method="post"><button type="submit" name="remove" id="rem" class="btn btn-danger" style="" value="<?php $rows['id']; ?>" />Remove</button></center>
                        
							<input type="hidden" name="id" id="id" value="<?php echo $rows['id']; ?>"/></form>
							</td>
							<?php
						}
						?>
					</tr>

					<?php
							$total = $total + ($rows["price"] * $rows["qty"]);
						
					?>

					<?php

}

?>
		<tr>
						<td colspan="4" align="right"><b style="margin-right: 23px;">Total</b></td>
						<td align="right"><center>₹ <span id="total12"><?php echo number_format($total, 2); ?></span></center></td>
						<td></td>
					</tr>
					<input type="hidden" id="totalval" value=<?php echo number_format($total, 2); ?>>

	
				</table>


	<form action="accesdelivery.php" method="post">
	
		<input type="hidden" name="totalval" value=<?php echo number_format($total, 2); ?>>
<input type="submit" name="continue" class="btn btn-primary" id="continue" value="Continue" style="float: right;margin-top: 10px;width: 110px;">




<?php
$query1="SELECT * from cart where username='$username'";
$result1=mysqli_query($con,$query1);
while($rows1=mysqli_fetch_assoc($result1))
	{

?>

<input type="hidden" name="id" id="viewid" value=<?php echo $rows1['id'];?>>
<input type="hidden" name="qty" name="qty" value=<?php echo $rows1['qty'];?>>
<input type="hidden" name="total" id="posttotal" value="">
<?php
}
?>


<!--<script type="text/javascript">
	var id = document.getElementById('id').value;
	document.getElementById('viewid').value = id;
</script>-->
</form>

</div>



	</div>
</div>
<div style="margin-top: -180px; width: 60%; position: relative; left: 260px;" id="msg">
	<div class="card text-center">
  <div class="card-header">
    
  </div>
  <div class="card-body">
    <h5 class="card-title" style="font-size: 180%;">Your Cart is Empty !</h5>
    <br>
    <a href="acces.php" class="btn btn-success">Go Shopping</a>
  </div>
  <div class="card-footer text-muted">
    
  </div>
</div>
	</div>
	<div id="btnalert" style="margin-left: 450px;visibility: hidden; border: 1px solid red;width: 500px;height:50px; text-align: center;font-size: 110%;"><span style=""><strong>Remove the Items which are not in Stock to proceed further (Click the buttons with Yellow colour)</strong></span></div>
<?php include 'userfooter.php' ?>
</body>
</html>