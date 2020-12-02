<?php
 if(isset($_GET['value3']))
 {
  $value=$_GET['value3'];
 }
 ?>
  <input type="hidden" name="" id="penorders" value="<?php echo $_GET['payidacc2'] ?>">
 <input type="hidden" name="" id="penback" value="<?php echo $value; ?>">
 <input type="hidden" name="" id="delorders" value="<?php echo $_GET['payidacc3'] ?>">
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
  <button class="tablinks" id="new" onclick="openOrd(event, 'neword')">New (<?php $count="SELECT payid from paydet where status='Not Confirmed'"; $results=mysqli_query($con,$count); $rows=mysqli_num_rows($results); echo $rows; ?>)</button>
  <button class="tablinks" id="pen" onclick="openOrd(event, 'penord')">Pending (<?php $count="SELECT payid from paydet where status='Confirmed'"; $results=mysqli_query($con,$count); $rows=mysqli_num_rows($results); echo $rows; ?>)</button>
  <button class="tablinks" id="del" onclick="openOrd(event, 'delord')">Delivered (<?php $count="SELECT payid from paydet where status='Delivered'"; $results=mysqli_query($con,$count); $rows=mysqli_num_rows($results); echo $rows; ?>)</button>
</div>
<br>
<div id="neword" class="tabcontent">
 
  <div class="table-responsive" style="width: 90%;margin-top:0vh;margin-left:5%;position: relative; ">
    <?php
     if(isset($_GET['payidacc1']))
        {
          $payid=$_GET['payidacc1'];
          $sql = "SELECT paydet.payid,paydet.fname,paydet.lname,paydet.contact,paydet.address1,paydet.address2,paydet.city,paydet.state,paydet.pincode,paydet.total,paydet.payment,paydet.status,accesspay.payid,accesspay.brand,accesspay.name,paydet.adminupdate,paydet.cusquery
FROM paydet ,accesspay WHERE paydet.payid='$payid' AND accesspay.payid='$payid'";
  $result=mysqli_query($con,$sql);
  $rows=mysqli_fetch_assoc($result);
      ?>
      <center><h3 style="margin-top: 0px;"><u></u></h3></center><br>
        <a href="accessorders.php" style="color: green">Back..</a>
        <form action="updates.php" method="post">
       <div class="table-responsive">
         

        <table class="table table-bordered">
 <br>
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
  <th>Products</th>
  <td>
      <div class="container" id="table" style="width: 100%;position: relative;">
      <div class="table-responsive">
        <table class="table table-bordered" style="overflow: scroll;">

          <tr align="center">
  <th>Brand</th>
  <th>Product</th>
  <th>Quantity</th>
  <th>Price</th>
  </tr>
  <?php

$sql1="SELECT paydet.payid,paydet.fname,paydet.lname,paydet.contact,paydet.address1,paydet.address2,paydet.city,paydet.state,paydet.pincode,accesspay.payid,accesspay.qty,accesspay.price,accesspay.brand,accesspay.name
FROM paydet ,accesspay WHERE paydet.payid='$payid' AND accesspay.payid='$payid'"; 
$results1=mysqli_query($con,$sql1);
  while($rows1=mysqli_fetch_assoc($results1))
  {
   ?>
<tr align="center">
  <td><?php echo $rows1['brand']; ?></td>
  <td><?php echo $rows1['name']; ?></td>
  <td><?php echo $rows1['qty']; ?></td>
  <td><?php echo $rows1['price']; ?></td>
  </tr>

<?php
  
  }
  ?>
        </table>
    </div>
</div>

  </td>
</tr>

 <tr align="center">
  <th width="35%">Total Bill</th>
  <td width="65%">₹ <?php echo $rows['total']; ?> </td>
  </tr>
  <tr align="center">
  <th width="35%">Payment</th>
  <td width="65%"><?php echo $rows['payment']; ?> </td>
  </tr>
  <tr align="center">
  <th width="35%">Payment ID</th>
  <td width="65%"><?php echo $rows['payid']; ?><input type="hidden" name="payid" value="<?php echo $rows['payid']; ?>"> </td>
  </tr>
  <tr align="center">
  <th width="35%">Status</th>
  <td width="65%"><select name="status" class="form-control" style="height:5vh;font-size:1vw;width: 10vw">
            <option value="Not Confirmed">Not Confirm</option>
            <option value="Confirmed">Confirm</option>
          </select></td>
  </tr>
   <tr align="center">
  <th width="35%">Customer Queries</th>
  <td width="65%"><?php echo $rows['cusquery']; ?> </td>
  </tr>         
   <tr align="center">
  <th width="35%">Admin Remarks</th>
  <td width="65%"><textarea  name="adminupdate" rows="5" cols="30"><?php echo $rows['adminupdate']; ?> </textarea></td>
  </tr>
  <tr align="center">
  <th width="35%">Bill</th>
  <td width="65%"><a style="color: green;" href="../invoice/accessbill.php?payid=<?php echo $rows['payid']; ?>" class="bill">View Bill</a></td>
  </tr>
  <tr align="center">
  
  <td colspan="2" width="65%"><button class="submitbtn" type="submit" name="access" style="margin-top: 5vh;margin-bottom: 5vh;">Submit</button></td>
  </tr>
  </table>
    
  
</div>
</form>
<?php
}
else
{
  ?>

        <table class="table table-bordered" id="myTable">
          <tr>
            <th width="10%"><center>Date</center></th>
            <th width="6%"><center>Customer ID</center></th>
            <th width="6%"><center>Payment ID</center></th>
            
            <th width="10%"><center>Action</center></th>
            
          </tr>
         
 <?php
  $sql="SELECT payid,cusid,date from paydet where status='Not Confirmed'";
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
    
    <td><a href="accessorders.php?payidacc1=<?php echo $rows['payid']; ?>" style="color: green">View</a></td>
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
     if(isset($_GET['payidacc2']))
        {
          $payid=$_GET['payidacc2'];
          $sql = "SELECT paydet.payid,paydet.fname,paydet.lname,paydet.contact,paydet.address1,paydet.address2,paydet.city,paydet.state,paydet.pincode,paydet.total,paydet.payment,paydet.status,accesspay.payid,accesspay.brand,accesspay.name,paydet.adminupdate,paydet.cusquery
FROM paydet ,accesspay WHERE paydet.payid='$payid' AND accesspay.payid='$payid'";
  $result=mysqli_query($con,$sql);
  $rows=mysqli_fetch_assoc($result);
      ?>
      <center><h3 style="margin-top: 0px;"><u></u></h3></center><br>
        <a href="accessorders.php?value3=1" style="color: green">Back..</a>
        <form action="updates.php" method="post">
       <div class="table-responsive">
         

        <table class="table table-bordered">
 <br>
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
  <th>Products</th>
  <td>
      <div class="container" id="table" style="width: 100%;position: relative;">
      <div class="table-responsive">
        <table class="table table-bordered" style="overflow: scroll;">

          <tr align="center">
  <th>Brand</th>
  <th>Product</th>
  <th>Quantity</th>
  <th>Price</th>
  </tr>
  <?php

$sql1="SELECT paydet.payid,paydet.fname,paydet.lname,paydet.contact,paydet.address1,paydet.address2,paydet.city,paydet.state,paydet.pincode,accesspay.payid,accesspay.qty,accesspay.price,accesspay.brand,accesspay.name
FROM paydet ,accesspay WHERE paydet.payid='$payid' AND accesspay.payid='$payid'"; 
$results1=mysqli_query($con,$sql1);
  while($rows1=mysqli_fetch_assoc($results1))
  {
   ?>
<tr align="center">
  <td><?php echo $rows1['brand']; ?></td>
  <td><?php echo $rows1['name']; ?></td>
  <td><?php echo $rows1['qty']; ?></td>
  <td><?php echo $rows1['price']; ?></td>
  </tr>

<?php
  
  }
  ?>
        </table>
    </div>
</div>

  </td>
</tr>

 <tr align="center">
  <th width="35%">Total Bill</th>
  <td width="65%">₹ <?php echo $rows['total']; ?> </td>
  </tr>
  <tr align="center">
  <th width="35%">Payment</th>
  <td width="65%"><?php echo $rows['payment']; ?> </td>
  </tr>
  <tr align="center">
  <th width="35%">Payment ID</th>
  <td width="65%"><?php echo $rows['payid']; ?><input type="hidden" name="payid" value="<?php echo $rows['payid']; ?>"> </td>
  </tr>
  <tr align="center">
  <th width="35%">Status</th>
  <td width="65%"><select name="status" class="form-control" style="height:5vh;font-size:1vw;width: 10vw">
            <option value="Confirmed">Confirm</option>
            <option value="Delivered">Delivered</option>
          </select></td>
  </tr>
   <tr align="center">
  <th width="35%">Customer Queries</th>
  <td width="65%"><?php echo $rows['cusquery']; ?> </td>
  </tr>         
   <tr align="center">
  <th width="35%">Admin Remarks</th>
  <td width="65%"><textarea  name="adminupdate" rows="5" cols="30"><?php echo $rows['adminupdate']; ?> </textarea></td>
  </tr>
  <tr align="center">
  <th width="35%">Bill</th>
  <td width="65%"><a style="color: green;" href="../invoice/accessbill.php?payid=<?php echo $rows['payid']; ?>" class="bill">View Bill</a></td>
  </tr>
  <tr align="center">
  
  <td colspan="2" width="65%"><button class="submitbtn" type="submit" name="access" style="margin-top: 5vh;margin-bottom: 5vh;">Submit</button></td>
  </tr>
  </table>
    
  
</div>
</form>
<?php
}
else
{
  ?>
        <table class="table table-bordered" id="myTable">
          <tr>
            <th width="10%"><center>Date</center></th>
            <th width="6%"><center>Customer ID</center></th>
            <th width="6%"><center>Payment ID</center></th>
            
            <th width="10%"><center>Action</center></th>
            
          </tr>
         
 <?php
  $sql="SELECT payid,cusid,date from paydet where status='Confirmed' ";
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
    
    <td><a href="accessorders.php?payidacc2=<?php echo $rows['payid']; ?>" style="color: green">View</a></td>
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
     if(isset($_GET['payidacc3']))
        {
          $payid=$_GET['payidacc3'];
          $sql = "SELECT paydet.payid,paydet.fname,paydet.lname,paydet.contact,paydet.address1,paydet.address2,paydet.city,paydet.state,paydet.pincode,paydet.total,paydet.payment,paydet.status,accesspay.payid,accesspay.brand,accesspay.name,paydet.adminupdate,paydet.cusquery
FROM paydet ,accesspay WHERE paydet.payid='$payid' AND accesspay.payid='$payid'";
  $result=mysqli_query($con,$sql);
  $rows=mysqli_fetch_assoc($result);
      ?>
      <center><h3 style="margin-top: 0px;"><u></u></h3></center><br>
        <a href="accessorders.php?value3=2" style="color: green">Back..</a>
        <form action="updates.php" method="post">
       <div class="table-responsive">
         

        <table class="table table-bordered">
 <br>
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
  <th>Products</th>
  <td>
      <div class="container" id="table" style="width: 100%;position: relative;">
      <div class="table-responsive">
        <table class="table table-bordered" style="overflow: scroll;">

          <tr align="center">
  <th>Brand</th>
  <th>Product</th>
  <th>Quantity</th>
  <th>Price</th>
  </tr>
  <?php

$sql1="SELECT paydet.payid,paydet.fname,paydet.lname,paydet.contact,paydet.address1,paydet.address2,paydet.city,paydet.state,paydet.pincode,accesspay.payid,accesspay.qty,accesspay.price,accesspay.brand,accesspay.name
FROM paydet ,accesspay WHERE paydet.payid='$payid' AND accesspay.payid='$payid'"; 
$results1=mysqli_query($con,$sql1);
  while($rows1=mysqli_fetch_assoc($results1))
  {
   ?>
<tr align="center">
  <td><?php echo $rows1['brand']; ?></td>
  <td><?php echo $rows1['name']; ?></td>
  <td><?php echo $rows1['qty']; ?></td>
  <td><?php echo $rows1['price']; ?></td>
  </tr>

<?php
  
  }
  ?>
        </table>
    </div>
</div>

  </td>
</tr>

 <tr align="center">
  <th width="35%">Total Bill</th>
  <td width="65%">₹ <?php echo $rows['total']; ?> </td>
  </tr>
  <tr align="center">
  <th width="35%">Payment</th>
  <td width="65%"><?php echo $rows['payment']; ?> </td>
  </tr>
  <tr align="center">
  <th width="35%">Payment ID</th>
  <td width="65%"><?php echo $rows['payid']; ?><input type="hidden" name="payid" value="<?php echo $rows['payid']; ?>"> </td>
  </tr>
  <tr align="center">
  <th width="35%">Status</th>
  <td width="65%"><?php echo $rows['status']; ?></td>
  </tr>
   <tr align="center">
  <th width="35%">Customer Queries</th>
  <td width="65%"><?php echo $rows['cusquery']; ?> </td>
  </tr>         
   <tr align="center">
  <th width="35%">Admin Remarks</th>
  <td width="65%"><textarea  name="adminupdate" rows="5" cols="30"><?php echo $rows['adminupdate']; ?> </textarea></td>
  </tr>
  <tr align="center">
  <th width="35%">Bill</th>
  <td width="65%"><a style="color: green;" href="../invoice/accessbill.php?payid=<?php echo $rows['payid']; ?>" class="bill">View Bill</a></td>
  </tr>
  <tr align="center">
  
  <td colspan="2" width="65%"><button class="submitbtn" type="submit" name="accessdel" style="margin-top: 5vh;margin-bottom: 5vh;">Submit</button></td>
  </tr>
  </table>
    
  
</div>
</form>
<?php
}
else
{
  ?>
        <table class="table table-bordered" id="myTable">
          <tr>
            <th width="10%"><center>Date</center></th>
            <th width="6%"><center>Customer ID</center></th>
            <th width="6%"><center>Payment ID</center></th>
            
            <th width="10%"><center>Action</center></th>
            
          </tr>
         
 <?php
  $sql="SELECT payid,cusid,date from paydet where status='Delivered'";
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
    
    <td><a href="accessorders.php?payidacc3=<?php echo $rows['payid']; ?>" style="color: green">View</a></td>
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