
<?php
 if(isset($_GET['value']))
 {
  $value=$_GET['value'];
 }
 ?>
 <input type="hidden" name="" id="penorders" value="<?php echo $_GET['sid1']; ?>">
 <input type="hidden" name="" id="penback" value="<?php echo $value; ?>">
 <input type="hidden" name="" id="delorders" value="<?php echo $_GET['sid2']; ?>">

 
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
          document.getElementById('done').click();
        }
        if(back == '2')
        {
          document.getElementById('done').click();
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
  <button class="tablinks" id="new" onclick="openOrd(event, 'neword')">New (<?php $count="SELECT sid from service where status='Not Confirmed'"; $results=mysqli_query($con,$count); $rows=mysqli_num_rows($results); echo $rows; ?>)</button>
  <button class="tablinks" id="pen" onclick="openOrd(event, 'penord')">Pending (<?php $count="SELECT sid from service where status='Confirmed'"; $results=mysqli_query($con,$count); $rows=mysqli_num_rows($results); echo $rows; ?>)</button>
  <button class="tablinks" id="done" onclick="openOrd(event, 'delord')">Service Done (<?php $count="SELECT sid from service where status='Service Done'"; $results=mysqli_query($con,$count); $rows=mysqli_num_rows($results); echo $rows; ?>)</button>
</div>
<br>

<div id="neword" class="tabcontent">
 
  <div class="table-responsive" style="width: 90%;margin-top:0vh;margin-left:5%;position: relative; ">
  	
  	 <?php
        if(isset($_GET['sid']))
        {
          $sid=$_GET['sid'];
          $sql = "SELECT * from service where sid='$sid'";
  $result=mysqli_query($con,$sql);
  $rows=mysqli_fetch_assoc($result);
      ?>
<div class="container" id="table" style="width: 80%;">
    <center><h3 style="margin-top: 0px;"><u></u></h3></center>
<a href="servicereqs.php" style="color: green">Back..</a>
      <div class="table-responsive">
        <form action="updates.php" method="post">
 		<table class="table table-bordered">
 			<tr align="center">
  <th width="35%">Service ID</th>
  <td width="65%"><input type="hidden" name="sid" value="<?php echo $rows['sid']; ?>"/> <?php echo $rows['sid']; ?> </td>
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
  <tr align="center">
  <th width="35%">Make</th>
  <td width="65%"><?php echo $rows['make']; ?> </td>
  </tr>

<tr align="center">
  <th width="35%" align="center">Model</th>
  <td width="65%">
  <?php echo $rows['model']; ?> </td>
  </tr>
<tr align="center">
  <th width="35%" align="center">Service Date</th>
  <td width="65%">
  <?php echo $rows['serdate']; ?> </td>
  </tr>
  <tr align="center">
  <th width="35%" align="center">Services</th>
  <td width="65%">
  <?php echo $rows['services']; ?> </td>
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
  <!--<tr align="center">
  <th width="35%">Bill</th>
  <td width="65%"><a style="color: green;" href="#" class="bill">View Bill</a></td>
  </tr>-->
  <tr align="center">
  <br>
  <td colspan="2" width="65%"><button class="submitbtn" type="submit" name="servicenew" style="margin-top: 5vh;margin-bottom: 5vh;">Submit</button></td>
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
            <th width="6%"><center>Order ID</center></th>
            
            <th width="10%"><center>Action</center></th>
            
          </tr>

         
 <?php
  $sql="SELECT sid,cusid,date from service where status='Not Confirmed'";
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
    <td><?php echo $rows['sid']; ?></td>
    
    <td><a href="servicereqs.php?sid=<?php echo $rows['sid']; ?>" style="color: green">View</a></td>
  </tr>
  <?php
  }
}
  ?>  
        </table>
      </div>


</div>











<div id="penord" class="tabcontent">
 <div class="table-responsive" style="width: 90%;margin-top:0vh;margin-left:5%;position: relative; ">
 	
 	<?php
        if(isset($_GET['sid1']))
        {
          
          $sid1=$_GET['sid1'];
          $sql = "SELECT * from service where sid='$sid1'";
  $result=mysqli_query($con,$sql);
  $rows=mysqli_fetch_assoc($result);
      ?>
     
     
<div class="container" id="table" style="width: 80%;">
    <center><h3 style="margin-top: 0px;"><u></u></h3></center>
<a href="servicereqs.php?value=1" style="color: green">Back..</a>
      <div class="table-responsive">
        <form action="updates.php" method="post">
 		<table class="table table-bordered">
 			<tr align="center">
  <th width="35%">Service ID</th>
  <td width="65%"><input type="hidden" name="sid" value="<?php echo $rows['sid']; ?>"/> <?php echo $rows['sid']; ?> </td>
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
  <tr align="center">
  <th width="35%">Make</th>
  <td width="65%"><?php echo $rows['make']; ?> </td>
  </tr>

<tr align="center">
  <th width="35%" align="center">Model</th>
  <td width="65%">
  <?php echo $rows['model']; ?> </td>
  </tr>
<tr align="center">
  <th width="35%" align="center">Service Date</th>
  <td width="65%">
  <?php echo $rows['serdate']; ?> </td>
  </tr>
  <tr align="center">
  <th width="35%" align="center">Services</th>
  <td width="65%">
  <?php echo $rows['services']; ?> </td>
  </tr>
  <tr align="center">
  <th width="35%" align="center">Create Invoice</th>
  <td width="65%"><a href="invoicecreate.php?sid=<?php echo $rows['sid']; ?>" style="color: green">Create</a></td>
  </tr>
  <tr align="center">
  <th width="35%">Status</th>
  <td width="65%"><select name="status" class="form-control" style="height:5vh;font-size:1vw;width: 10vw">
            <option value="Confirmed">Confirm</option>
            <option value="Service Done">Service Done</option>
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
  <!--<tr align="center">
  <th width="35%">Bill</th>
  <td width="65%"><a style="color: green;" href="#" class="bill">View Bill</a></td>
  </tr>-->
  <tr align="center">
  <br>
  <td colspan="2" width="65%"><button class="submitbtn" type="submit" name="servicenew" style="margin-top: 5vh;margin-bottom: 5vh;">Submit</button></td>
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
            <th width="6%"><center>Service ID</center></th>
            
            <th width="10%"><center>Action</center></th>
            
          </tr>
         
 <?php
  $sql="SELECT sid,cusid,date from service where status='Confirmed' ";
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
    <td><?php echo $rows['sid']; ?></td>
    
    <td><a href="servicereqs.php?sid1=<?php echo $rows['sid']; ?>" style="color: green">View</a></td>
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
        if(isset($_GET['sid2']))
        {
          
          $sid2=$_GET['sid2'];
          $sql = "SELECT * from service where sid='$sid2'";
  $result=mysqli_query($con,$sql);
  $rows=mysqli_fetch_assoc($result);
      ?>
     
     
<div class="container" id="table" style="width: 80%;">
    <center><h3 style="margin-top: 0px;"><u></u></h3></center>
<a href="servicereqs.php?value=2" style="color: green">Back..</a>
      <div class="table-responsive">
        <form action="updates.php" method="post">
    <table class="table table-bordered">
      <tr align="center">
  <th width="35%">Service ID</th>
  <td width="65%"><input type="hidden" name="sid" value="<?php echo $rows['sid']; ?>"/> <?php echo $rows['sid']; ?> </td>
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
  <tr align="center">
  <th width="35%">Make</th>
  <td width="65%"><?php echo $rows['make']; ?> </td>
  </tr>

<tr align="center">
  <th width="35%" align="center">Model</th>
  <td width="65%">
  <?php echo $rows['model']; ?> </td>
  </tr>
<tr align="center">
  <th width="35%" align="center">Service Date</th>
  <td width="65%">
  <?php echo $rows['serdate']; ?> </td>
  </tr>
  <tr align="center">
  <th width="35%" align="center">Services</th>
  <td width="65%">
  <?php echo $rows['services']; ?> </td>
  </tr>
  <tr align="center">
  <th width="35%" align="center">View Invoice</th>
  <td width="65%"><a href="../invoice/serbill.php?sid=<?php echo $rows['sid']; ?>" style="color: green">View</a></td>
  </tr>
  <tr align="center">
  <th width="35%">Status</th>
  <td width="65%"><span><?php echo $rows['status']; ?> </span>
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
  <!--<tr align="center">
  <th width="35%">Bill</th>
  <td width="65%"><a style="color: green;" href="#" class="bill">View Bill</a></td>
  </tr>-->
  <tr align="center">
  <br>
  <td colspan="2" width="65%"><button class="submitbtn" type="submit" name="servicedone" style="margin-top: 5vh;margin-bottom: 5vh;">Submit</button></td>
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
            <th width="6%"><center>Service ID</center></th>
            
            <th width="10%"><center>Action</center></th>
            
          </tr>
         
 <?php
  $sql="SELECT sid,cusid,date from service where status='Service Done'";
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
    <td><?php echo $rows['sid']; ?></td>
    
    <td><a href="servicereqs.php?sid2=<?php echo $rows['sid']; ?>" style="color: green">View</a></td>
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

<?php
if(isset($_SESSION['billed']) && ! empty($_SESSION['billed']))
{
  echo $_SESSION['billed'];
 unset($_SESSION['billed']);
 
}
?>
<?php
if(isset($_SESSION['billexists']) && ! empty($_SESSION['billexists']))
{
  echo $_SESSION['billexists'];
 unset($_SESSION['billexists']);
 
}
?>