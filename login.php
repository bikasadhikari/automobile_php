

<?php


$username=$_POST['username'];
$pass=$_POST['password'];


$con=mysqli_connect('127.0.0.1','root','');
if(!$con)
{
	echo "Database not connected";
}

if(!mysqli_select_db($con,'throttleup'))
{
	echo "Database not selected";
}

$query = "SELECT * from registration where username='$username' and password='$pass'" ;
       

$result = mysqli_query($con,$query) or die(mysql_error());
$rows = mysqli_fetch_assoc($result);
$user=$rows['username'];
$pwd=$rows['password'];
$status=$rows['userstatus'];


if(($username == $user) && ($pass == $pwd))
{
  if($status == "Blocked")
  {
    session_start();  
$_SESSION['blocked'] = '<div class="alert alert-danger"name="fail" role="alert" style="font-size: 90%;width: 200px; opacity: 0.9; height:30px; margin-left: 30px; margin-top: -275px; "><strong><div style="margin-top: -8px;">User has been Blocked!</div></strong></center></div>';
    echo
"<script type='text/javascript'>
window.location.href='logindes.php';
</script>";
}
else
{
    session_start();
   $_SESSION['username'] = $username;   

$_SESSION['success'] = '<script>$.alert({
    backgroundDismiss: true,
    type: "green",
    autoClose: true,
    autoClose: "ok|3000",
    title: "Login Success !",
    content: "Welcome ☺",

});</script>';
echo
"<script type='text/javascript'>
window.location.href='throttleup.php';
</script>";
}
}
   else
{
	
session_start();

$_SESSION['failed'] = '<div class="alert alert-danger"name="fail" role="alert" style="width: 200px; opacity: 0.9; height:30px; margin-left: 30px; margin-top: -275px; "><strong><div style="margin-top: -8px;">Login Failed! Try again</div></strong></center></div>';
echo
"<script type='text/javascript'>
window.location.href='logindes.php';
</script>";
  

}
?>
<!--<div class="alert alert-success" role="alert" style="width: 200px; opacity: 0.9;"><center><strong>Login Success!</strong></center></div>-->
<!--'<div class="alert alert-danger"name="fail" role="alert" style="width: 200px; opacity: 0.9; height:20px; "><center><strong><div style="margin-top: -5px;"></div></strong></center></div>';
echo
"<script type='text/javascript'>
window.location.href='logindes.php';
</script>";*/