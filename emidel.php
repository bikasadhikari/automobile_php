<?php 

session_start();
  if(empty($_SESSION['username']))

   {
      header("location: throttleup.php");
   }
?>
<?php
$id=$_POST['id'];

$username=$_POST['usernameval'];
$price=$_POST['price'];
$downpay=$_POST['downpay'];
$bankint=$_POST['bankint'];
$months=$_POST['months'];
$loanamt=$_POST['loanamt'];
$intamt=$_POST['intamt'];
$totamt=$_POST['totamt'];
$monpay=$_POST['monpay'];
$con=mysqli_connect('localhost','root','','throttleup');
$sql="SELECT * from registration where username='$username'";
$result=mysqli_query($con,$sql);

?>
<?php include 'userheader.php' ?>
<html>
<head>

	
        <script type="text/javascript" src="validation.js"></script>
 <script type="text/javascript">
    function val(e){
        var x=e.which||e.keycode;
        if((x>=97 && x<=122) || (x>=65 && x<=90) || x==8 || x==32)
            return true;
        else
            return false;
    }
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
<script type="text/javascript">
function start1()
{
 
  function1();

  
}
</script>	
<style type="text/css">
	
.logo{
	margin-top: -20px;"
}
</style>
<style type="text/css">
		.delivery{
    		border: 1px solid grey;
            width: 700px;
            transform: translate(45%,2%);
    		border-radius: 10px;

    	}

    	.space{
    		margin-left: 30px;
    		margin-right: 30px;
    		margin-top: 30px;
    		margin-bottom: 35px;
    		}
	</style>
</head>
<body onload="start1();">
	<br>
	
	  <?php
		while($rows=mysqli_fetch_assoc($result))
	{

		?>

	

		<div class="delivery">
			<div class="space">
<form action="emidelsuc.php" method="post">
		<h4 class="mb-3"><center><u>Delivery Address</u></center></h4><br>
                        
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">First name</label>
                                    <input type="text" class="form-control" onkeypress='return onlyAlphabets(event)' maxlength="30" name="fname" required id="firstName" placeholder="" value=<?php echo $rows['name']; ?>>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Last name</label>
                                    <input type="text" class="form-control" onkeypress='return onlyAlphabets(event)' maxlength="30" required id="lastName" placeholder="" name="lname" value=<?php echo $rows['lname']; ?>>
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="username">Contact</label>
                                <div class="input-group">
                                    <!--<div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>-->
                                    <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" maxlength="10" onkeypress='return onlyNumbers(event)' required value=<?php echo $rows['contact']; ?>>
                                    <div class="invalid-feedback" style="width: 100%;">
                                        Your contact is required.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email">Email
                                    <span class="text-muted"></span>
                                </label>
                                <input type="email" class="form-control" maxlength="100" onkeypress='return emailId(event)' name="email" id="email" placeholder="you@example.com" required value=<?php echo $rows['email']; ?>>
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                            
<input type="hidden" name="cusid" value=<?php echo $rows['cusid']; ?>>
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" onkeypress='return valAdd(event)' maxlength="100" name=address1 id="address" placeholder="1234 Main St" required value="<?php echo $rows['address']; ?>"/>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>

                            <div class="mb-5">
                                <label for="address2">Address 2
                                    <span class="text-muted">(Optional)</span>
                                </label>
                                <input type="text" class="form-control" onkeypress='return valAdd(event)'  maxlength="100" name="address2" id="address2" placeholder="Apartment or suite" value="<?php echo $rows['address2']; ?>"/>
                            </div>

                            <div class="row">
                                <div class="col-md-5 mb-3">
                                 <label for="state">State</label>
                                    <input type="text" class="form-control" maxlength="30" onkeypress='return onlyAlphabets(event)' name="state" id="state" placeholder="" required value=<?php echo $rows['state']; ?>>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="state">City</label>
                                    <input type="text" class="form-control" maxlength="30" onkeypress='return onlyAlphabets(event)' name="city" id="city" placeholder="" required value=<?php echo $rows['city']; ?>>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip">Pincode</label>
                                    <input type="text" class="form-control" maxlength="6" onkeypress='return onlyNumbers(event)' name="pincode" id="pincode" placeholder="" required value=<?php echo $rows['pincode']; ?>>
                                    <div class="invalid-feedback">
                                        Zip code required.
                                    </div>
                                </div>
                            </div>
                            
                            <hr class="mb-4">

                            <h4 class="mb-3">Payment</h4>

                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="credit" name="payment" type="radio" class="custom-control-input" checked required value="credit card">
                                    <label class="custom-control-label" for="credit">Credit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="debit" name="payment" type="radio" class="custom-control-input" required value="debit card">
                                    <label class="custom-control-label" for="debit">Debit card</label>
                                </div>
                            
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cc-name">Name on card</label>
                                    <input type="text" class="form-control" onkeypress='return val(event)' maxlength="50" name="cardname" id="cc-name" placeholder="" required>
                                    <small class="text-muted">Full name as displayed on card</small>
                                    <div class="invalid-feedback">
                                        Name on card is required
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cc-number">Credit card number</label>
                                    <input type="text" class="form-control" onkeypress='return onlyNumbers(event)' maxlength="19" name="cardno" id="cc-number" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Credit card number is required
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">Expiration</label>
                                    <input type="text" class="form-control" onkeypress='return onlyNumexp(event)' maxlength="5" name="exp" id="cc-expiration" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Expiration date required
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">CVV</label>
                                    <input type="text" class="form-control" onkeypress='return onlyNumbers(event)' maxlength="3" name="cvv" id="cc-cvv" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Security code required
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit">
                                <i class="fa fa-credit-card"></i> Continue to checkout</button>
		
		

	

	<?php
}
?>
<?php
$usersql="SELECT * from sales where id='$id'";
$resultuser=mysqli_query($con,$usersql);
while($rows1=mysqli_fetch_assoc($resultuser))
	{

?>


<input type="hidden" name="company" value=<?php echo $rows1['company']; ?>>
<input type="hidden" name="model" value=<?php echo $rows1['model']; ?>>
<input type="hidden" name="image" value=<?php echo $rows1['image']; ?>>
<input type="hidden" name="enginecc" value=<?php echo $rows1['enginecc']; ?>>
<input type="hidden" name="category" value=<?php echo $rows1['pcategory']; ?>>
<input type="hidden" name="mileage" value=<?php echo $rows1['mileage']; ?>>
<input type="hidden" name="abs" value=<?php echo $rows1['abs']; ?>>
<input type="hidden" name="power" value=<?php echo $rows1['power']; ?>>
<input type="hidden" name="fuelcap" value=<?php echo $rows1['fuelcap']; ?>>
<?php
}

?>
        	<br>
        	<br>
            <br> 
           
        <input type="hidden" name="id" value=<?php echo $id; ?>>
        <input type="hidden" name="username" value=<?php echo $_SESSION['username']; ?>>   
        <input type="hidden" name="price" value=<?php echo $price; ?>>
        <input type="hidden" name="downpay" value=<?php echo $downpay; ?>>
        <input type="hidden" name="bankint" value=<?php echo $bankint; ?>>
        <input type="hidden" name="months" value=<?php echo $months; ?>>
        <input type="hidden" name="loanamt" value=<?php echo $loanamt; ?>>
        <input type="hidden" name="intamt" value=<?php echo $intamt; ?>>
        <input type="hidden" name="totamt" value=<?php echo $totamt; ?>>
        <input type="hidden" name="monpay" value=<?php echo $monpay; ?>>




</form>
 </div>
                </div>
               </div>
</body>
</html>
<?php include 'userfooter.php' ?>