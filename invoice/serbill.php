
<?php
error_reporting(0);
if(isset($_GET['sid'])){
	$sid=$_GET['sid'];
require '../dbcon.php'; ?>
<html>

	<head>
	<title>Invoice</title>
		<style type="text/css">
		body {
			font-family: Verdana;
		}

		div.invoice {
			margin: 0 auto;
		border:1px solid #ccc;
		padding:10px;
		height:740pt;
		width:570pt;
		position: absolute;
		top: 0%;
		left:50%;
		transform: translate(-50%, 0%);

		}

		div.company-address {
			border:1px solid #ccc;
			float:left;
			width:200pt;
		}

		div.invoice-details {
			border:1px solid #ccc;
			float:right;
			width:200pt;
		}

		div.customer-address {
			border:1px solid #ccc;
			float:right;
			margin-bottom:50px;
			margin-top:100px;
			width:200pt;
		}

		div.clear-fix {
			text-align: center;
		}

		table {
			width:100%;
			position: relative;
		}

		th {
			background-color: #D5D8DC ;
			padding: 10px 0px;
			text-align: center;
		}

		td {
			padding: 15px 0px;
			text-align: center;
		}

		.text-left {
			text-align:left;
		}

		.text-center {
			text-align:center;
		}

		.text-right {
			text-align:right;
		}

		.heading{
			float: right;
			margin-right: 80px;
		}

		.invoice .footer{
			position: absolute;
  			bottom: 10px;
  			display: flex;
  			justify-content: center;
  			width: 100%;

		}
		</style>
	</head>

	<body>
		<div id="content">
	<div class="invoice">
		<div class="heading">
		<h2>INVOICE</h2>
	</div>
		<div class="logo">
		<img src="../logo.png" width="100">
	</div>

		<div class="company-address">

			Throttleup
			<br />
			222 Kr Puram, Devasandra,
			<br />
			Bangalore, 560036.
			<br />
			Phone: +917022472891
			<br />
			projectdreams333@gmail.com
		</div>

		<div class="invoice-details">
			<?php
			$sql="SELECT * from service where sid='".$_GET['sid']."'";
			$res=mysqli_query($con,$sql);
			$rows=mysqli_fetch_assoc($res);
			?>
			Service ID: <?php echo $rows['sid']; ?>
			<br />
			Date: <?php echo $rows['date']; ?>
			<br />
			Customer ID: <?php echo $rows['cusid']; ?>
		</div>

		<div class="customer-address">

			<b>Bill To:</b>
			<br />
			<?php echo $rows['name']?>
			<br />
			<?php echo $rows['address']; ?>
			<br />
			<?php echo $rows['pincode'] .".";?>
			<br />
			<?php echo $rows['contact'];?>
		</div>

		<div>
			<table border='1' cellspacing='0'>
				<tr>
					<th width=250>Products</th>
					<th width=80>Quantity</th>
					<th width=100>Price</th>


				</tr>
				<?php
				$sql1="SELECT * from serbill where sid='".$_GET['sid']."'";
			$res1=mysqli_query($con,$sql1);
			while($rows1=mysqli_fetch_assoc($res1)){
				?>
				<tr>
					<td><?php echo $rows1['name']; ?><br>


				</td>
					<td><?php echo $rows1['qty']; ?></td>
					<td>₹ <?php echo $rows1['price']; ?></td>
				</tr>
				<?php
				$final_amt=$rows1['final_amt'];
			}
			?>
			<tr>
				<th colspan="2">Total</th>
				<td>₹ <?php echo $final_amt; ?></td>


			</table><br>

			</div>
			<div class="footer">
				<h3>Thank you</h3>
			</div>
		</div>
		</div>
	</body>

</html>

<?php
}
?>
