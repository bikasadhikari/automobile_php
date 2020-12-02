<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
<link rel="stylesheet" type="text/css" href="registration.css">
<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="headers/jquery.js"></script>
  <script src="headers/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="headers/facss/all.css">
 <link rel="stylesheet" type="text/css" href="headers/v4-shims.css">
   <link rel="stylesheet" href="headers/material-icons.css">
 <link rel="stylesheet" href="headers/jquery-confirm.css">
<script src="headers/confirm.js"></script>
<script type="text/javascript">
  function onlyAlphabets(e){
        var x=e.which||e.keycode;
        if((x>=97 && x<=122) || (x>=65 && x<=90))
            return true;
        else
            return false;
    }
    function valAdd(e){
        var x=e.which||e.keycode;
        if((x>=97 && x<=122) || (x>=65 && x<=90) || x==35 || x==44 || x==32 || (x>=48 && x<=57))
            return true;
        else
            return false;
    }
  function onlyNumexp(e){
        var x=e.which||e.keycode;
        if((x>=48 && x<=57) || x==47)
            return true;
        else
            return false;
    }
</script>
<style type="text/css">
	.navbar {
  min-height: 80px;

}

.navbar-brand {
  padding: 0 10px;
  height: 60px;
  line-height: 60px;
}

.navbar-toggle {
  /* (80px - button height 34px) / 2 = 23px */
  margin-top: 23px;
  padding: 9px 10px !important;
}

@media (min-width: 768px) {
  .navbar-nav > li > a {
    /* (80px - line-height of 27px) / 2 = 26.5px */
    padding-top: 26.5px;
    padding-bottom: 26.5px;
    line-height: 27px;
  }
}

.navbar-nav{
font-size: 120%;
}
.label
{
  background-color: rgba(0,0,0,0.7);
}
.logo{
  height: 110px;
    width: auto;
    margin-top: -25px;
    margin-left: -20px;
}
.navbar-nav > li{
  padding-left:9px;
  padding-right:9px;
  margin: 0px;

}
	#footer{
	bottom: 0px;
	transform: translate(0%,900%);
	position: absolute;
	width: 100%;


}



footer .main-footer{	padding: 20px 0px;	background: #252525;}
footer ul{	padding-left: 0;	list-style: none;}

/* Copy Right Footer */
.footer-copyright { background-color: #1B2631; padding: 5px;}
.footer-copyright .logo {    display: inherit;}
.footer-copyright nav {    float: right;    margin-top: 5px;}
.footer-copyright nav ul {	list-style: none;	margin: 0;	padding: 0;}
.footer-copyright nav ul li {	border-left: 1px solid #505050;	display: inline-block;	line-height: 12px;	margin: 0;	padding: 0 8px;}
.footer-copyright nav ul li a{	color: #969696;}
.footer-copyright nav ul li:first-child {	border: medium none;	padding-left: 0;}
.footer-copyright p {	color: #969696;	margin: 2px 0 0;}

/* Footer Top */
.footer-top{	background: #252525;	padding-bottom: 30px; margin-bottom: 30px;	border-bottom: 3px solid #222;}

/* Footer transparent */
footer.transparent .footer-top, footer.transparent .main-footer{	background: transparent;}
footer.transparent .footer-copyright{	background: none repeat scroll 0 0 rgba(0, 0, 0, 0.3) ;}

/* Footer light */
footer.light .footer-top{	background: #f9f9f9;}
footer.light .main-footer{	background: #f9f9f9;}
footer.light .footer-copyright{	background: none repeat scroll 0 0 rgba(255, 255, 255, 0.3) ;}

/* Footer 4 */
.footer- .logo {    display: inline-block;}

/*====================
	Widgets
====================== */
.widget{	padding: 20px;	margin-bottom: 40px;}
.widget.widget-last{	margin-bottom: 0px;}
.widget.no-box{	padding: 0;	background-color: transparent;	margin-bottom: 40px;
	box-shadow: none; -webkit-box-shadow: none; -moz-box-shadow: none; -ms-box-shadow: none; -o-box-shadow: none;}
.widget.subscribe p{	margin-bottom: 18px;}
.widget li a{	color: #ff8d1e;}
.widget li a:hover{	color: #4b92dc;}
.widget-title {margin-bottom: 20px;}
.widget-title span {background: #839FAD none repeat scroll 0 0;display: block; height: 1px;margin-top: 25px;position: relative;width: 20%;}
.widget-title span::after {background: inherit;content: "";height: inherit;    position: absolute;top: -4px;width: 50%;}
.widget-title.text-center span,.widget-title.text-center span::after {margin-left: auto;margin-right:auto;left: 0;right: 0;}
.widget .badge{	float: right;	background: #7f7f7f;}

.typo-light h1,
.typo-light h2,
.typo-light h3,
.typo-light h4,
.typo-light h5,
.typo-light h6,
.typo-light p,
.typo-light div,
.typo-light span,
.typo-light small{	color: #fff;}

ul.social-footer2 {	margin: 0;padding: 0;	width: auto;}
ul.social-footer2 li {display: inline-block;padding: 0;}
ul.social-footer2 li a:hover {background-color:#ff8d1e;}
ul.social-footer2 li a {display: block;	height:30px;width: 30px;text-align: center;}
.btn{background-color: #ff8d1e; color:#fff;}
.btn:hover, .btn:focus, .btn.active {background: #4b92dc;color: #fff;
-webkit-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
-moz-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
-ms-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
-o-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
-webkit-transition: all 250ms ease-in-out 0s;
-moz-transition: all 250ms ease-in-out 0s;
-ms-transition: all 250ms ease-in-out 0s;
-o-transition: all 250ms ease-in-out 0s;
transition: all 250ms ease-in-out 0s;

}



</style>

<script type="text/javascript" src="validation.js"></script>



</head>
<body>


	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="logo.png" class="logo" alt=""></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="nav-link" id="loginlink" href="throttleup.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <!--<li class="nav-item ">
        <a class="nav-link" id="" href="#">About us<span class="sr-only">(current)</span></a>
      </li>-->

    </ul>
  </div>
</nav>
		<!--<nav>

		<img src="logo.png" class="logo1">

</nav>
-->

	<div class="register" style="">


		<img src="regavatar.png" class="avatar">

		<h1><u>REGISTER</u></h1>
		<form action="registration.php" method="post" name="register">
			<input type="text" name="name" maxlength="25" required="" placeholder="First Name"  onkeypress='return onlyAlphabets(event)' >
            <input type="text" name="lname" maxlength="25" required=""  placeholder="Last Name"  onkeypress='return onlyAlphabets(event)' >


			<input type="text" name="contact" maxlength="10" minlength="10" required="" placeholder="Contact"  onkeypress='return onlyNumbers(event)' >

			<input type="text" name="email" maxlength="100" placeholder="Email-ID" required="" onkeypress='return emailId(event)' >

			<input type="text" name="address"  maxlength="100" placeholder="Address Line 1" required="" onkeypress='return valAdd(event)'>
			<input type="text" name="address2" maxlength="100" placeholder="Address Line 2" onkeypress='return valAdd(event)'>
			<input type="text" name="city" maxlength="15" placeholder="City" required=""  onkeypress='return onlyAlphabets(event)'>
			<input type="text" name="state" maxlength="15" placeholder="State" required=""  onkeypress='return onlyAlphabets(event)'>
			<input type="text" name="pincode" maxlength="6" minlength="6" required="" placeholder="Pincode"  onkeypress='return onlyNumbers(event)'>

			<input type="text" name="username" maxlength="50" placeholder="Username" required=""  onkeypress='return userName(event)'>

			<input type="Password" name="password" maxlength="15" required="" placeholder="Password" >

			<input type="Password" name="cpassword" maxlength="15" required="" placeholder="Confirm Password" >


			<input type="submit" name="submit" value="Register">

			<br><a href="logindes.php"><u style="">Login now</u> </a>

		</form>

	</div>

	<footer id="footer" class="footer-1">
<div class="footer-copyright">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<p>Copyright ThrottleUp © 2020. All rights reserved.</p>
</div>
</div>
</div>
</div>
</footer>
</head>

</html>


<?php

if(isset($_SESSION['emailexist']) && ! empty($_SESSION['emailexist']))
{
 echo $_SESSION['emailexist'];
 unset($_SESSION['emailexist']);
}
?>
<?php

if(isset($_SESSION['emailerr']) && ! empty($_SESSION['emailerr']))
{
 echo $_SESSION['emailerr'];
 unset($_SESSION['emailerr']);
}
?>


<?php

if(isset($_SESSION['userexist']) && ! empty($_SESSION['userexist']))
{
 echo $_SESSION['userexist'];
 unset($_SESSION['userexist']);
}
?>
