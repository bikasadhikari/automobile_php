<?php include 'userheader.php'?>
<?php require 'dbcon.php' ?>
<?php
if(isset($_POST['continue'])){
$accessid=$_POST['id'];
$qty=$_POST['qty'];
$carttot=$_POST['totalval'];
}
session_start();
$username=$_SESSION['username'];
$sql="SELECT * from registration where username='$username'";
$results=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	 <meta name="viewport" content="width=device-width, initial-scale=1">

     <!--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />-->
     <script src="headers/jquery.js"></script>
     <script src="headers/datepick.js" type="text/javascript"></script>
     <link href="headers/gijgo.min.css" rel="stylesheet" type="text/css" />
 
    
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
<script type="text/javascript" src="validation.js"></script>
    <style type="text/css">
    	.del{
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

<body onload="function1();">
  
 <br>
 <?php
 while($rows=mysqli_fetch_assoc($results))
 {
 ?>
         <div class="del">
         	<div class="space">
                    <form action="accescon.php" method="post"> 
                    
                        <h4 class="mb-3"><center><u>Delivery Address</u></center></h4><br>
                        
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="fname">First name</label>
                                    <input type="text" class="form-control" maxlength="25" name="fname" onkeypress='return onlyAlphabets(event)' required id="firstName" placeholder="" value=<?php echo $rows['name']; ?>>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lname">Last name</label>
                                    <input type="text" onkeypress='return onlyAlphabets(event)' class="form-control" required id="lastName" maxlength="25" placeholder="" name="lname" value=<?php echo $rows['lname']; ?>>
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>
                            </div>
                            

                            <div class="mb-3">
                                <label for="contact">Contact</label>
                                <div class="input-group">
                                    <!--<div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>-->
                                    <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" maxlength="10" minlength="10" required onkeypress='return onlyNumbers(event)' value=<?php echo $rows['contact']; ?>>
                                    <div class="invalid-feedback" style="width: 100%;">
                                        Your contact is required.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email">Email
                                    <span class="text-muted"></span>
                                </label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" maxlength="100" onkeypress='return emailId(event)' required value=<?php echo $rows['email']; ?>>
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                            <input type="hidden" name="cusid" value=<?php echo $rows['cusid']; ?>>

                            <div class="mb-3">
                                <label for="address1">Address</label>
                                <input type="text" onkeypress='return valAdd(event)' class="form-control" name=address1 id="address" maxlength="100" placeholder="#123 Main St" required value="<?php echo $rows['address']; ?>"/>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>

                            <div class="mb-5">
                                <label for="address2">Address 2
                                    <span class="text-muted">(Optional)</span>
                                </label>
                                <input type="text" class="form-control" onkeypress='return valAdd(event)' name="address2" id="address2" maxlength="100" placeholder="Apartment or suite" value="<?php echo $rows['address2']; ?>"/>
                            </div>

                            <div class="row">
                                <div class="col-md-5 mb-3">
                                 <label for="state">State</label>
                                    <input type="text" class="form-control" name="state" id="state" placeholder="" maxlength="30" onkeypress='return onlyAlphabets(event)' required value=<?php echo $rows['state']; ?>>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" maxlength="30" name="city" id="city" placeholder="" required onkeypress='return onlyAlphabets(event)' value=<?php echo $rows['city']; ?>>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="pincode">Pincode</label>
                                    <input type="text" class="form-control" maxlength="6" minlength="10" name="pincode" id="pincode" placeholder="" required onkeypress='return onlyNumbers(event)' value=<?php echo $rows['pincode']; ?>>
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
                                    <label for="cardname">Name on card</label>
                                    <input type="text" class="form-control" onkeypress='return val(event)' name="cardname" maxlength="50" id="cc-name" placeholder="" required>
                                    <small class="text-muted">Full name as displayed on card</small>
                                    <div class="invalid-feedback">
                                        Name on card is required
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cardno">Credit card number</label>
                                    <input type="text" class="form-control" maxlength="19" onkeypress='return onlyNumbers(event)' name="cardno" id="cc-number" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Credit card number is required
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="exp">Expiration</label>
                                    <input type="text" onkeypress='return onlyNumexp(event)' class="form-control" name="exp" id="cc-expiration" maxlength="5" minlength="4" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Expiration date required
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cvv">CVV</label>
                                    <input type="text" class="form-control" maxlength="3" name="cvv" id="cvv" placeholder="" minlength="3" onkeypress='return onlyNumbers(event)' required>
                                    <div class="invalid-feedback">
                                        Security code required
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit">
                                <i class="fa fa-credit-card"></i> Continue to checkout</button>
                                <?php
$query1="SELECT * from cart where username='$username'";
$result1=mysqli_query($con,$query1);
while($rows1=mysqli_fetch_assoc($result1))
    {

?>
                                <input type="hidden" name="id" id="viewid" value=<?php echo $rows1['id'];?>> 
                                <input type="hidden" name="qty" value=<?php echo $rows1['qty'];?>><?php } ?>
                                <input type="hidden" name="total" value="<?php echo $carttot; ?>"/>
                                <input type="hidden" name="username" value=<?php echo $_SESSION['username']; ?>>
                                <input type="hidden" name="cusid" value=<?php echo $rows['cusid']; ?>>

                        </form>
                    </div>
                </div>
               </div>

<?php
}
?>

</body>
<?php include 'userfooter.php' ?>
</html>
