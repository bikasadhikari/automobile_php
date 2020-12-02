<?php require 'dbcon.php' ?>
<?php
if(isset($_POST['submit']))
{
	function randString($length,$charset='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789')
	{
       $str = '';
       $count = strlen($charset);
       while($length--)
       {
       	$str .= $charset[mt_rand(0, $count-1)];

       }
       return $str;
	}
	$payid= randString(10);

	while(mysqli_num_rows(mysqli_query($con,"SELECT payid from subbook WHERE payid='".mysqli_real_escape_string($con, $payid)."'")) > 0 && (mysqli_query($con,"SELECT payid from emipay WHERE payid='".mysqli_real_escape_string($con, $payid)."'")) > 0 && (mysqli_query($con,"SELECT payid from fullpay1 WHERE payid='".mysqli_real_escape_string($con, $payid)."'")) > 0 && (mysqli_query($con,"SELECT payid from accesspay WHERE payid='".mysqli_real_escape_string($con, $payid)."'")) > 0)  
	{
      $payid = randString(10);
      
	}
}
    	
 
     ?>
<?php
session_start();
$username=$_SESSION['username'];
if(isset($_POST['submit']))
{
$query1="SELECT cart.id,cart.qty,accessories.id,accessories.stock from cart inner join accessories on cart.id=accessories.id where username='$username'";
$result1=mysqli_query($con,$query1);
while($rows1=mysqli_fetch_assoc($result1))
    {
      $qty111=$rows1['qty'];
      $stock111=$rows1['stock'];
}
if($stock111 >= $qty111)

{

$username=$_SESSION['username'];
$payment=$_POST['payment'];
$total=$_POST['total'];
$cardname=$_POST['cardname'];
$cardno=$_POST['cardno'];
$exp=$_POST['exp'];
$cvv=$_POST['cvv'];
$cusid=$_POST['cusid'];
$name=$_POST['fname'];
$lname=$_POST['lname'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$address=$_POST['address1'];
$address2=$_POST['address2'];
$city=$_POST['city'];
$state=$_POST['state'];
$pincode=$_POST['pincode'];

  
$query1="SELECT * from cart where username='$username'";
$result1=mysqli_query($con,$query1);
while($rows1=mysqli_fetch_assoc($result1))
    {
      $id13=$rows1['id'];
      $qty3=$rows1['qty'];
      $sql="INSERT into accesspay(payid,cusid,id,brand,name,qty,price,image) values ('$payid','$cusid','".$rows1["id"]."','".$rows1["brand"]."','".$rows1["name"]."','".$rows1["qty"]."','".$rows1["price"]."','".$rows1["image"]."')"; 
      $results=mysqli_query($con,$sql);

        


$query2="DELETE from cart where username='$username' and id='".$rows1["id"]."'";
$result5=mysqli_query($con,$query2);

$update="UPDATE accessories SET stock=stock - '$qty3' where id='$id13'";
$result6=mysqli_query($con,$update);
}

$sql2="INSERT into paydet(payid,cusid,fname,lname,contact,email,address1,address2,city,state,pincode,total,payment,cardname,cardno,expiry,cvv,status) values ('$payid','$cusid','$name','$lname','$contact','$email','$address','$address2','$city','$state','$pincode','$total','$payment','$cardname','$cardno','$exp','$cvv','Not Confirmed')"; 
$results2=mysqli_query($con,$sql2);




$_SESSION['purchasesuc'] = '<script>$.alert({
    backgroundDismiss: true,
    type: "green",
    autoClose: true,
    autoClose: "ok|10000",
    title: "Purchase Successful !",
    content: "",

});</script>';
echo
"<script type='text/javascript'>
window.location.href='throttleup.php';
</script>";

}
else
{
  $_SESSION['purchasefail'] = '<script>$.alert({
    
    type: "red",
    
    title: "Purchase Unsuccessful !",
    content: "Stock not Available",

});</script>';
	echo "<script type='text/javascript'>
window.location.href='throttleup.php';
</script>";
}
}


?>