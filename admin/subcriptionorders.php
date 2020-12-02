<?php
 if(isset($_GET['value2']))
 {
  $value=$_GET['value2'];
 }
 ?>
  <input type="hidden" name="" id="penorders" value="<?php echo $_GET['payidsub1'] ?>">
 <input type="hidden" name="" id="penback" value="<?php echo $value; ?>">
 <input type="hidden" name="" id="delorders" value="<?php echo $_GET['payidsub2'] ?>">
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
  <button class="tablinks" id="new" onclick="openOrd(event, 'neword')">New (<?php $count="SELECT payid from subbook where status='Not Confirmed'"; $results=mysqli_query($con,$count); $rows=mysqli_num_rows($results); echo $rows; ?>)</button>
  <button class="tablinks" id="pen" onclick="openOrd(event, 'penord')">Pending (<?php $count="SELECT payid from subbook where status='Confirmed'"; $results=mysqli_query($con,$count); $rows=mysqli_num_rows($results); echo $rows; ?>)</button>
  <button class="tablinks" id="del" onclick="openOrd(event, 'delord')">Delivered (<?php $count="SELECT payid from subbook where status='Delivered'"; $results=mysqli_query($con,$count); $rows=mysqli_num_rows($results); echo $rows; ?>)</button>
</div>
<br>
<div id="neword" class="tabcontent">
 
  <div class="table-responsive" style="width: 90%;margin-top:0vh;margin-left:5%;position: relative; ">
    <?php
     if(isset($_GET['payidsub']))
        {
          $payid=$_GET['payidsub'];
          $sql = "SELECT subbook.id,subbook.fname,subbook.lname,subbook.contact,subbook.deldate,subbook.address1,subbook.address2,subbook.city,subbook.state,subbook.pincode,subbook.payment,subbook.status,subbook.payid,subbook.plan,subbook.amount,subbook.adminupdate,subbook.cusquery,subscribe.id,subscribe.model,subscribe.company,subscribe.bikeprice,subscribe.image,subscribe.enginecc from subbook inner join subscribe on subbook.id=subscribe.id where payid='$payid'";
  $result=mysqli_query($con,$sql);
  $rows=mysqli_fetch_assoc($result);
      ?>
<div class="container" id="table" style="width: 80%;">
    <center><h3 style="margin-top: 0px;"><u></u></h3></center><br>
    <a href="subcriptionorders.php" style="color: green">Back..</a>


      <div class="table-responsive">
        <br>
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
  <td width="65%"><?php echo $rows['payid']; ?><input type="hidden" name="payid" value="<?php echo $rows['payid']; ?>"/> </td>
  </tr>
  <tr align="center">
  <th width="35%">Status</th>
  <td width="65%"><select name="status" class="form-control" style="height:5vh;font-size:1vw;width: 10vw">
            <option value="Not Confirmed">Not Confirm</option>
            <option value="Confirmed">Confirm</option>
          </select></td>
          <tr align="center">
  <th width="35%">Customer Queries</th>
  <td width="65%"><?php echo $rows['cusquery']; ?> </td>
  </tr>         
  </tr>
  <tr align="center">
  <th width="35%">Admin Remarks</th>
  <td width="65%"><textarea  name="adminupdate" rows="5" cols="30"><?php echo $rows['adminupdate']; ?> </textarea>  </td>
  </tr>
  <tr align="center">
  <th width="35%">Bill</th>
  <td width="65%"><a style="color: green;" href="../invoice/subbill.php?payid=<?php echo $rows['payid'];?>" class="bill">View Bill</a></td>
  </tr>
  <tr align="center">
  
  <td colspan="2" width="65%"><button class="submitbtn" type="submit" name="subscribe" style="margin-top: 5vh;margin-bottom: 5vh;">Submit</button></td>
  </tr>
</table>
</form>
</div>
</div>
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
  $sql="SELECT payid,cusid,date from subbook where status='Not Confirmed'";
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
    
    <td><a href="subcriptionorders.php?payidsub=<?php echo $rows['payid']; ?>" style="color: green">View</a></td>
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
     if(isset($_GET['payidsub1']))
        {
          $payid=$_GET['payidsub1'];
          $sql = "SELECT subbook.id,subbook.fname,subbook.lname,subbook.contact,subbook.deldate,subbook.address1,subbook.address2,subbook.city,subbook.state,subbook.pincode,subbook.payment,subbook.status,subbook.payid,subbook.plan,subbook.amount,subbook.adminupdate,subbook.cusquery,subscribe.id,subscribe.model,subscribe.company,subscribe.bikeprice,subscribe.image,subscribe.enginecc from subbook inner join subscribe on subbook.id=subscribe.id where payid='$payid'";
  $result=mysqli_query($con,$sql);
  $rows=mysqli_fetch_assoc($result);
      ?>
<div class="container" id="table" style="width: 80%;">
    <center><h3 style="margin-top: 0px;"><u></u></h3></center>
    <a href="subcriptionorders.php?value2=1" style="color: green">Back..</a>

      <div class="table-responsive">
        <br>
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
  <td width="65%"><?php echo $rows['payid']; ?><input type="hidden" name="payid" value="<?php echo $rows['payid']; ?>"/> </td>
  </tr>
  <tr align="center">
  <th width="35%">Status</th>
  <td width="65%"><select name="status" class="form-control" style="height:5vh;font-size:1vw;width: 10vw">
            <option value="Confirmed">Not Confirm</option>
            <option value="Delivered">Delivered</option>
          </select></td>
          <tr align="center">
  <th width="35%">Customer Queries</th>
  <td width="65%"><?php echo $rows['cusquery']; ?> </td>
  </tr>         
  </tr>
  <tr align="center">
  <th width="35%">Admin Remarks</th>
  <td width="65%"><textarea  name="adminupdate" rows="5" cols="30"><?php echo $rows['adminupdate']; ?> </textarea>  </td>
  </tr>
  <tr align="center">
  <th width="35%">Bill</th>
  <td width="65%"><a style="color: green;" href="../invoice/subbill.php?payid=<?php echo $rows['payid'];?>"  class="bill">View Bill</a></td>
  </tr>
  <tr align="center">
  
  <td colspan="2" width="65%"><button class="submitbtn" type="submit" name="subscribe" style="margin-top: 5vh;margin-bottom: 5vh;">Submit</button></td>
  </tr>
</table>
</form>
</div>
</div>
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
  $sql="SELECT payid,cusid,date from subbook where status='Confirmed' ";
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
    
    <td><a href="subcriptionorders.php?payidsub1=<?php echo $rows['payid']; ?>" style="color: green">View</a></td>
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
     if(isset($_GET['payidsub2']))
        {
          $payid=$_GET['payidsub2'];
          $sql = "SELECT subbook.id,subbook.fname,subbook.lname,subbook.contact,subbook.deldate,subbook.address1,subbook.address2,subbook.city,subbook.state,subbook.pincode,subbook.payment,subbook.status,subbook.payid,subbook.plan,subbook.amount,subbook.adminupdate,subbook.cusquery,subscribe.id,subscribe.model,subscribe.company,subscribe.bikeprice,subscribe.image,subscribe.enginecc from subbook inner join subscribe on subbook.id=subscribe.id where payid='$payid'";
  $result=mysqli_query($con,$sql);
  $rows=mysqli_fetch_assoc($result);
      ?>
<div class="container" id="table" style="width: 80%;">
    <center><h3 style="margin-top: 0px;"><u></u></h3></center>
    <a href="subcriptionorders.php?value2=2" style="color: green">Back..</a>
      <div class="table-responsive">
        <br>
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
  <td width="65%"><?php echo $rows['payid']; ?><input type="hidden" name="payid" value="<?php echo $rows['payid']; ?>"/> </td>
  </tr>
  <tr align="center">
  <th width="35%">Status</th>
  <td width="65%"><?php echo $rows['status']; ?></td>
          <tr align="center">
  <th width="35%">Customer Queries</th>
  <td width="65%"><?php echo $rows['cusquery']; ?> </td>
  </tr>         
  </tr>
  <tr align="center">
  <th width="35%">Admin Remarks</th>
  <td width="65%"><textarea  name="adminupdate" rows="5" cols="30"><?php echo $rows['adminupdate']; ?> </textarea>  </td>
  </tr>
  <tr align="center">
  <th width="35%">Bill</th>
  <td width="65%"><a style="color: green;" href="../invoice/subbill.php?payid=<?php echo $rows['payid'];?>"  class="bill">View Bill</a></td>
  </tr>
  <tr align="center">
  
  <td colspan="2" width="65%"><button class="submitbtn" type="submit" name="subscribedel" style="margin-top: 5vh;margin-bottom: 5vh;">Submit</button></td>
  </tr>
</table>
</form>
</div>
</div>
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
  $sql="SELECT payid,cusid,date from subbook where status='Delivered'";
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
    
    <td><a href="subcriptionorders.php?payidsub2=<?php echo $rows['payid']; ?>" style="color: green">View</a></td>
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