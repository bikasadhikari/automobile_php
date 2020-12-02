<?php include 'userheader.php';?>
<?php

$con=mysqli_connect('127.0.0.1','root','','throttleup');

?>
<!DOCTYPE html>
<html lang="en">


	<head>
	<link rel="stylesheet" type="text/css" href="indexsubsbook.css">
	<script type="text/javascript" src="validation.js"></script>
	 <script src="headers/confirm.js"></script>
<link rel="stylesheet" href="headers/jquery-confirm.css">
     <script type="text/javascript">
     	function click()
     	{
  document.getElementById('onebut').click();
}
     		function onemon()
     		{
     			var price = document.getElementById('bikeprice').value;
     			tot = price * 2.2/100;
				montot = tot / 1;
				var montotpay1 = parseInt(montot);
				document.getElementById('disp').innerHTML ="₹ " + montotpay1;
				document.getElementById('moncost').innerHTML ="₹ " + montotpay1;
				document.getElementById('amt').value = montotpay1;
     		}
     		
	function threemon()
	
		{
			var price = document.getElementById('bikeprice').value;
			tot = price * 5/100;
			montot = tot / 3;
			var montotpay1 = parseInt(montot);
			document.getElementById('disp').innerHTML ="₹ " + montotpay1;
			document.getElementById('moncost').innerHTML ="₹ " + montotpay1;
			 var bikeprice = document.getElementById('bikeprice').value;
	        downpay = bikeprice * .15;
			loanamt = parseInt(bikeprice) - parseInt(downpay);
			intamt = loanamt * .05;
			totamt = parseInt(loanamt) + parseInt(intamt);
			montotpay = totamt / 3;
            document.getElementById('buymoncost').innerHTML ="₹ " + Math.round(montotpay);
            document.getElementById('amt').value = montotpay1;
	
	}

	function sixmon()
	
		{
			var price = document.getElementById('bikeprice').value;
			var tot = price * 8/100;
			var montot = (tot / 6);
			var montotpay1 = parseInt(montot);
			document.getElementById('disp').innerHTML ="₹ " + montotpay1;
			document.getElementById('moncost').innerHTML ="₹ " + montotpay1;
			 var bikeprice = document.getElementById('bikeprice').value;
	        downpay = bikeprice * .15;
			loanamt = parseInt(bikeprice) - parseInt(downpay);
			intamt = loanamt * .07;
			totamt = parseInt(loanamt) + parseInt(intamt);
			montotpay = totamt / 6;
            document.getElementById('buymoncost').innerHTML ="₹ " + Math.round(montotpay);
            document.getElementById('amt').value = montotpay1;
	
	}

	function twmon()
	
		{
			var orgprice = document.getElementById('bikeprice').value;
			var tot = orgprice  * 15/100;
			var montot = (tot / 12);
			var montotpay1 = parseInt(montot);
			document.getElementById('disp').innerHTML ="₹ " + parseInt(montotpay1);
	        document.getElementById('moncost').innerHTML ="₹ " + montotpay1;
	        var bikeprice = document.getElementById('bikeprice').value;
	        downpay = bikeprice * .15;
			loanamt = parseInt(bikeprice) - parseInt(downpay);
			intamt = loanamt * .09;
			totamt = parseInt(loanamt) + parseInt(intamt);
			montotpay = totamt / 12;
            document.getElementById('buymoncost').innerHTML ="₹ " + Math.round(montotpay);
            document.getElementById('amt').value = montotpay1;

	}

	function tfmon()
	
		{
			var orgprice = document.getElementById('bikeprice').value;
			tot = orgprice * 24/100;
			montot = (tot / 24);
			montotpay1 = montot  ;
			document.getElementById('disp').innerHTML ="₹ " + montotpay1;
			document.getElementById('moncost').innerHTML ="₹ " + montotpay1;
			var bikeprice = document.getElementById('bikeprice').value;
			downpay = bikeprice * .15;
			loanamt = parseInt(bikeprice) - parseInt(downpay);
			intamt = loanamt * .11;
			totamt = parseInt(loanamt) + parseInt(intamt);
			montotpay = totamt / 24;
            document.getElementById('buymoncost').innerHTML ="₹ " + Math.round(montotpay);
            document.getElementById('amt').value = montotpay1;

	
	}

	function threeplan()
	
		{
			var plan = document.getElementById('threebut').value;
			document.getElementById('plan').innerHTML = plan + "<span class='text-muted'> Months</span>";
			 document.getElementById('plan1').value = plan;
	
	}
 
 function sixplan()
	
		{
			var plan = document.getElementById('sixbut').value;
			document.getElementById('plan').innerHTML = plan + "<span class='text-muted'> Months</span>";
			 document.getElementById('plan1').value = plan;
	
	}

function twplan()
	
		{
			var plan = document.getElementById('twbut').value;
			document.getElementById('plan').innerHTML = plan + "<span class='text-muted'> Months</span>";
			 document.getElementById('plan1').value = plan;
	
	}

function tfplan()
	
		{
			var plan = document.getElementById('tfbut').value;
			document.getElementById('plan').innerHTML = plan + "<span class='text-muted'> Months</span>";
			 document.getElementById('plan1').value = plan;
	
	}


function start1()
{

  function1();

  
}
function stock()
{
 	var stock = document.getElementById('stock').value;
 	if(stock < "1")
 	{
 		document.getElementById('proceed').disabled = true;
 		document.getElementById('stockmsg').style.visibility = "visible";
 	}
 	else
 	{
 		document.getElementById('proceed').disabled = false;
 	}
}

function start2()
{
  
  onemon();
 oneplan();
  downpay();
  stock();
  onemonemi();
  loadacces();
 
}

function btnValsub()
{
 if(document.getElementById('username1').value == '')
 {

 	 
 	  $.alert({
    
    type: "red",
    title: "",
    content: "Login to Continue!",

});
 document.getElementById('proceed').disabled = true;
      
   
   } else
   {
   	document.getElementById('proceed').disabled = false;
   }
}
</script>
</head>

<input type="hidden" name="username1" id="username1" value=<?php session_start(); echo $_SESSION['username']; ?>>
<body onload="start1();start2();">
<div class="sub">
	<?php

	$id = $_GET['value'];	
	$query = "SELECT * from subscribe where id='$id' ";
	$query_run = mysqli_query($con,$query);

?>
<?php
	while($rows = mysqli_fetch_array($query_run))
	{
		?>

<input type="hidden" id="onemonp" value=<?php echo $rows['onemonp'];?> >
<input type="hidden" id="bikeprice" value=<?php echo $rows['bikeprice'];?> >



		

    <div class="bikedet">
	<div class="card" style="width: 23rem; border: 1px solid grey;">
  <img  class="card-img-top"   src=<?php echo $rows['image'] ; ?>>
  <div id="stockmsg" style="visibility: hidden; background: rgba(0,0,0,0.6);color: white;position: absolute; width: 100%;text-align: center;height: 40px; font-size: 150%;top: 35%;">
  	Not Available
  </div>
  <br>
    <h5 align="center" class="card-title"><u>Details</u></h5>
   
  <ul class="list-group list-group-flush"><center>
    <li class="list-group-item">Company : <?php echo $rows['company']; ?></li>
    <li class="list-group-item">Model   : <?php echo $rows['model']; ?></li>
    <li class="list-group-item">Enginecc : <?php echo $rows['enginecc']; ?></li></center>
  </ul>
  <div class="card-body"><center>
  	<form action="subsindexdel.php" method="post">
  		<input type="hidden" name="id" value=<?php echo $rows['id']; ?>>
  		<input type="hidden" id="stock" value="<?php echo $rows['stock']; ?>"/>
  		<input type="hidden" name="planchose" id="plan1">
  		<input type="hidden" name="amt" id="amt">
  		<input type="hidden" name="username" id="username" value=<?php echo $_SESSION['username'];?>>
    <button type="submit" id="proceed" class="btn btn-primary" onclick="btnValsub();">Proceed</button></center>
    </form>
  </div>
</div>
</div>
 
    <div class="price">
	<div class="card" style="width: 45rem;">
  <h5 class="card-header"><b><span style="margin-left: 15px;">Pricing Details</span></b></h5>
  <div class="card-body">
    <h5 class="card-title"></h5>

    <div style="margin-left: 15px">
    <button type="button" id="onebut" value="1" class="btn btn-outline-primary" style="width: 7rem;" onclick="onemon();oneplan();onemonemi();">1 Month</button>
    <button type="button" id="threebut" value="3" class="btn btn-outline-primary" style="width: 7rem; margin-left: 15px;" onclick="threemon();threeplan();">3 Month</button>
    <button type="button" id="sixbut" value="6" class="btn btn-outline-primary" style="width: 7rem; margin-left: 15px;" onclick="sixmon();sixplan();">6 Month</button>
    <button type="button" id="twbut" value="12" class="btn btn-outline-primary" style="width: 7rem; margin-left: 15px;" onclick="twmon();twplan();">12 Month</button>
    <button type="button" id="tfbut" value="24" class="btn btn-outline-primary" style="width: 7rem; margin-left: 15px;" onclick="tfmon();tfplan();">24 Month</button>

</div>

<div class="disprice">
	<script type="text/javascript">
	
	


</script>

<h1  style="margin-top: 20px; margin-left: 15px"><span id="disp"></span><span class="text-muted" style="font-size: 50%;">/month</span></h1>
  </div>
<div class="text-muted" style="margin-top: -5px; margin-left: 15px;"> (Inclusive Taxes)</div>

  	
  </div>
</div>
</div>
<div class="plan">
<div class="card" style="width: 45rem;">
  <div class="card-body">
    <h5 class="card-title" style="margin-left: 15px;">Subscription Plan Chosen : <span class="planval text-muted"  id="plan"></span></h5>
    
  </div>
</div>
	</div>	
<div class="subvsbuy">
<div class="card" style="width: 45rem;">
  <h5 class="card-header"><span style="margin-left: 15px;"><b>Subscription vs Buying</b></span></h5>
  <div class="card-body">
  	<table class="table" align="center">
  <thead>
    <tr>
      
      <th scope="col"></th>
      <th scope="col">Subscribe</th>
      <th scope="col">Buy</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td>Monthly Expense</td>
      <td><span id="moncost"></span></td>
      <td><span id="buymoncost"></span></td>
    </tr>
    <tr>
     
      <td>Downpayment</td>
      <td>₹ 0</td>
      <td><span id="downpaybuy"></span></td>
    </tr>
    <tr>
      
      <td>No Long Term Commitment</td>
      <td><i class="fa fa-check" style="color: green;"></i></td>
      <td><i class="fa fa-times" style="color: red;"></i>
</td>
    </tr>
 <tr>
      
      <td>No Loan Process, NO CIBIL CHECK</td>
      <td><i class="fa fa-check" style="color: green;"></i></td>
      <td><i class="fa fa-times" style="color: red; "></i></center>
</td>
    </tr>
    
  </tbody>
</table>

</div>
</div>	
</div>

<div class="con">
<div class="card1" style="width: 23rem;height: 5.75rem;">
  <div class="card-body">
    <h6 class="card-title text-muted" style="margin-left: 15px;">To know more call us @+917022472891</h6> 
    
  </div>
</div>
	</div>	
<?php
}
?>


</div>
</body>

</html>
<br><br><br><br><Br><br><br><br><br>
<?php include 'userfooter.php';?>

  
  

