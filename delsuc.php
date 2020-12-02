<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
$con=mysqli_connect('127.0.0.1','root','','throttleup');
?>
<?php 

/*session_start();
  */
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

	while(mysqli_num_rows(mysqli_query($con,"SELECT payid from emipay WHERE payid='".mysqli_real_escape_string($con, $payid)."'")) > 0 && (mysqli_query($con,"SELECT payid from fullpay1 WHERE payid='".mysqli_real_escape_string($con, $payid)."'")) > 0)  
	{
      $payid = randString(10);
      
	}


    
     
$cusid=$_POST['cusid'];
$username=$_POST['delusername'];
$company=$_POST['company'];
$id=$_POST['id'];
$model=$_POST['model'];
$price=$_POST['price'];
$category=$_POST['category'];
$image=$_POST['image'];
$enginecc=$_POST['enginecc'];
$power=$_POST['power'];
$mileage=$_POST['mileage'];
$abs=$_POST['abs'];
$fuelcap=$_POST['fuelcap'];
$name=$_POST['fname'];
$lname=$_POST['lname'];
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
$cvv=$_POST['cvv'];
$expiry=$_POST['exp'];
$dt1=date("d-m-Y");
$date=date("d-m-Y H:i:s");


$sql="INSERT into fullpay1(payid,cusid,id,username,fname,lname,contact,email,address1,address2,city,state,pincode,payment,amount,cardname,cardno,expiry,cvv,status,date) values ('$payid','$cusid','$id','$username','$name','$lname','$contact','$email','$address','$address2','$city','$state','$pincode','$payment','$price','$cardname','$cardno','$expiry','$cvv','Not Confirmed','$date')";
$results=mysqli_query($con,$sql);


//$deldata="DELETE from sales where id='$id'";
//$result=mysqli_query($con,$deldata);
if($results)
{
 
$mail = new PHPMailer;

$mail->isSMTP();

$mail->SMTPDebug = 0;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "projectdreams333@gmail.com";
$mail->Password = "Bikas@333";

$mail->setFrom('projectdreams333@gmail.com', 'throttleup');
$mail->addReplyTo('projectdreams333@gmail.com', 'throttleup');

$mail->addAddress($email, '');
$mail->isHTML(true);
$mail->Subject = 'Booking Confirmation';

$mail->Body = 'Your Booking is confirmed with PAYID: ' .$payid;





if (!$mail->send()) {
    
} else {
    
}

  $update="UPDATE sales SET stock=stock-1 where id='$id'";
mysqli_query($con,$update);

}

$_SESSION['booksuc'] = '<script>$.alert({
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
$_SESSION['bookfail'] = '<script>$.alert({
    
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