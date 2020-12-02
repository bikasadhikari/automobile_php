<?php
$payid=$_GET['payid'];
?>
<?php include 'userheader.php' ?>
<?php require 'dbcon.php' ?>

<head>
	<script type="text/javascript" src="validation.php"></script>
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
  session_start();
  $username=$_SESSION['username'];
  $usersql="SELECT * from registration where username='$username'";
  $userresults=mysqli_query($con,$usersql);
  while($userrows=mysqli_fetch_assoc($userresults))
  {
    $cusid=$userrows['cusid'];

  }

$sql="SELECT subbook.id,subbook.fname,subbook.lname,subbook.contact,subbook.deldate,subbook.address1,subbook.address2,subbook.city,subbook.state,subbook.pincode,subbook.payment,subbook.status,subbook.payid,subbook.plan,subbook.amount,subbook.adminupdate,subbook.cusquery,subscribe.id,subscribe.model,subscribe.company,subscribe.bikeprice,subscribe.image,subscribe.enginecc from subbook inner join subscribe on subbook.id=subscribe.id where payid='$payid'";
$results=mysqli_query($con,$sql);
while($rows=mysqli_fetch_assoc($results))
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
	<?php
		$date=$rows['deldate'];
		$effectiveDate = strtotime("+0 months", strtotime($date));
        
		?>
	<tr align="center">
  <th width="35%">Delivery Date</th>
	<td width="65%"><?php echo date('d-m-Y',$effectiveDate); ?> (Subscription Start date) </td>
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
  <th width="35%">Displacement</th>
	<td width="65%"> <?php echo $rows['enginecc']; ?>CC  </td>
	</tr>
	<tr align="center">
  <th width="35%">Original Bike Price</th>
	<td width="65%">₹ <?php echo $rows['bikeprice']; ?> </td>
	</tr>
<tr align="center">
  <th width="35%">Plan Chosen</th>
	<td width="65%"><?php echo $rows['plan']; ?> Months</td>
	</tr>
	<tr align="center">
  <th width="35%">Monthly Payment</th>
	<td width="65%">₹ <?php echo $rows['amount']; ?> </td>
	</tr>
	<?php
	$plan=$rows['plan'];
		$date2=$rows['deldate'];
		$effectiveDate2 = strtotime("+$plan months", strtotime($date2));?>
	<tr align="center">
  <th width="35%">Subscription End Date</th>
	<td width="65%"><?php echo date('d-m-Y',$effectiveDate2); ?> </td>
	</tr>
	<tr align="center">
  <th width="35%">Payment</th>
	<td width="65%"><?php echo $rows['payment']; ?> </td>
	</tr>
	<tr align="center">
  <th width="35%">Payment ID</th>
	<td width="65%"><?php echo $rows['payid']; ?><input type="hidden" name="" id="payid" value="<?php echo $rows['payid']; ?>"></td>
	</tr>
	<tr align="center">
  <th width="35%">Status</th>
	<td width="65%"><?php echo $rows['status']; ?> </td>
	</tr>
	<tr align="center">
  <th width="35%">Queries</th>
  <td width="65%"><textarea style="resize: none;" name="cusquery" id="cusquery" rows="5" cols="45"><?php echo $rows['cusquery']; ?> </textarea><br><br><button id="querysubmit">Submit</button></td>

  </tr>
	<tr align="center">
  <th width="35%">Admin Remarks</th>
	<td width="65%"><?php echo $rows['adminupdate']; ?></td>
	</tr>
	<tr align="center">
  <th width="35%">Bill</th>
	<td width="65%"><a href="invoice/subbill.php?payid=<?php echo $rows['payid'];?>"  class="btn btn-success">View Bill</a></td>
	</tr>
</table>
</div>
</div>
<?php
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
					data: {payidsub: payid,
							cusquerysub: cusquery},
					success: function(response){
						console.log(response);
					},

				});
			});
		});

	</script>
</body>
<?php include 'userfooter.php' ?>