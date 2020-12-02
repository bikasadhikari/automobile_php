<?php
error_reporting(E_ALL & ~E_NOTICE);
?>
<html>
<head >
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

  
 <link rel="stylesheet" type="text/css" href="headers/facss/all.css">
 <link rel="stylesheet" type="text/css" href="headers/v4-shims.css">
  
  <script src="bootstrap/js/bootstrap.min.js"></script>
 <link rel="stylesheet" type="text/css" href="headers/facss/all.css">
  <link rel="stylesheet" href="headers/material-icons.css">

            
        
   
<title>Throttle up</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
 <script src="headers/jquery.js"></script>
  <script src="headers/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
  textarea
  {
    resize: none;
  }
</style>
<script type="text/javascript">
   

function start1()
{
 
  function1();

  
}

function start2()
{
  
  onemon();
 oneplan();
  downpay();
  onemonemi();
  loadacces();

}

</script>


<!--</head>-->
<!--<body onload="start1();start2();">-->
    

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="throttleup.php" style="margin-top: -10px;"><img src="logo.png" class="logo" alt=""></a>
  <div class="uname">
    <?php

session_start();

echo "Welcome " .$_SESSION['username'] . "!";


?>
<input type="hidden" id="usernameval" name="usernameval" value=<?php echo $_SESSION['username']; ?>>

</div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="nav-link" id="loginlink" href="logindes.php">Login <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="indexsale.php">Buy</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="indexsubs.php">Subscribe</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="service.php">Service</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="acces.php">Accessories</a>
      </li>
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" id="logoutlink" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
          Profile
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="">
          <a class="dropdown-item" href="account.php">My Account</a>
          <a class="dropdown-item" href="myorders.php">My Orders</a>
          <a class="dropdown-item" href="logout.php">Logout</a></div>
      </li> 
      
    </ul>
  </div>
</nav>



</head>
</html>


  
