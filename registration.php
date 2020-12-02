<?php

$con=mysqli_connect('127.0.0.1','root','');

if(!$con)
{
	echo "Database not connected";
}

if(!mysqli_select_db($con,'throttleup'))
{
	echo "Database not selected";
}
if(isset($_POST['submit'])){
$cname=$_POST['name'];
$lname=$_POST['lname'];
$phone=$_POST['contact'];
$mail=$_POST['email'];
$addr=$_POST['address'];
$addr2=$_POST['address2'];
$cit=$_POST['city'];
$pin=$_POST['pincode'];
$state=$_POST['state'];
$uname=$_POST['username'];
$pass=$_POST['password'];
$pass2=$_POST['cpassword'];
 $slqquery = "SELECT * FROM registration WHERE email = '$mail'";
    $selectrresult = mysqli_query($con,$slqquery);
    
 $slquery = "SELECT * FROM registration WHERE username = '$uname'";
    $selectresult = mysqli_query($con,$slquery);
    if(mysqli_num_rows($selectresult) > 0)
    {
       session_start();
      

$_SESSION['userexist'] = '<script>$.alert({
    backgroundDismiss: true,
    type: "red",
     icon: "fa fa-warning",
    title: "Username already exists!",
    content: "Try another..",

});</script>';
echo
"<script type='text/javascript'>
window.location.href='registrationdes.php';
</script>"; 
    }
elseif(mysqli_num_rows($selectrresult) > 0)
{
   session_start();
      

$_SESSION['emailexist'] = '<script>$.alert({
    backgroundDismiss: true,
    type: "red",
     icon: "fa fa-warning",
    title: "Email already exists!",
    content: "Try another..",

});</script>';
echo
"<script type='text/javascript'>
window.location.href='registrationdes.php';
</script>";  
}

    elseif($pass != $pass2){
         session_start();
      

$_SESSION['userexist'] = '<script>$.alert({
    backgroundDismiss: true,
    type: "red",
     icon: "fa fa-warning",
    title: "Password Mismatch !",
    content: "",

});</script>';
echo
"<script type='text/javascript'>
window.location.href='registrationdes.php';
</script>"; 
    }




elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) 
{
    session_start();
      

$_SESSION['emailerr'] = '<script>$.alert({
    backgroundDismiss: true,
    type: "red",
     icon: "fa fa-warning",
    title: "Alert!",
    content: "Invalid E-mail",

});</script>';
echo
"<script type='text/javascript'>
window.location.href='registrationdes.php';
</script>";
	
}


else
{
$sql="INSERT into registration(name,lname,contact,email,address,address2,city,pincode,state,username,password,userstatus) values('$cname','$lname','$phone','$mail','$addr','$addr2','$cit','$pin','$state','$uname','$pass','Active')";

 if(mysqli_query($con,$sql))
 
 {
 	
session_start();
      

$_SESSION['rsuc'] = '<script>$.alert({
    backgroundDismiss: true,
    type: "green",
    autoClose: true,
    
    autoClose: "ok|8000",
    title: "",
    content: "Registration Successful ☺",

});</script>';
echo
"<script type='text/javascript'>
window.location.href='logindes.php';
</script>";
 }
}
}
 ?>


 <!--?>
    <script type="text/javascript">
        alert("Registration successful");
        window.open("logindes.php",'_self');
    </script>
    <?php
    ?>
 <script>
    
    alert("Invalid Email address");
    window.open("registrationdes.php",'_self');
    </script>

<?php

 ?>
 <script>
    
    alert("Username already exists");
    window.open("registrationdes.php",'_self');

    </script>

<?php