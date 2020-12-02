<?php 

session_start();
  if(empty($_SESSION['username']))

   {
      header("location: throttleup.php");
   }
?>
<?php
error_reporting(E_ALL & ~E_NOTICE);
$amt=$_POST['price1'];
$id=$_POST['id'];
$username=$_POST['usernameval'];

?>



<!--<?php
extract($_POST);
if(isset($_POST['cal']))
{	

$amt=$_POST['price'];
$loanamt = ($price - $downpay);
$intamt = ($loanamt * $bankint) / 100;
$totamt = ($loanamt + $intamt);
$monpay = ($totamt / $months);
}
?>-->

<?php include 'userheader.php' ?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="emi.css">
	<script type="text/javascript">
    function calculateEmi()
    {

     var bikeprice = document.getElementById('bikeprice').value;
     var downpay = document.getElementById('downpay').value;
     var bank = document.getElementById('bankint').value;
     var tenure = document.getElementById('months').value;

if(downpay == '')
    	{
    		alert("Enter Downpayment amount !");
    		document.getElementById('downpay').focus();
    	}
    	else
    		if(parseInt(downpay) > parseInt(bikeprice))
    		{
    			alert("Downpayment must be less than Bike Price !")
    			document.getElementById('downpay').value = '';
    			document.getElementById('downpay').focus();
    		}
    		else
    		if(parseInt(downpay) < 0.25 * parseInt(bikeprice) )
    		{
    			alert("Minimum Downpayment is 30% of Bike Price !");
    			document.getElementById('downpay').value = '';
    			document.getElementById('downpay').focus();
    		}
    		else
    		if(parseInt(downpay) > 0.75 * parseInt(bikeprice) )
    		{
    			alert("Maximum Downpayment is 75% of Bike Price !");
    			document.getElementById('downpay').value = '';
    			document.getElementById('downpay').focus();
    		}
    		else
    		{
    			var loanamt = parseInt(bikeprice) - parseInt(downpay);
    			var intamt = parseInt(loanamt) * (parseInt(bank) / 100);
    			var totamt = parseInt(loanamt) + parseInt(intamt);
    			var monamt = parseInt(totamt) / parseInt(tenure);
    			alert("Monthly Payment = " + monamt );
    			document.getElementById('loanamt').value = loanamt;
    			document.getElementById('intamt').value = intamt;
    			document.getElementById('totamt').value = totamt;
    			document.getElementById('monpay').value = monamt;
                document.getElementById('btn').disabled = false;
                document.getElementById('btn').focus();
    		}

       
        	
    }
	</script>
        }
<script type="text/javascript" src="validation.js"></script>
<style type="text/css">
	.slidecontainer {
  width: 80%;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 15px;
  border-radius: 5px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #4CAF50;
  cursor: pointer;
}
</style>
</head>

<?php
session_start();
?>
	  
	<body onload="validateBook();function1();" style="background-color: grey;">
		<div class="emiform">
		<form action="emidel.php" method="POST">
		<h1><u>EMI Calculator</u></h1><br><br>
	<br>
     <center>
     	<input type="hidden" class=""  readonly="id" name="id" placeholder="" required="" value=<?php echo  @$id; ?> >
		<div><b>Bike Price<span style="padding-left: 52px"> </style> :</b>
			<input type="text" class="pricebox" readonly="" required="" id="bikeprice" name="price" placeholder="amt"  value=<?php echo  @$amt; ?> >
		</div>
        <br>

		<div><b>Downpayment <span style="padding-left: 15px"> </style>:</b>
			<input class="downpaybox" type="text" name="downpay" required="" id="downpay" placeholder="downpay" onkeypress='return onlyNumbers(event)' value=<?php echo @$downpay; ?>>
		</div>
        <br>

		<div><b>Select Bank <span style="padding-left: 42px"> </style>:</b>
			<select name="bankint" class="bankintbox" id="bankint">
						<option value="8">HDFC(8%)</option>
						<option value="11">ICICI(11%)</option>
						<option value="9">AXIS(9%)</option>
						<option value="4">BAJAJ-FINSERV(4%)</option>
						<option value="8">CANARA(8%)</option>
						<option value="10">IDBI(10%)</option>
						<option value="12">YES(12%)</option>
						<option value="9">ANDHRA(9%)</option>
					</select> 
		</div>
<br>
		

		<div class="slidecontainer"><b> <span style="padding-left: 10px"> </style> </b>
			
  <input type="range"  max="30" min="6" value="6" class="slider" name="months" id="months">
  <p><b>Tenure : <span id="demo"></span> Months</p>
	<!--<input type="number" name="months" id="months" max=30 min=5 required="" class="monthsbox" placeholder="months" onkeypress='return onlyNumbers(event)' value=<?php echo @$months; ?>>-->
		</div>
<br>

	<script>
var slider = document.getElementById("months");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>		
		<input type="button" name="clear" class="btn btn-primary" style="width:90px;" value="Clear" onclick='document.getElementById("downpay").value="";document.getElementById("months").value="";document.getElementById("loanamt").value="";document.getElementById("intamt").value="";document.getElementById("totamt").value="";document.getElementById("monpay").value=""; validateBook();'>
		<input type="button"  name="cal" class="btn btn-primary" style="width: 90px;" value="Calculate" onclick="calculateEmi();">

		<br>
		<br><br>
		
		<div><b>Loan Amount<span style="padding-left: 34px"> </style> :</b>
			<input type="text" name="loanamt" id="loanamt" readonly="" placeholder="loanamt" >
		</div><br>

		<div><b>Interest Amount<span style="padding-left: 12px"> </style> :</b>
			<input type="number" name="intamt" id="intamt" required="" readonly="" placeholder="intamt" >
		</div><br>

		<div><b>Total Amount<span style="padding-left: 32px"> </style> :</b>
			<input type="text" name="totamt" id="totamt" required="" readonly="" placeholder="totamt" >
		</div><br>

		<div><b>Monthly Payment<span style="padding-left: 0px"> </style> :</b>
			<input type="text" name="monpay" id="monpay" readonly="" required="" placeholder="monpay" >
		</div><br>
        

	
	
		
        
        <input type="hidden" name="id" value=<?php echo $id; ?>>	
        <input type="hidden" name="usernameval" value=<?php  echo $_SESSION['username']; ?>>
        <input type="hidden" name="price" value=<?php echo  @$amt; ?>>

        <!--<input type="hidden" name="downpay" value=<?php echo @$downpay; ?>>
        <input type="hidden" name="bankint" value=<?php echo @$bankint ?>>
        <input type="hidden" name="months" value=<?php echo @$months; ?>>
        <input type="hidden" name="loanamt" value=<?php echo @$loanamt;?>>
        <input type="hidden" name="intamt" value=<?php echo @$intamt;?>>
        <input type="hidden" name="totamt" value=<?php echo @$totamt;?>>
        <input type="hidden" name="monpay" value=<?php echo @$monpay;?>>-->
        <input type="submit" name="book" id="btn" class="btn btn-success" style="width: 100px; margin-left: 30px;" value="Book" onclick="validateBook();">
        <script type="text/javascript">
        	function validateBook()
        	{
        		if(document.getElementById('loanamt').value == '')
        		{
        			document.getElementById('btn').disabled = true;
        			
        		}
        	}
        </script>
        </form>
</div>

</body>
</html>		
<?php include 'userfooter.php' ?>

	



		