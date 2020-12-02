<?php require '../dbcon.php'; ?>
<?php
session_start();
if(isset($_SESSION['loginsuccess']) && ! empty($_SESSION['loginsuccess']))
{
  echo $_SESSION['loginsuccess'];
  unset($_SESSION['loginsuccess']);
}
if(!isset($_SESSION['adminuser'])){
    header('Location: index.php');
}
?>
<head>
   <script src="../headers/jquery.js"></script>
  <script src="../headers/popper.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="../headers/facss/all.css">
 <link rel="stylesheet" type="text/css" href="../headers/v4-shims.css">
  
  
	<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
      <style type="text/css">
      *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;

      }
      hr
      {
        border:1px solid #17202A;
      }
a{
  text-decoration: none;
  color: #AAB7B8;
}
   
.dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 1.5vw;
  color: #AAB7B8;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}
.btn{
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 1.5vw;
  color: #AAB7B8;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
 .dropdown-btn:hover {
  color: #f1f1f1;

}
.btn:hover {
  color: #f1f1f1;

}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 1.5vw; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

  
.active {
  background-color:   ;
  color: white;
}

.dropdown-container {
  display: none;
  background-color: #17202A;
  padding-left: 40px;
  font-family: sans-serif;


  

}


.fa-caret-down {
  float: right;
  padding-right: 8px;
}

 
.dropdown-btn {
  cursor: pointer;
 
  position: relative;
  transition: 0.5s;
}
body{
  background: #D7BDE2;
}
  
    #add td{
      border: none;
    }
  </style>

<script src="../bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
 
<div style="width: 20vw;height: 100%; background: #212F3C ;position: absolute;">
  <div>
  </div>
  <div style="font-size: 120%;color: white;">

    <ul style="font-size: 160%;text-align: center;background: #17202A  ;height: 70px;display: flex;justify-content: center;align-items: center;list-style-type: none;">
      
      <li style="color:#EBEDEF"><i class="fa fa-home"></i> Admin</li>
    
    </ul>

    <ul style="line-height: 35px;">

      <hr>
      <li style="font-size: 120%;text-align: center;height: 6%;justify-content: center;display: flex;align-items: center"><i class="fa fa-cogs" style="font-size:1.4vw"></i><span style="padding-left: 2%">Manage</span></li>
        <hr>
        <div style="color:#AAB7B8;list-style-type: none;position: relative;margin-top: 10px;margin-bottom:10px;">
          <div>
         <a class="btn" href="adminindex.php"><i class="fa fa-user-o"></i> <span>Customers </span>
  
  </a>
        </div>
          <button class="dropdown-btn"><i class="fa fa-motorcycle"></i> <span>Bikes </span>
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container" style="";>
    <a href="addbikes.php" class="dropdown-btn" style="font-size: 1.1vw;">Add / Update</a>
   
   
  </div>
  <button class="dropdown-btn"><i class="fa fa-thumbs-o-up"></i> <span>Subscription </span>
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container" style="";>
    <a href="addsubs.php" class="dropdown-btn" style="font-size: 1.1vw;">Add / Update</a>
   
  </div>
<button class="dropdown-btn"><i class="fa fa-shopping-basket"></i> <span>Accessories </span>
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container" style="";>
    <a href="accessadd.php" class="dropdown-btn" style="font-size: 1.1vw;">Add / Update</a>
    
  </div>
  <button class="dropdown-btn"><i class="fa fa-book"></i> <span>Orders </span>
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container" style="";>
    <a href="bikeorders.php" class="dropdown-btn" style="font-size: 1.1vw;">Bikes</a>
    <a href="subcriptionorders.php" class="dropdown-btn" style="font-size: 1.1vw;">Subscriptions</a>
    <a href="accessorders.php" class="dropdown-btn" style="font-size: 1.1vw;">Accessories</a>
    
  </div>

      <div>
         <a href="servicereqs.php" class="btn"><i class="fa fa-cog"></i> <span>Service Requests</span>
  
  </a>
        </div>
     
       
      </div>
      
</ul>
<hr>
<div  style="margin-top: 10px;margin-bottom: 10px;">
  <!--<div>
 <button class="btn"><i class="fa fa-user-circle"></i> <span>My Account </span>
    
  </button>
  </div>-->
  <div>
    <a href="logout.php" class="btn"><i class="fa fa-sign-out"></i> <span>Logout </span>
    
  </a>
    
  </div>

</div>
<hr>
</div>


<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>
</div>