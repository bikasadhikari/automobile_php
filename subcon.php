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

	while(mysqli_num_rows(mysqli_query($con,"SELECT payid from subbook WHERE payid='".mysqli_real_escape_string($con, $payid)."'")) > 0 && (mysqli_query($con,"SELECT payid from emipay WHERE payid='".mysqli_real_escape_string($con, $payid)."'")) > 0 && (mysqli_query($con,"SELECT payid from fullpay1 WHERE payid='".mysqli_real_escape_string($con, $payid)."'")) > 0)  
	{
      $payid = randString(10);
      
	}
}
    	
 
     ?>
<?php
session_start();
$username=$_SESSION['username'];

$id1=$_POST['id'];


$query1="select * from subscribe where id='$id1'";
$result1=mysqli_query($con,$query1);
$rows1=mysqli_fetch_assoc($result1);
    $stock=$rows1['stock'];


if(isset($_POST['submit']))
{

if($stock > 0)

{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$deldate=$_POST['deldate'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];
$state=$_POST['state'];
$city=$_POST['city'];
$pincode=$_POST['pincode'];
$payment=$_POST['payment'];
$cardno=$_POST['cardno'];
$cardname=$_POST['cardname'];
$exp=$_POST['exp'];
$cvv=$_POST['cvv'];
$username=$_POST['username'];
$id=$_POST['id'];
$amt=$_POST['amt'];
$plan=$_POST['plan'];
$cusid=$_POST['cusid'];

      $sql="INSERT into subbook(payid,cusid,id,fname,lname,contact,email,deldate,address1,address2,state,city,pincode,payment,amount,plan,cardname,cardno,expiry,cvv,status) values ('$payid','$cusid','$id','$fname','$lname','$contact','$email','$deldate','$address1','$address2','$state','$city','$pincode','$payment','$amt','$plan','$cardname','$cardno','$exp','$cvv','Not Confirmed')";


$results=mysqli_query($con,$sql);
if($results)
{
  $update="UPDATE subscribe SET stock=stock-1 where id='$id'";
mysqli_query($con,$update);
}


$_SESSION['subsuc'] = '<script>$.alert({
    backgroundDismiss: true,
    type: "green",
    autoClose: true,
    autoClose: "ok|10000",
    title: "Subscription Successful !",
    content: "",

});</script>';
echo
"<script type='text/javascript'>
window.location.href='throttleup.php';
</script>";

}

else
{
	$_SESSION['subfail'] = '<script>$.alert({
    
    type: "red",
   
    title: "Subscription Unuccessful !",
    content: "Stock Out",

});</script>';
echo
"<script type='text/javascript'>
window.location.href='throttleup.php';
</script>";
}
}

?>