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

<div class="container" id="table" style="width: 60%;">

  <?php
  session_start();
  $username=$_SESSION['username'];
  $usersql="SELECT * from registration where username='$username'";
  $userresults=mysqli_query($con,$usersql);
  while($userrows=mysqli_fetch_assoc($userresults))
  {
    $cusid=$userrows['cusid'];
    break;
  }
  ?>
<?php
$sql="SELECT paydet.payid,paydet.fname,paydet.lname,paydet.contact,paydet.address1,paydet.address2,paydet.city,paydet.state,paydet.pincode,paydet.total,paydet.payment,paydet.status,accesspay.payid,accesspay.brand,accesspay.name,paydet.adminupdate,paydet.cusquery
FROM paydet ,accesspay WHERE paydet.payid='$payid' AND accesspay.payid='$payid'"; 
$results=mysqli_query($con,$sql);
if($rows=mysqli_fetch_assoc($results))
{
  ?>
    <center><h3 style="margin-top: 50px;"><u>Order Details</u></h3></center><br>

      <div class="table-responsive">
        <table class="table table-bordered">
 
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
   <?php

  
    
      ?>
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
  <td width="65%"><?php echo $rows['payid']; ?><input type="hidden" name="payid" id="payid" value="<?php echo $rows['payid']; ?>"></td>
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
  <td width="65%"><?php echo $rows['adminupdate']; ?> </td>
  </tr>
  <tr align="center">
  <th width="35%">Bill</th>
  <td width="65%"><a href="invoice/accessbill.php?payid=<?php echo $rows['payid']; ?>" class="btn btn-success">View Bill</a></td>
  </tr>
  <?php
}
?>
  </table>
    
  
</div>

</div>
 <script type="text/javascript">
    $(document).ready(function(){
      $('#querysubmit').click(function(){
        var payid=$('#payid').val();
        var cusquery=$('#cusquery').val();
        $.ajax({
          url: 'admin/updates.php',
          type: 'post',
          data: {payidacc: payid,
              cusqueryacc: cusquery},
          success: function(response){
            console.log(response);
          },

        });
      });
    });

  </script>


</body>
<?php include 'userfooter.php' ?>