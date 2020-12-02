<?php
$sid=$_GET['sid'];
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
 $sql="SELECT * from service where sid='$sid'";
 $results=mysqli_query($con,$sql);
 while($rows=mysqli_fetch_assoc($results))
 {
 ?>
 <div class="container" id="table" style="width: 60%;">
    <center><h3 style="margin-top: 50px;"><u></u></h3></center><br>

      <div class="table-responsive">
        <table class="table table-bordered">
        	<tr align="center">
  <th width="35%">Servicet ID</th>
	<td width="65%"><input type="hidden" name="sid" id="sid" value="<?php echo $rows['sid']; ?>"/> <?php echo $rows['sid']; ?> </td>
	</tr>
  <tr align="center">

  <th width="35%">Name</th>
	<td width="65%"><?php echo $rows['name']; ?> </td>
	</tr>
	<tr align="center">
  <th width="35%">Contact</th>
	<td width="65%"><?php echo $rows['contact']; ?> </td>
	</tr>
	<tr align="center">
  <th width="35%">Address</th>
	<td width="65%"><?php echo $rows['address']; ?> </td>
	</tr>
	<?php
		$date=$rows['serdate'];
		$effectiveDate = strtotime("+0 months", strtotime($date));
        
		?>
	<tr align="center">
  <th width="35%">Service Date</th>
	<td width="65%"><?php echo date('d-m-Y',$effectiveDate); ?> </td>
	</tr>
	
<tr align="center">
  <th width="35%" align="center">Register Number</th>
	<td width="65%"><?php echo $rows['regno']; ?>
	 </td>
	</tr>
	<tr align="center">
  <th width="35%">Company</th>
	<td width="65%"><?php echo $rows['make']; ?> </td>
	</tr>
	
		
	<tr align="center">
  <th width="35%">Model</th>
	<td width="65%"><?php echo $rows['model']; ?> </td>
	</tr>
	<tr align="center">
  <th width="35%">Services Requested</th>
	<td width="65%"><?php echo $rows['services']; ?> </td>
	</tr>
	<tr align="center">
  <th width="35%">Services Done</th>
	<td width="65%"><?php echo $rows['serviceoffer']; ?> </td>
	</tr>
<tr align="center">
  <th width="35%">Status</th>
	<td width="65%"><?php echo $rows['status']; ?> </td>
	</tr>
	<tr align="center">
  <th width="35%">Total Bill</th>
	<td width="65%"><?php echo $rows['totcost']; ?> </td>
	</tr>
	<tr align="center">
  <th width="35%">Payment Mode</th>
	<td width="65%"><?php echo $rows['payment']; ?> </td>
	</tr>
		
	<tr align="center">
  <th width="35%">Queries</th>
	<td width="65%"><textarea name="cusquery" id="cusquery" rows="6" cols="45"><?php echo $rows['cusquery']; ?></textarea><br><br><button id="querysubmit">Submit</button></td>
	</tr>
	
	<tr align="center">
  <th width="35%">Admin Remarks</th>
	<td width="65%"><?php echo $rows['adminupdate']; ?></td>
	</tr>
	<tr align="center">
  <th width="35%">Bill</th>
	<td width="65%"><a href="invoice/serbill.php?sid=<?php echo $rows['sid']; ?>" class="btn btn-success">View Bill</a></td>
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
				var sid=$('#sid').val();
				var cusquery=$('#cusquery').val();
				$.ajax({
					url: 'admin/updates.php',
					type: 'post',
					data: {sid: sid,
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