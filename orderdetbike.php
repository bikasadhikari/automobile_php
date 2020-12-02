<?php require 'dbcon.php'; 



if(isset($_GET['payid']))
{
$payid=$_GET['payid'];
}
?>

<?php include 'userheader.php' ?>

<head>

	<script src="headers/jquery.js"></script>
	<script type="text/javascript">
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
</script>

</head>
<body onload="function1();">

	<?php
	$sql = "SELECT sales.model,sales.company,sales.image,fullpay1.payment,fullpay1.status,fullpay1.address1,fullpay1.address2,fullpay1.city,fullpay1.state,fullpay1.pincode,fullpay1.contact,fullpay1.fname,fullpay1.lname, fullpay1.payid, fullpay1.date,fullpay1.id,fullpay1.amount,fullpay1.adminupdate,fullpay1.cusquery from sales inner join fullpay1 on sales.id=fullpay1.id where payid='$payid'";
	$result=mysqli_query($con,$sql);
	$rows=mysqli_fetch_assoc($result);
	if($rows > 0)
	{
	  	?>
<div class="container" id="table" style="width: 60%;">
    <center><h3 style="margin-top: 50px;"><u></u></h3></center><br>

      <div class="table-responsive">
        <table class="table table-bordered">
  <tr align="center">

	<td colspan="2"><?php echo "<img src='".$rows['image']."' width='250' height='185' >"?></td>
	</tr>
	<tr align="center">
  <th width="35%">Name</th>
	<td width="65%"><?php echo $rows['fname']." ".$rows['lname']; ?> </td>
	</tr>
	<tr align="center">
  <th width="35%">Contact</th>
	<td width="65%"><?php echo $rows['contact']; ?> </td>
	</tr>
	<tr align="center">
  <th width="35%">Delivery Address</th>
	<td width="65%"><?php echo $rows['address1']." ".$rows['address2'].", ".$rows['city'].", ".$rows['state'].", ".$rows['pincode']; ?> </td>
	</tr>
	<tr align="center">
  <th width="35%">Company</th>
	<td width="65%"><?php echo $rows['company']; ?> </td>
	</tr>

<tr align="center">
  <th width="35%" align="center">Model</th>
	<td width="65%">
	<?php echo $rows['model']; ?> </td>
	</tr>

	<tr align="center">
  <th width="35%">Price<span class="text-muted" style="font-size: .9vw"> (At the time of buying)</span></th>
	<td width="65%">₹ <?php echo $rows['amount']; ?> </td>
	</tr>
	
	<tr align="center">
  <th width="35%">Details</th>
  <td width="65%"><a href="buybtn.php?id=<?php echo $rows['id']; ?>">View Details</a></td>
	<!--<td width="65%">Displacement: <?php echo $rows['enginecc']; ?>CC <br>	
		Mileage: <?php echo $rows['mileage']; ?>Km/ltr <br>
        Fuel Capacity: <?php echo  $rows['fuelcap']; ?> ltrs <br>
        ABS: <?php echo  $rows['abs']; ?>  <br>
        Power: <?php echo  $rows['fuelcap']; ?> ltrs <br>
        Fuel Capacity: <?php echo  $rows['fuelcap']; ?> ltrs <br>
        Fuel Capacity: <?php echo  $rows['fuelcap']; ?> ltrs <br>
	</td> -->
	</tr>
	<tr align="center">
  <th width="35%">Payment</th>
	<td width="65%"><?php echo $rows['payment']; ?> </td>
	</tr>
	<tr align="center">
  <th width="35%">Payment ID</th>
	<td width="65%"><input type="hidden" name="" id="payid" value="<?php echo $rows['payid']; ?>"><?php echo $rows['payid']; ?> </td>
	</tr>
	<tr align="center">
  <th width="35%">Status</th>
	<td width="65%"><?php echo $rows['status']; ?> </td>
</tr>
	<tr align="center">
  <th width="35%">Queries</th>
  <td width="65%"><textarea style="resize: none;" name="cusquery" id="cusquery" rows="5" cols="45"><?php echo $rows['cusquery']; ?> </textarea><br><br><button id="querysubmit" name="query">Submit</button>  </td>

  </tr>
	<tr align="center">
  <th width="35%">Admin Updates</th>
	<td width="65%"><?php echo $rows['adminupdate']; ?> </td>
	</tr>
	
	<tr align="center">
  <th width="35%">Bill</th>
	<td width="65%"><a class="btn btn-success" target="_blank" href="invoice/bikebill.php?payid=<?php echo $rows['payid']; ?>" style="color: white">View Bill</a></td>
	</tr>
</table>
</div>
</div>
<?php
	  }
	  else
	  {
	  
	 
	    $sql1 = "SELECT emipay.payid,emipay.name,emipay.lname,emipay.contact,emipay.address,emipay.address2,emipay.city,emipay.state,emipay.pincode,emipay.payment,emipay.status,emipay.id,emipay.downpay,emipay.bankint,emipay.amount,emipay.months,emipay.loanamt,emipay.intamt,emipay.totamt,emipay.monpay,emipay.date,emipay.adminupdate,emipay.cusquery,sales.id,sales.image,sales.company,sales.model,sales.price from emipay inner join sales on emipay.id=sales.id where payid='$payid'";
	$result1=mysqli_query($con,$sql1);
	$rows1=mysqli_fetch_assoc($result1);
	{
	  	?>
	  	<div class="container" id="table" style="width: 60%;">
    <center><h3 style="margin-top: 50px;"><u></u></h3></center><br>

      <div class="table-responsive">
        <table class="table table-bordered">
  <tr align="center">

	<td colspan="2"><?php echo "<img src='".$rows1['image']."' width='250' height='185' >"?></td>
	</tr>
	<tr align="center">
  <th width="35%">Name</th>
	<td width="65%"><?php echo $rows1['name']." ".$rows1['lname']; ?> </td>
	</tr>
	<tr align="center">
  <th width="35%">Contact</th>
	<td width="65%"><?php echo $rows1['contact']; ?> </td>
	</tr>
	<tr align="center">
  <th width="35%">Delivery Address</th>
	<td width="65%"><?php echo $rows1['address']." ".$rows1['address2'].", ".$rows1['city'].", ".$rows1['state'].", ".$rows1['pincode']; ?> </td>
	</tr>
	<tr align="center">
  <th width="35%">Company</th>
	<td width="65%"><?php echo $rows1['company']; ?> </td>
	</tr>

<tr align="center">
  <th width="35%" align="center">Model</th>
	<td width="65%">
	<?php echo $rows1['model']; ?> </td>
	</tr>

	<tr align="center">
  <th width="35%">Price <span class="text-muted" style="font-size: .9vw"> (At the time of buying)</span></th>
	<td width="65%">₹  <?php echo $rows1['amount']; ?> </td>
	</tr>
	
	<tr align="center">
  <th width="35%">Details</th>
  <td width="65%"><a href="buybtn.php?id=<?php echo $rows1['id']; ?>">View Details</a></td>
	<!--<td width="65%">Displacement: <?php echo $rows['enginecc']; ?>CC <br>	
		Mileage: <?php echo $rows['mileage']; ?>Km/ltr <br>
        Fuel Capacity: <?php echo  $rows['fuelcap']; ?> ltrs <br>
        ABS: <?php echo  $rows['abs']; ?>  <br>
        Power: <?php echo  $rows['fuelcap']; ?> ltrs <br>
        Fuel Capacity: <?php echo  $rows['fuelcap']; ?> ltrs <br>
        Fuel Capacity: <?php echo  $rows['fuelcap']; ?> ltrs <br>
	</td> -->
	</tr>
	<tr align="center">
  <th width="35%">Payment</th>
	<td width="65%"><?php echo $rows1['payment']; ?> </td>
	</tr>
	<tr align="center">
  <th width="35%">Mode</th>
	<td width="65%">EMI </td>
	</tr>
	<tr align="center">
  <th width="35%">Payment ID</th>
	<td width="65%"><input type="hidden" name="" id="payid" value="<?php echo $rows1['payid']; ?>"><?php echo $rows1['payid']; ?> </td>
	</tr>
	
	<tr align="center">
  <th width="35%"><span style="">EMI Details</span></th>
	<td width="65%">
		<div class="container" id="table" style="width: 100%;position: relative;">
			<div class="table-responsive">
        <table class="table table-bordered">
        	<tr align="center">
  <th >Downpayment</th>
  <th>Interest</th>
  <th>Tenure</th>
  <th>Loanamount + Interest</th>
  <th>Monthly Payment</th>

</tr>
   <tr align="center">
   	<td>₹ <?php echo $rows1['downpay']; ?></td>
   <td><?php echo $rows1['bankint']; ?>%</td>
   <td><?php echo $rows1['months']; ?> months</td>
   <td>₹ <?php echo $rows1['totamt']; ?></td>
   <td>₹ <?php echo $rows1['monpay']; ?></td>
</tr>
        </table>
    </div>
</div>
	</td>
	</tr>
	<tr align="center">
  <th width="35%">EMI Start Date</th>
	<td>
		<?php
		$startdate=$rows1['date'];
		$effectiveDate1 = strtotime("+0 months", strtotime($startdate));
        echo date('d-m-Y',$effectiveDate1);
		?>
	</td>
</tr>
	<tr align="center">
  <th width="35%">EMI End date</th>
	<td width="65%">
		<?php 
		$enddate =  $rows1['date']; 
		$months = $rows1['months'];
		$effectiveDate = strtotime("$months months", strtotime($enddate));
		echo date('d-m-Y',$effectiveDate);?> 

</td>
	</tr>
	
	<tr align="center">
  <th width="35%">Status</th>
	<td width="65%"><?php echo $rows1['status']; ?> </td>
	</tr>
	 <tr align="center">
  <th width="35%">Queries</th>
  <td width="65%"><textarea style="resize: none;" name="cusquery" id="cusquery" rows="5" cols="45"><?php echo $rows1['cusquery']; ?> </textarea><br><br><button id="querysubmit">Submit</button></td>

  </tr>

	<tr align="center">
  <th width="35%">Admin Updates</th>
	<td width="65%"><?php echo $rows1['adminupdate']; ?> </td>
	</tr>
	</tr>
	<tr align="center">
  <th width="35%">Bill</th>
	<td width="65%"><a class="btn btn-success" target="_blank" href="invoice/emibill.php?payid=<?php echo $rows1['payid']; ?>" style="color: white">View Bill</a></td>
	</tr>
</table>
</div>
</div>
	<?php
}
}
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#querysubmit').click(function(){
				var payid=$('#payid').val();
				var cusquery=$('#cusquery').val();
				$.ajax({
					url: 'admin/updates.php',
					type: 'post',
					data: {payid: payid,
							cusquery: cusquery},
					success: function(response){
						console.log(response);
					},

				});
			});
		});

	</script>
</body>
<?php include 'userfooter.php' ?>

