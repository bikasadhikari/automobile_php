<?php include 'userheader.php'?>
<?php require 'dbcon.php' ?>
<head>
	<script type="text/javascript" src="validation.js"></script>
	<style type="text/css">
		* {box-sizing: border-box}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 20%;
  height: 600px;
  margin-left: 15px;

}

/* Style the buttons that are used to open the tab content */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 120%;
}
.tab label {
  display: block;
  background-color: #f1f1f1;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  font-size: 150%;
  font-family: sans-serif;
  
  
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontents {
  margin-left: auto;
  
  border: 1px solid #ccc;
  width: auto;
  height: 800px;
  max-height: 600px;
  
}
	</style>
	</head>

	<body onload="function1();">
		<br><br>
		<div class="tab">
  <label class="tablinks" >My Orders</label>	
  <hr><button class="tablinks" onclick="openCity(event, 'bikes')" id="defaultOpen">Bikes</button>
  <button class="tablinks" onclick="openCity(event, 'subs')">Subscriptions</button>
  <button class="tablinks" onclick="openCity(event, 'access')">Accessories</button>
  <button class="tablinks" onclick="openCity(event, 'services')">Services</button>
</div>

<div id="bikes" class="tabcontents" style="overflow-y: scroll;">
  <?php
  session_start();
  $username=$_SESSION['username'];
  /*$sql = "SELECT payid,status,date,id from fullpay1 where username='$username' UNION SELECT payid,status,date,id from emipay where username='$username'";*/
  $sql = "SELECT fullpay1.payid,fullpay1.date,fullpay1.status,fullpay1.id,sales.id,sales.model from fullpay1 inner join sales on fullpay1.id=sales.id where username='$username' union SELECT emipay.payid,emipay.date,emipay.status,emipay.id,sales.id,sales.model from emipay inner join sales on emipay.id=sales.id where username='$username'";
  $results=mysqli_query($con,$sql);
  ?>
<div class="container" id="table" style="width: 90%;">
    <center><h3 style="margin-top: 50px;"><u>Order Details</u></h3></center><br>

      <div class="table-responsive">
        <table class="table table-bordered">
  
	<tr align="center">
  <th width="10%">Date</th>
	<th width="15%">Payment ID</th>
	<th width="20%">Model</th>
  <th width="15%">Status</th>
  <th width="15%"></th>
	
	</tr>
	<?php
  if(mysqli_num_rows($results) < 1)
  {
    echo "<div style='font-size: 200%; position:absolute; margin-top: 100px;border: 1px solid black;width:350px;text-align:center;margin-left: 275px;'>No Records Found!</div>";
  }
  else
  {
  while ($rows=mysqli_fetch_assoc($results)) 
  {
  
?>

	<tr align="center"><?php

    $date= $rows['date'];
   $myinput=$date; $sqldate=date('d-m-Y',strtotime($myinput));?>
    <td><?php  echo $sqldate;?></td>
		<td><?php echo $rows['payid']; ?></td>
		<td><?php echo $rows['model']; ?></td>
		<td><?php echo $rows['status']; ?></td>
    <td><a href="orderdetbike.php?payid=<?php echo $rows['payid']; ?>">More Details</a></td>
	</tr>

<?php
  }
}
  ?>
  </table>
</div>
</div>
</div>






<div id="subs" class="tabcontents" style="overflow-y: scroll;">
  <?php
  $usersql="SELECT * from registration where username='$username'";
  $userresults=mysqli_query($con,$usersql);
  while($userrows=mysqli_fetch_assoc($userresults))
  {
    $cusid=$userrows['cusid'];

  }

  $subsql="SELECT subbook.date,subbook.id,subbook.status,subbook.payid,subscribe.id,subscribe.model from subbook inner join subscribe on subbook.id=subscribe.id where cusid='$cusid'";
  $subresults=mysqli_query($con,$subsql);
 
  ?>
 <div class="container" id="table2" style="width: 90%;">
   <center><h3 style="margin-top: 50px;"><u>Subscriptions</u></h3></center><br>
    <div class="table-responsive">
        <table class="table table-bordered">
<tr align="center">
  <th width="10%">Date</th>
  <th width="15%">Payment ID</th>
  <th width="20%">Model</th>
  <th width="15%">Status</th>
  <th width="15%"></th>
</tr>
<?php

  if(mysqli_num_rows($subresults) < 1)
  {
    echo "<div style='font-size: 200%; position:absolute; margin-top: 100px;border: 1px solid black;width:350px;text-align:center;margin-left: 275px;'>No Records Found!</div>";
  }
  else
  {
 while($rowssub=mysqli_fetch_assoc($subresults))
  {
    ?>
<tr align="center">
  <?php
  $datesub= $rowssub['date'];
   $myinput1=$datesub; $sqldate1=date('d-m-Y',strtotime($myinput1));?>
  <td><?php echo $sqldate1; ?></td>
  <td><?php echo $rowssub['payid']; ?></td>
  <td><?php echo $rowssub['model']; ?></td>
  <td><?php echo $rowssub['status']; ?></td>
  <td><a href="subordersdet.php?payid=<?php echo $rowssub['payid']; ?>">View Details</a></td>
</tr>
 <?php
}
}
?>

        </table>
      </div>
 </div> 

</div>






<div id="access" class="tabcontents" id="table3" style="overflow-y: scroll;">
  <?php
  $sqlacc="SELECT * from paydet where cusid='$cusid'";
  $resultsacc=mysqli_query($con,$sqlacc);
  ?>
 <div class="container" id="table3" style="width: 90%;">
   <center><h3 style="margin-top: 50px;"><u>Accessories</u></h3></center><br>
    <div class="table-responsive">
        <table class="table table-bordered">
<tr align="center">
  <th width="10%">Date</th>
  <th width="15%">Payment ID</th>
  <th width="20%">Status</th>
  <th width="15%"></th>
  
</tr>
<?php

  if(mysqli_num_rows($resultsacc) < 1)
  {
    echo "<div style='font-size: 200%; position:absolute; margin-top: 100px;border: 1px solid black;width:350px;text-align:center;margin-left: 275px;'>No Records Found!</div>";
  }
  else
  {
while($rowsacc=mysqli_fetch_assoc($resultsacc))
  {
  ?>
<tr align="center">
  <?php
  $dateacc= $rowsacc['date'];
   $myinput2=$dateacc; $sqldate2=date('d-m-Y',strtotime($myinput2));?>
  <td><?php echo $sqldate2; ?></td>
  <td><?php echo $rowsacc['payid']; ?></td>
  
  <td><?php echo $rowsacc['status']; ?></td>
  <td><a href="accordersdet.php?payid=<?php echo $rowsacc['payid']; ?>">View Details</a></td>
</tr>
<?php
}
}
?>
</table>
</div>
</div>
</div>

<div id="services" class="tabcontents" id="table4" style="overflow-y: scroll;">
   <?php
  $sqlser="SELECT * from service where cusid='$cusid'";
  $resultsser=mysqli_query($con,$sqlser);
  ?>
  <div class="container" id="table4" style="width: 90%;">
   <center><h3 style="margin-top: 50px;"><u>Service</u></h3></center><br>
    <div class="table-responsive">
        <table class="table table-bordered">
<tr align="center">
  <th width="10%">Date</th>
  <th width="15%">Service ID</th>
  <th width="15%">REG No</th>
  <th width="10%"></th>
  
</tr>
<?php

  if(mysqli_num_rows($resultsser) < 1)
  {
    echo "<div style='font-size: 200%; position:absolute; margin-top: 100px;border: 1px solid black;width:350px;text-align:center;margin-left: 275px;'>No Records Found!</div>";
  }
  else
  {
while($rowsser=mysqli_fetch_assoc($resultsser))
  {
  ?>
<tr align="center">
 <?php
  $dateser= $rowsser['date'];
   $myinput3=$dateser; $sqldate3=date('d-m-Y',strtotime($myinput3));?>
  <td><?php echo $sqldate3; ?></td>
  <td><?php echo $rowsser['sid']; ?></td>
  
  <td><?php echo $rowsser['regno']; ?></td>
  <td><a href="servicereqs.php?sid=<?php echo $rowsser['sid']; ?>">View Details</a></td>
</tr>
<?php
}
}
?>
</table>
</div>
</div>
</div>
 
</div>

<script>
function openCity(evt, orders) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontents");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(orders).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
		
		</body>
		<?php include 'userfooter.php' ?> 