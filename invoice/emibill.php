<?php require '../dbcon.php'; ?>
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
			$sql="SELECT * from emipay where payid='".$_GET['payid']."'";
			$res=mysqli_query($con,$sql);
			$rows=mysqli_fetch_assoc($res);
			?>
			Payment ID: <?php echo $rows['payid']; ?>
			<br />
			Date: <?php echo $rows['date']; ?>
			<br />
			Customer ID: <?php echo $rows['cusid']; ?>
		</div>
		
		<div class="customer-address">

			<b>Bill To:</b>
			<br />
			<?php echo $rows['name'] ." ".$rows['lname']; ?>
			<br />
			<?php echo $rows['address'] .",<br/> ".$rows['address2']; ?>
			<br />
			<?php echo $rows['city'] ." ".$rows['pincode'] .".";?>
			<br />
			<?php echo $rows['contact'] ."<br/> ".$rows['email'] ."";?>
		</div>
		
		<div>
			<table border='1' cellspacing='0'>
				<tr>
					<th width=250>Description</th>
					<th width=80>Quantity</th>
					<th width=100>Price</th>
					
				</tr>
				<?php
				$id=$rows['id'];
				$sql1="SELECT * from sales where id='$id'";
			$res1=mysqli_query($con,$sql1);
			$rows1=mysqli_fetch_assoc($res1);
				?>
				<tr>
					<td>Make: <?php echo $rows1['company']; ?><br>
					Model: <?php echo $rows1['model']; ?><br>
					Displacement: <?php echo $rows1['enginecc']; ?><br>
					ABS: <?php echo $rows1['abs']; ?>
				</td>
					<td>1</td>
					<td>₹ <?php echo $rows1['price']; ?></td>
				</tr>
				

		
			</table><br>
			<h3 align="center"><u>EMI Details</u></h3>
			<table class="table table-bordered" border="1">
        	<tr align="center">
  <th >Downpayment</th>
  <th>Interest</th>
  <th>Tenure</th>
  <th>Loanamount + Interest</th>
  <th>Monthly Payment</th>
  <?php
$sql1 = "SELECT emipay.payid,emipay.name,emipay.lname,emipay.contact,emipay.address,emipay.address2,emipay.city,emipay.state,emipay.pincode,emipay.payment,emipay.status,emipay.id,emipay.downpay,emipay.bankint,emipay.amount,emipay.months,emipay.loanamt,emipay.intamt,emipay.totamt,emipay.monpay,emipay.date,emipay.adminupdate,emipay.cusquery,sales.id,sales.image,sales.company,sales.model,sales.price from emipay inner join sales on emipay.id=sales.id where payid='".$_GET['payid']."'";
	$result1=mysqli_query($con,$sql1);
	$rows=mysqli_fetch_assoc($result1);
	
		?>
</tr>
   <tr align="center">
   	<td>₹ <?php echo $rows['downpay']; ?></td>
   <td><?php echo $rows['bankint']; ?>%</td>
   <td><?php echo $rows['months']; ?> months</td>
   <td>₹ <?php echo $rows['totamt']; ?></td>
   <td>₹ <?php echo $rows['monpay']; ?></td>
</tr>
        </table>
			</div>
			<div class="footer">
				<h3>Thank you</h3>
			</div>
		</div>
		</div>
	</body>
	
</html>