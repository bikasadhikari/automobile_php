<?php require 'dbcon.php' ?>
<?php

/*$sqldel1 = "DELETE from service(sid,make,model,regno,services,comments,name,contact,address,date,pincode)VALUES('','','','','','','','','','','')";
mysqli_query($con,$sqldel1);*/
$regno1=$_POST['regno'];
$query="SELECT * from service where regno='$regno1' and  (status='Not Confirmed' or status='Confirmed')";
$res=mysqli_query($con,$query);
if(mysqli_num_rows($res) > 0)
  {
    session_start();  
    $_SESSION['serviceexists'] = '<script>$.alert({
    
    type: "red",
   
    title: "Alert !",
    content: "Service Request exists for this Registration Number. Contact Us if you didnt raise Service Request.",
});</script>';
echo
"<script type='text/javascript'>
window.location.href='service.php';
</script>";
  }
else
{

$cusid=$_POST['cusid'];
$make=$_POST['make'];
$model=$_POST['model'];
$regno=$_POST['regno'];
$comments=$_POST['comments'];
$name=$_POST['name'];
$contact=$_POST['contact'];
$address=$_POST['address'];
$date=$_POST['date'];
$pincode=$_POST['pincode'];
$sid=$_POST['sid'];
$presentdate=date("d-m-Y H:i:s");
$checkbox1 = $_POST['services'];
    $chk="";  
    foreach($checkbox1 as $chk1)  
       {  
          $chk.= $chk1.",";  
       }  
       $sql = "INSERT INTO service(sid,cusid,make,model,regno,services,comments,name,contact,address,serdate,pincode,status,date)VALUES('$sid','$cusid','$make','$model','$regno','$chk','$comments','$name','$contact','$address','$date','$pincode','Not Confirmed','$presentdate')";

if(mysqli_query($con,$sql)) {
echo 'Data added sucessfully';
$sqldel = "DELETE from service(sid,cusid,make,model,regno,services,comments,name,contact,address,serdate,pincode,status,date)VALUES('','','','','','','','','','','','','','')";
mysqli_query($con,$sqldel);
session_start();  
$_SESSION['servicesuc'] = '<script>$.alert({
    backgroundDismiss: true,
    type: "green",
    autoClose: true,
    autoClose: "ok|10000",
    title: "",
    content: "Service Requested !",
});</script>';
echo
"<script type='text/javascript'>
window.location.href='throttleup.php';
</script>";
} 
}

?>