<?php include 'userheader.php'?>
<?php require 'dbcon.php' ?>
<?php
$id=$_POST['id'];
$plan=$_POST['planchose'];
$amt=$_POST['amt'];
$username=$_POST['username'];
$sql="SELECT * from registration where username='$username'";
$results=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="headers/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="headers/bootstrap.min.css">
    <script src="headers/datepick.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="validation.js"></script>
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
  
 <br><br> 
 <?php
 while($rows=mysqli_fetch_assoc($results))
 {
 ?>
         <div class="del">
            <div class="space">
                    <form action="subcon.php" method="post"> 
                    
                        <h4 class="mb-3"><center><u>Delivery Address</u></center></h4><br>
                        
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">First name</label>
                                    <input type="text" class="form-control" name="fname" required id="firstName" maxlength="25" onkeypress='return onlyAlphabets(event)' placeholder="" value=<?php echo $rows['name']; ?>>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Last name</label>
                                    <input type="text" maxlength="25" class="form-control" required id="lastName" placeholder="" onkeypress='return onlyAlphabets(event)' name="lname" value=<?php echo $rows['lname']; ?>>
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
                                    <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" onkeypress='return onlyNumbers(event)' maxlength="10" required value=<?php echo $rows['contact']; ?>>
                                    <div class="invalid-feedback" style="width: 100%;">
                                        Your contact is required.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email">Email
                                    <span class="text-muted"></span>
                                </label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com"  maxlength="100" onkeypress='return emailId(event)' required value=<?php echo $rows['email']; ?>>
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                            <div class="mb-3">
                            <label for="date">Delivery Date
                                    <span class="text-muted"></span>
                                </label>
                           <input id="datepicker" readonly="" name="deldate" width="300" />
    <script>
 

 $(function() {
 $("#datepicker").datepicker({
    
     uiLibrary: 'bootstrap',

        
 });
 $("#datepicker").on('change', function(){
    
         var date = Date.parse($(this).val());

         if (date < Date.now()){
             alert('Please select another date');
             $(this).val('');
         }
     
    });
});
    </script>
</div>



                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" onkeypress='return valAdd(event)' name=address1 maxlength="100" id="address" placeholder="1234 Main St" required value="<?php echo $rows['address']; ?>"/>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>

                            <div class="mb-5">
                                <label for="address2">Address 2
                                    <span class="text-muted">(Optional)</span>
                                </label>
                                <input type="text" class="form-control" onkeypress='return valAdd(event)' maxlength="100" name="address2" id="address2" placeholder="Apartment or suite" value="<?php echo $rows['address2']; ?>"/>
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
                                    <input type="text" class="form-control" onkeypress='return onlyAlphabets(event)' maxlength="30" name="city" id="city" placeholder="" required value=<?php echo $rows['city']; ?>>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip">Pincode</label>
                                    <input type="text" class="form-control" maxlength="6" name="pincode" id="pincode" placeholder="" onkeypress='return onlyNumbers(event)' required value=<?php echo $rows['pincode']; ?>>
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
                                    <input type="text" onkeypress='return val(event)' name="cardname" class="form-control" name="cardname" maxlength="50" id="cc-name" placeholder="" required>
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
                                    <input type="text" class="form-control" name="exp" onkeypress='return onlyNumexp(event)' maxlength="5" id="cc-expiration" placeholder="" required>
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
                                <input type="hidden" name="amt" value=<?php echo $amt; ?>>
                                <input type="hidden" name="id" value=<?php echo $id; ?>>
                                <input type="hidden" name="plan" value=<?php echo $plan; ?>>
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

</html>
<?php include 'userfooter.php' ?>