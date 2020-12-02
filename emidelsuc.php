<?php
$con=mysqli_connect('localhost','root','','throttleup');
?>

<?php
if(isset($_POST['submit']))
{
      session_start();

  if(empty($_SESSION['username']))

   {
   echo  "<script type='text/javascript'>
   window.location.href='throttleup.php';

alert('Something went wrong!');
</script>";
   }
   else
   {
$username=$_SESSION['username'];

$id1=$_POST['id'];


$query1="select * from sales where id='$id1'";
$result1=mysqli_query($con,$query1);
$rows1=mysqli_fetch_assoc($result1);
    $stock=$rows1['stock'];



  if($stock > 0)

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

	while(mysqli_num_rows(mysqli_query($con,"SELECT payid from emipay WHERE payid='".mysqli_real_escape_string($con, $payid)."'")) > 0 && (mysqli_query($con,"SELECT payid from fullpay1 WHERE payid='".mysqli_real_escape_string($con, $payid)."'")) > 0 )  
	{
      $payid = randString(10);
      
	}


    
       $id=$_POST['id'];
      
       $username=$_POST['username'];
       $price=$_POST['price'];
       $downpay=$_POST['downpay'];
       $bankint=$_POST['bankint'];
       $months=$_POST['months'];
       $loanamt=$_POST['loanamt'];
       $intamt=$_POST['intamt'];
       $totamt=$_POST['totamt'];
       $monpay=$_POST['monpay'];

       $name=$_POST['fname'];
       $lname=$_POST['lname'];
       $cusid=$_POST['cusid'];
       $contact=$_POST['contact'];
       $email=$_POST['email'];
       $address=$_POST['address1'];
       $address2=$_POST['address2'];
       $city=$_POST['city'];
       $state=$_POST['state'];
       $pincode=$_POST['pincode'];
       $payment=$_POST['payment'];
       $cardname=$_POST['cardname'];
       $cardno=$_POST['cardno'];
       $expiry=$_POST['exp'];
       $cvv=$_POST['cvv'];

       $company=$_POST['company'];
       $model=$_POST['model'];
       $image=$_POST['image'];
       $enginecc=$_POST['enginecc'];
       $category=$_POST['category'];
       $mileage=$_POST['mileage'];
       $power=$_POST['power'];
       $abs=$_POST['abs'];
       $fuelcap=$_POST['fuelcap'];
       $date=date("d-m-Y H:i:s");

       
      

$sql="INSERT into emipay(payid,cusid,id,username,name,lname,contact,email,address,address2,city,state,pincode,payment,amount,downpay,bankint,months,loanamt,intamt,totamt,monpay,cardname,cardno,expiry,cvv,status,date) values ('$payid','$cusid','$id','$username','$name','$lname','$contact','$email','$address','$address2','$city','$state','$pincode','$payment','$price','$downpay','$bankint','$months','$loanamt','$intamt','$totamt','$monpay','$cardname','$cardno','$expiry','$cvv','Not Confirmed','$date')";
$results=mysqli_query($con,$sql);
//$deldata="DELETE from sales where id='$id'";

//$result=mysqli_query($con,$deldata);
if($results)
{
  $update="UPDATE sales SET stock=stock-1 where id='$id'";
mysqli_query($con,$update);
}


$_SESSION['emibooksuc'] = '<script>$.alert({
    backgroundDismiss: true,
    type: "green",
    autoClose: true,
    autoClose: "ok|10000",
    title: "Booking Successful !",
    content: "",

});</script>';
echo
"<script type='text/javascript'>
window.location.href='throttleup.php';
</script>";


}
else
{
     echo
$_SESSION['emibookfail'] = '<script>$.alert({
    
    type: "red",
    
    title: "Alert!",
    content: "Something went wrong..",

});</script>';
echo
"<script type='text/javascript'>
window.location.href='throttleup.php';
</script>";
}
}
}
?>