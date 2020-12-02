<?php
 if(isset($_GET['value1']))
 {
  $value=$_GET['value1'];
 }
 ?>
  <input type="hidden" name="" id="penorders" value="<?php echo $_GET['payid1'] ?>">
 <input type="hidden" name="" id="penback" value="<?php echo $value; ?>">
 <input type="hidden" name="" id="delorders" value="<?php echo $_GET['payid2'] ?>">
<?php include 'adminheader.php';
require '../dbcon.php'; ?>
<head>
  <script type="text/javascript">
    function click()
    {

    document.getElementById('new').click();
  }
   function penclick()
        {        var pen = document.getElementById('penorders').value;
                  var del= document.getElementById('delorders').value;
        var back = document.getElementById('penback').value;
        if(pen.length == 10)
        {
          document.getElementById('pen').click();
        }
        if(back == '1')
        {
          document.getElementById('pen').click();
        }
        if(del.length == 10)
        {
          document.getElementById('del').click();
        }
        if(back == '2')
        {
          document.getElementById('del').click();
        }
        }   
  </script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial;}

.tab {
  overflow: auto;
  border: 1px solid #ccc;
  background-color: #AED6F1 ;
}
textarea{
  resize: none;
}  


.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.5s;
  font-size: 17px;
}
.tab button:hover {
  background-color: #D6EAF8  ;
}
.tab button.active {
  background-color: #3498DB ;
}

.tabcontent {
  display: none;
  padding: 6px 12px;
  -webkit-animation: fadeEffect 1s;
  animation: fadeEffect 1s;
}

.submitbtn
{
  width: 8vw;
  height: 5vh;
  background-color: #28B463 ;
  border-color: #28B463 
}


a:hover
{
  color:green;
}

button.submitbtn:hover
{
  background-color: #3498DB;
  border-color:#3498DB;
  animation: fadeEffect 1s;
}

@-webkit-keyframes fadeEffect {
  from {opacity: 0;}
  to {opacity: 1;}
}

@keyframes fadeEffect {
  from {opacity: 0;}
  to {opacity: 1;}
}
  
</style>
</head>
<body onload="click();penclick();">
<div style="padding-left: 25%;background:#D7BDE2 ;height: 100vh;position: inherit;">
<div style="width:70%;height: 89vh;overflow: auto; background: white;margin-top: 3%;position: absolute;border-radius: 15px;">
<div class="tab">
  <button class="tablinks" id="new" onclick="openOrd(event, 'neword')">New (<?php $count="SELECT payid from fullpay1 where status='Not Confirmed' UNION SELECT payid from emipay where status='Not Confirmed'"; $results=mysqli_query($con,$count); $rows=mysqli_num_rows($results); echo $rows; ?>)</button>
  <button class="tablinks" id="pen" onclick="openOrd(event, 'penord')">Pending (<?php $count="SELECT payid from fullpay1 where status='Confirmed' UNION SELECT payid from emipay where status='Confirmed'"; $results=mysqli_query($con,$count); $rows=mysqli_num_rows($results); echo $rows; ?>)</button>
  <button class="tablinks" id="del" onclick="openOrd(event, 'delord')">Delivered (<?php $count="SELECT payid from fullpay1 where status='Delivered' UNION SELECT payid from emipay where status='Delivered'"; $results=mysqli_query($con,$count); $rows=mysqli_num_rows($results); echo $rows; ?>)</button>
</div>
<br>
<div id="neword" class="tabcontent">
 
  <div class="table-responsive" style="width: 90%;margin-top:0vh;margin-left:5%;position: relative; ">
        <?php
        if(isset($_GET['payid']))
        {
          $payid=$_GET['payid'];
          $sql = "SELECT sales.model,sales.company,sales.image,fullpay1.payment,fullpay1.status,fullpay1.address1,fullpay1.address2,fullpay1.city,fullpay1.state,fullpay1.pincode,fullpay1.contact,fullpay1.fname,fullpay1.lname, fullpay1.payid, fullpay1.date,fullpay1.id,fullpay1.amount,fullpay1.adminupdate,fullpay1.cusquery from sales inner join fullpay1 on sales.id=fullpay1.id where payid='$payid'";
  $result=mysqli_query($con,$sql);
  $rows=mysqli_fetch_assoc($result);
  if($rows > 0)
  {
      ?>
<div class="container" id="table" style="width: 80%;">
    <center><h3 style="margin-top: 0px;"><u></u></h3></center>
<a href="bikeorders.php" style="color: green">Back..</a>
      <div class="table-responsive">
        <form action="updates.php" method="post">
        <table class="table table-bordered">
  <tr align="center">

  <td colspan="2"><?php echo "<img src='../".$rows['image']."' width='250' height='185' >"?></td>
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
  <td width="65%"><a style="color: green" href="../buybtn.php?id=<?php echo $rows['id']; ?>">View Details</a></td>

  </tr>
  <tr align="center">
  <th width="35%">Payment</th>
  <td width="65%"><?php echo $rows['payment']; ?> </td>
  </tr>
  <tr align="center">
  <th width="35%">Payment ID</th>
  <td width="65%"><input type="hidden" name="payid" value="<?php echo $rows['payid']; ?>"/> <?php echo $rows['payid']; ?> </td>
  </tr>
  <tr align="center">
  <th width="35%">Status</th>
  <td width="65%"><select name="status" class="form-control" style="height:5vh;font-size:1vw;width: 10vw">
            <option value="Not Confirmed">Not Confirm</option>
            <option value="Confirmed">Confirm</option>
          </select>
        </td>
      </tr>
   <tr align="center">
  <th width="35%">Customer Queries</th>
  <td width="65%"><?php echo $rows['cusquery']; ?> </td>
  </tr>          
         
  <tr align="center">
  <th width="35%">Update</th>
  <td width="65%"><textarea name="adminupdate" rows="5" cols="30"><?php echo $rows['adminupdate']; ?> </textarea>  </td>

  </tr>
  <tr align="center">
  <th width="35%">Bill</th>
  <td width="65%"><a target="_blank" href="../invoice/bikebill.php?payid=<?php echo $rows['payid']; ?>" style="color: green">View Bill</a></td>
  </tr>
  <tr align="center">
  <br>
  <td colspan="2" width="65%"><button class="submitbtn" type="submit" name="bike1" style="margin-top: 5vh;margin-bottom: 5vh;">Submit</button></td>
  </tr>

</table>
</form>
</div>
</div>
<?php
    }
    elseif($rows == 0)
    {
    
   
      $sql1 = "SELECT emipay.payid,emipay.name,emipay.lname,emipay.contact,emipay.address,emipay.address2,emipay.city,emipay.state,emipay.pincode,emipay.payment,emipay.status,emipay.id,emipay.downpay,emipay.bankint,emipay.amount,emipay.months,emipay.loanamt,emipay.intamt,emipay.totamt,emipay.monpay,emipay.date,emipay.adminupdate,emipay.cusquery,sales.id,sales.image,sales.company,sales.model,sales.price from emipay inner join sales on emipay.id=sales.id where payid='$payid'";
  $result1=mysqli_query($con,$sql1);
  $rows1=mysqli_fetch_assoc($result1);
  {
      ?>
      <div class="container" id="table" style="width: 90%;">
    <center><h3 style="margin-top: 0px;"><u></u></h3></center>
<a href="bikeorders.php" style="color: green">Back..</a>

      <div class="table-responsive">
        <br>
        <form action="updates.php" method="post">
        <table class="table table-bordered">
  <tr align="center">

  <td colspan="2"><?php echo "<img src='../".$rows1['image']."' width='250' height='185' >"?></td>
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
  <td width="65%"><a style="color: green" href="../buybtn.php?id=<?php echo $rows1['id']; ?>">View Details</a></td>
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
  <td width="65%"><input type="hidden" name="payid" value="<?php echo $rows1['payid']; ?>"/><?php echo $rows1['payid']; ?> </td>
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
  <td width="65%"><select name="status" class="form-control" style="height:5vh;font-size:1vw;width: 10vw">
            <option value="Not Confirmed">Not Confirm</option>
            <option value="Confirmed">Confirm</option>
          </select>
        </td>
      </tr>
      <tr align="center">
  <th width="35%">Customer Queries</th>
  <td width="65%"><?php echo $rows1['cusquery']; ?> </td>
  </tr>          
         
  <tr align="center">
  <th width="35%">Update</th>
  <td width="65%"><textarea  name="adminupdate" rows="5" cols="30"><?php echo $rows1['adminupdate']; ?> </textarea>  </td>

  </tr>
  <tr align="center">
  <th width="35%">Bill</th>
  <td width="65%"><a target="_blank" href="../invoice/emibill.php?payid=<?php echo $rows1['payid']; ?>" style="color: green">View Bill</a></td>
  </tr>
  <tr align="center">
  
  <td colspan="2" width="65%"><button class="submitbtn" type="submit" name="emibike" style="margin-top: 5vh;margin-bottom: 5vh;">Submit</button></td>
  </tr>
</table>
</form>
</div>
</div>
  <?php
}
}

        }
        else
        {
        
        ?>
        <table class="table table-bordered" id="myTable">
          <tr>
            <th width="10%"><center>Date</center></th>
            <th width="6%"><center>Customer ID</center></th>
            <th width="6%"><center>Payment ID</center></th>
            <th width="10%"><center>Username</center></th>
            <th width="10%"><center>Action</center></th>
            
          </tr>
         
 <?php
  $sql="SELECT payid,username,cusid,date from fullpay1 where status='Not Confirmed' UNION SELECT payid,Username,cusid,date from emipay where status='Not Confirmed'";
  $res=mysqli_query($con,$sql);
  while($rows=mysqli_fetch_assoc($res))
  {
  ?>
  <tr align="center">
    <?php
    $date= $rows['date'];
   $myinput=$date; $sqldate=date('d-m-Y',strtotime($myinput));?>
     <td><?php echo $sqldate;?></td>
    <td><?php echo $rows['cusid'];?></td>
    <td><?php echo $rows['payid']; ?></td>
    <td><?php echo $rows['username']; ?></td>
    <td><a href="bikeorders.php?payid=<?php echo $rows['payid']; ?>" style="color: green">View</a></td>
  </tr>
  <?php
  }
  ?>  
        </table>
        <?php 
      }
      ?>
      </div>


</div>

<div id="penord" class="tabcontent">
 <div class="table-responsive" style="width: 90%;margin-top:0vh;margin-left:5%;position: relative; ">

  <?php
        if(isset($_GET['payid1']))
        {
          $payid=$_GET['payid1'];
          $sql = "SELECT sales.model,sales.company,sales.image,fullpay1.payment,fullpay1.status,fullpay1.address1,fullpay1.address2,fullpay1.city,fullpay1.state,fullpay1.pincode,fullpay1.contact,fullpay1.fname,fullpay1.lname, fullpay1.payid, fullpay1.date,fullpay1.id,fullpay1.amount,fullpay1.adminupdate,fullpay1.cusquery from sales inner join fullpay1 on sales.id=fullpay1.id where payid='$payid'";
  $result=mysqli_query($con,$sql);
  $rows=mysqli_fetch_assoc($result);
  if($rows > 0)
  {
      ?>

<div class="container" id="table" style="width: 80%;">
    <center><h3 style="margin-top: 0px;"><u></u></h3></center>
<a href="bikeorders.php?value1=1" style="color: green">Back..</a>
      <div class="table-responsive">
        <form action="updates.php" method="post">
        <table class="table table-bordered">
  <tr align="center">

  <td colspan="2"><?php echo "<img src='../".$rows['image']."' width='250' height='185' >"?></td>
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
  <td width="65%"><a style="color: green" href="../buybtn.php?id=<?php echo $rows['id']; ?>">View Details</a></td>

  </tr>
  <tr align="center">
  <th width="35%">Payment</th>
  <td width="65%"><?php echo $rows['payment']; ?> </td>
  </tr>
  <tr align="center">
  <th width="35%">Payment ID</th>
  <td width="65%"><input type="hidden" name="payid" value="<?php echo $rows['payid']; ?>"/> <?php echo $rows['payid']; ?> </td>
  </tr>
  <tr align="center">
  <th width="35%">Status</th>
  <td width="65%"><select name="status" class="form-control" style="height:5vh;font-size:1vw;width: 10vw">
            <option value="Confirmed">Confirm</option>
            <option value="Delivered">Delivered</option>
          </select>
        </td>
      </tr>
   <tr align="center">
  <th width="35%">Customer Queries</th>
  <td width="65%"><?php echo $rows['cusquery']; ?> </td>
  </tr>          
         
  <tr align="center">
  <th width="35%">Update</th>
  <td width="65%"><textarea name="adminupdate" rows="5" cols="30"><?php echo $rows['adminupdate']; ?> </textarea>  </td>

  </tr>
  <tr align="center">
  <th width="35%">Bill</th>
  <td width="65%"><a target="_blank" href="../invoice/bikebill.php?payid=<?php echo $rows['payid']; ?>" style="color: green">View Bill</a></td>
  </tr>
  <tr align="center">
  <br>
  <td colspan="2" width="65%"><button class="submitbtn" type="submit" name="bike1" style="margin-top: 5vh;margin-bottom: 5vh;">Submit</button></td>
  </tr>

</table>
</form>
</div>
</div>
<?php
    }
    elseif($rows == 0)
    {

      $sql1 = "SELECT emipay.payid,emipay.name,emipay.lname,emipay.contact,emipay.address,emipay.address2,emipay.city,emipay.state,emipay.pincode,emipay.payment,emipay.status,emipay.id,emipay.downpay,emipay.bankint,emipay.amount,emipay.months,emipay.loanamt,emipay.intamt,emipay.totamt,emipay.monpay,emipay.date,emipay.adminupdate,emipay.cusquery,sales.id,sales.image,sales.company,sales.model,sales.price from emipay inner join sales on emipay.id=sales.id where payid='$payid'";
  $result1=mysqli_query($con,$sql1);
  $rows1=mysqli_fetch_assoc($result1);
  {
      ?>
      <div class="container" id="table" style="width: 90%;">
    <center><h3 style="margin-top: 0px;"><u></u></h3></center>
<a href="bikeorders.php?value1=1" style="color: green">Back..</a>

      <div class="table-responsive">
        <br>
        <form action="updates.php" method="post">
        <table class="table table-bordered">
  <tr align="center">

  <td colspan="2"><?php echo "<img src='../".$rows1['image']."' width='250' height='185' >"?></td>
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
  <td width="65%"><a style="color: green" href="../buybtn.php?id=<?php echo $rows1['id']; ?>">View Details</a></td>
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
  <td width="65%"><input type="hidden" name="payid" value="<?php echo $rows1['payid']; ?>"/><?php echo $rows1['payid']; ?> </td>
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
  <td width="65%"><select name="status" class="form-control" style="height:5vh;font-size:1vw;width: 10vw">
            <option value="Confirmed">Not Confirm</option>
            <option value="Delivered">Delivered</option>
          </select>
        </td>
      </tr>
      <tr align="center">
  <th width="35%">Customer Queries</th>
  <td width="65%"><?php echo $rows1['cusquery']; ?> </td>
  </tr>          
         
  <tr align="center">
  <th width="35%">Update</th>
  <td width="65%"><textarea  name="adminupdate" rows="5" cols="30"><?php echo $rows1['adminupdate']; ?> </textarea>  </td>

  </tr>
  <tr align="center">
  <th width="35%">Bill</th>
  <td width="65%"><a target="_blank" href="../invoice/emibill.php?payid=<?php echo $rows1['payid']; ?>" style="color: green">View Bill</a></td>
  </tr>
  <tr align="center">
  
  <td colspan="2" width="65%"><button class="submitbtn" type="submit" name="emibike" style="margin-top: 5vh;margin-bottom: 5vh;">Submit</button></td>
  </tr>
</table>
</form>
</div>
</div>
  <?php
}
}

        }
        else
        {
        
  
    ?>
        <table class="table table-bordered" id="myTable">
          <tr>
            <th width="10%"><center>Date</center></th>
            <th width="6%"><center>Customer ID</center></th>
            <th width="6%"><center>Payment ID</center></th>
            <th width="10%"><center>Username</center></th>
            <th width="10%"><center>Action</center></th>
            
          </tr>
         
 <?php
  $sql="SELECT payid,username,cusid,date from fullpay1 where status='Confirmed' UNION SELECT payid,Username,cusid,date from emipay where status='Confirmed'";
  $res=mysqli_query($con,$sql);
  while($rows=mysqli_fetch_assoc($res))
  {
  ?>
  <tr align="center">
    <?php
    $date= $rows['date'];
   $myinput=$date; $sqldate=date('d-m-Y',strtotime($myinput));?>
     <td><?php echo $sqldate;?></td>
    <td><?php echo $rows['cusid'];?></td>
    <td><?php echo $rows['payid']; ?></td>
    <td><?php echo $rows['username']; ?></td>
    <td><a href="bikeorders.php?payid1=<?php echo $rows['payid']; ?>" style="color: green">View</a></td>
  </tr>
  <?php
  }
  ?>  
        </table>
        <?php
      }
      ?>
      </div>
</div>








<div id="delord" class="tabcontent">
 <div class="table-responsive" style="width: 90%;margin-top:0vh;margin-left:5%;position: relative; ">
  <?php
        if(isset($_GET['payid2']))
        {
          $payid=$_GET['payid2'];
          $sql = "SELECT sales.model,sales.company,sales.image,fullpay1.payment,fullpay1.status,fullpay1.address1,fullpay1.address2,fullpay1.city,fullpay1.state,fullpay1.pincode,fullpay1.contact,fullpay1.fname,fullpay1.lname, fullpay1.payid, fullpay1.date,fullpay1.id,fullpay1.amount,fullpay1.adminupdate,fullpay1.cusquery from sales inner join fullpay1 on sales.id=fullpay1.id where payid='$payid'";
  $result=mysqli_query($con,$sql);
  $rows=mysqli_fetch_assoc($result);
  if($rows > 0)
  {
      ?>
<div class="container" id="table" style="width: 80%;">
    <center><h3 style="margin-top: 0px;"><u></u></h3></center>
<a href="bikeorders.php?value1=2" style="color: green">Back..</a>
      <div class="table-responsive">
        <form action="updates.php" method="post">
        <table class="table table-bordered">
  <tr align="center">

  <td colspan="2"><?php echo "<img src='../".$rows['image']."' width='250' height='185' >"?></td>
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
  <td width="65%"><a style="color: green" href="../buybtn.php?id=<?php echo $rows['id']; ?>">View Details</a></td>

  </tr>
  <tr align="center">
  <th width="35%">Payment</th>
  <td width="65%"><?php echo $rows['payment']; ?> </td>
  </tr>
  <tr align="center">
  <th width="35%">Payment ID</th>
  <td width="65%"><input type="hidden" name="payid" value="<?php echo $rows['payid']; ?>"/> <?php echo $rows['payid']; ?> </td>
  </tr>
  <tr align="center">
  <th width="35%">Status</th>
  <td width="65%"><?php echo $rows['status']; ?>
        </td>
      </tr>
   <tr align="center">
  <th width="35%">Customer Queries</th>
  <td width="65%"><?php echo $rows['cusquery']; ?> </td>
  </tr>          
         
  <tr align="center">
  <th width="35%">Update</th>
  <td width="65%"><textarea name="adminupdate" rows="5" cols="30"><?php echo $rows['adminupdate']; ?> </textarea>  </td>

  </tr>
  <tr align="center">
  <th width="35%">Bill</th>
  <td width="65%"><a target="_blank" href="../invoice/bikebill.php?payid=<?php echo $rows['payid']; ?>" style="color: green">View Bill</a></td>
  </tr>
  <tr align="center">
  <br>
  <td colspan="2" width="65%"><button class="submitbtn" type="submit" name="bikedel" style="margin-top: 5vh;margin-bottom: 5vh;">Submit</button></td>
  </tr>

</table>
</form>
</div>
</div>
<?php
    }
    elseif($rows == 0)
    {

      $sql1 = "SELECT emipay.payid,emipay.name,emipay.lname,emipay.contact,emipay.address,emipay.address2,emipay.city,emipay.state,emipay.pincode,emipay.payment,emipay.status,emipay.id,emipay.downpay,emipay.bankint,emipay.amount,emipay.months,emipay.loanamt,emipay.intamt,emipay.totamt,emipay.monpay,emipay.date,emipay.adminupdate,emipay.cusquery,sales.id,sales.image,sales.company,sales.model,sales.price from emipay inner join sales on emipay.id=sales.id where payid='$payid'";
  $result1=mysqli_query($con,$sql1);
  $rows1=mysqli_fetch_assoc($result1);
  {
      ?>
      <div class="container" id="table" style="width: 90%;">
    <center><h3 style="margin-top: 0px;"><u></u></h3></center>
<a href="bikeorders.php?value1=2" style="color: green">Back..</a>

      <div class="table-responsive">
        <br>
        <form action="updates.php" method="post">
        <table class="table table-bordered">
  <tr align="center">

  <td colspan="2"><?php echo "<img src='../".$rows1['image']."' width='250' height='185' >"?></td>
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
  <td width="65%"><a style="color: green" href="../buybtn.php?id=<?php echo $rows1['id']; ?>">View Details</a></td>
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
  <td width="65%"><input type="hidden" name="payid" value="<?php echo $rows1['payid']; ?>"/><?php echo $rows1['payid']; ?> </td>
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
  <td width="65%"><?php echo $rows['status']; ?>
        </td>
      </tr>
      <tr align="center">
  <th width="35%">Customer Queries</th>
  <td width="65%"><?php echo $rows1['cusquery']; ?> </td>
  </tr>          
         
  <tr align="center">
  <th width="35%">Update</th>
  <td width="65%"><textarea  name="adminupdate" rows="5" cols="30"><?php echo $rows1['adminupdate']; ?> </textarea>  </td>

  </tr>
  <tr align="center">
  <th width="35%">Bill</th>
  <td width="65%"><a target="_blank" href="../invoice/emibill.php?payid=<?php echo $rows1['payid']; ?>" style="color: green">View Bill</a></td>
  </tr>
  <tr align="center">
  
  <td colspan="2" width="65%"><button class="submitbtn" type="submit" name="emibikedel" style="margin-top: 5vh;margin-bottom: 5vh;">Submit</button></td>
  </tr>
</table>
</form>
</div>
</div>
  <?php
}
}

        }
        else
        {
        
  
    ?>
        <table class="table table-bordered" id="myTable">
          <tr>
            <th width="10%"><center>Date</center></th>
            <th width="6%"><center>Customer ID</center></th>
            <th width="6%"><center>Payment ID</center></th>
            <th width="10%"><center>Username</center></th>
            <th width="10%"><center>Action</center></th>
            
          </tr>
         
 <?php
  $sql="SELECT payid,username,cusid,date from fullpay1 where status='Delivered' UNION SELECT payid,Username,cusid,date from emipay where status='Delivered'";
  $res=mysqli_query($con,$sql);
  while($rows=mysqli_fetch_assoc($res))
  {
  ?>
  <tr align="center">
    <?php
    $date= $rows['date'];
   $myinput=$date; $sqldate=date('d-m-Y',strtotime($myinput));?>
     <td><?php echo $sqldate;?></td>
    <td><?php echo $rows['cusid'];?></td>
    <td><?php echo $rows['payid']; ?></td>
    <td><?php echo $rows['username']; ?></td>
    <td><a href="bikeorders.php?payid2=<?php echo $rows['payid']; ?>" style="color: green">View</a></td>
  </tr>
  <?php
  }
  ?>  
        </table>
        <?php
      }
      ?>
      </div>
</div>

<script>
function openOrd(evt, openOrd) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(openOrd).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
   </div>
 </div>
</body>