
<?php include 'userheader.php' ?>
<?php require 'dbcon.php' ?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<script src="headers/confirm.js"></script>
<link rel="stylesheet" href="headers/jquery-confirm.css">
<?php
session_start();
if(isset($_SESSION['serviceexists']) && ! empty($_SESSION['serviceexists']))
{
  echo $_SESSION['serviceexists'];
 unset($_SESSION['serviceexists']);
 
}
?>
	<script type="text/javascript" src="validation.js"></script>
	<script type="text/javascript" language="javascript">
                      function validateCheck() {
                          var chks = document.getElementsByName('services[]');
                          var hasChecked = false;
                          for (var i = 0; i < chks.length; i++) {

                              if (chks[i].checked) {

                                  hasChecked = true;

                                  break;

                              }

                          }

                          if (hasChecked == false) {
                          	$.alert({
   
    type: "red",
    title: "",
    content: "Please select atleast one service!",

});
                              document.getElementById('nxtBtn').disabled=true;
                              
                              

                              return false;


                          }

                          return true;

                      }
function validateChecked() {
                          var chks = document.getElementsByName('services[]');
                          var hasChecked = false;
                          for (var i = 0; i < chks.length; i++) {

                              if (chks[i].checked) {

                                  hasChecked = true;

                                  break;

                              }

                          }

                          if (hasChecked == false) 
                          {
                          	  document.getElementById('genser').checked = true;
                             
                          }
                      }

                      function btnValser()
{
 if(document.getElementById('username1').value == '')
 {
 
   document.getElementById('nextBtn').disabled = true; 
   $.alert({
    type: "red",
    title: "",
    content: "Login to Continue!",

});

   }

   else
   {
     document.getElementById('nextBtn').disabled = false; 
   }

   }
                          </script>
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<script src="headers/confirm.js"></script>
<link rel="stylesheet" href="headers/jquery-confirm.css">
 <script src="headers/datepick.js" type="text/javascript"></script>
    <link href="headers/gijgo.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
 function valAdd(e){
        var x=e.which||e.keycode;
        if((x>=97 && x<=122) || (x>=65 && x<=90) || x==35 || x==44 || x==32 || (x>=48 && x<=57))
            return true;
        else
            return false;
    }
  function onlyAlphanum(e){
        var x=e.which||e.keycode;
        if((x>=97 && x<=122) || (x>=65 && x<=90) || x==32 || (x>=48 && x<=57))
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
     function valComm(e){
        var x=e.which||e.keycode;
        if((x>=97 && x<=122) || (x>=65 && x<=90) || x==44 || x==32 || (x>=48 && x<=57))
            return true;
        else
            return false;
    }
    function val(e){
        var x=e.which||e.keycode;
        if((x>=97 && x<=122) || (x>=65 && x<=90) || x==8 || x==32)
            return true;
        else
            return false;
    }
</script>
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 50px auto;
  font-family: Raleway;
  padding: 40px;
  width: 40%;
  min-width: 200px;
  border: 1px solid black;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color:;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}

.price
{
	margin-right: 0px;
	font-family: sans-serif;

}
</style>
	<title>Service</title>
</head>
<body onload="function1();validateCheck();">
	<input type="hidden" id="username1" value=<?php session_start(); echo $_SESSION['username']; ?>>
<form id="regForm" action="servicecon.php" method="post">
  <h1>Book Your Service</h1>
  <!-- One "tab" for each step in the form: -->
  <br>
  <div class="tab"><b>Make:</b>
    <p>
<select class="form-control" id="exampleFormControlSelect2" name="make" >
      <option>Bajaj</option>
      <option>Honda</option>
      <option>TVS</option>
      <option>KTM</option>
      <option>Hero</option>
      <option>Kawasaki</option>
      <option>Suzuki</option>
      <option>Aprilla</option>
      <option>Other..</option>
    </select>
    </p>
    <p style="margin-top: 25px;"><b>Model/EngineCC:</b><br>
    	<input placeholder="Model/EngineCC" name="model" maxlength="30" onkeypress='return onlyAlphanum(event);'></p>
    <p style="margin-top: 25px;"><b>Vehicle Number:</b><br>
    	<input placeholder="Registration Number" name="regno"  maxlength="10" onkeypress='return onlyAlphanum(event);'></p>
    </div>
  
  <div class="tab"><b>Choose Services:</b><br>
  	<div style="margin-top: 10px;">
  <p><input type="checkbox" id="genser" name="services[]" value="General Service" style="margin-left: -220px; " checked="">
  <label for="genser" style="margin-left: -210"> General Service<span class="price" style="margin-left: 70px; ">₹650</span></label></p>

  <p style="margin-top: -20px;"><input type="checkbox" id="polish" name="services[]" value="Bike Polish" style="margin-left: -220px; ">
  <label for="polish" style="margin-left: -210"> Bike Polish <span class="price" style="margin-left: 102px; ">₹150</span></label></p>	

   <p style="margin-top: -20px;"><input type="checkbox" id="electric" name="services[]" value="Electrical" style="margin-left: -220px; ">
  <label for="electric" style="margin-left: -210"> Electrical <span class="price" style="margin-left: 114px; ">₹200 - ₹400</span></label></p>

  <p style="margin-top: -20px;"><input type="checkbox" id="bs" name="services[]" value="Breakdown" style="margin-left: -220px; ">
  <label for="bs" style="margin-left: -210"> Breakdown Service <span class="price" style="margin-left: 40px; ">₹200</span></label></p>
  
  <p style="margin-top: -20px;"><input type="checkbox" id="engine" name="services[]" value="Engine Work" style="margin-left: -220px; ">
  <label for="engine" style="margin-left: -210"> Engine Work <span class="price" style="margin-left: 88px; ">₹200 - ₹800</span></label></p>

  <p style="margin-top: -20px;"><input type="checkbox" id="fit" name="services[]" value="Fittings" style="margin-left: -220px; ">
  <label for="fit" style="margin-left: -210"> Fittings <span class="price" style="margin-left: 128px; ">₹150 - ₹400</span></label></p>

  <p style="margin-top: -20px;"><input type="checkbox" id="fluid" name="services[]" value="Oil and Coolant" style="margin-left: -220px; ">
  <label for="fluid" style="margin-left: -210"> Oil and Coolant <span class="price" style="margin-left: 68px; ">₹100 - ₹250</span></label></p>

  <p style="margin-top: -20px;"><input type="checkbox" id="brakes" name="services[]" value="Brakes" style="margin-left: -220px; ">
  <label for="brakes" style="margin-left: -210"> Brakes <span class="price" style="margin-left: 132px; ">₹200</span></label></p>

  <p style="margin-top: -20px;"><input type="checkbox" id="sus" name="services[]" value="Suspension" style="margin-left: -220px; ">
  <label for="sus" style="margin-left: -210"> Suspension <span class="price" style="margin-left: 96px; ">₹350 - ₹600</span></label></p>

  <p style="margin-top: -20px;"><input type="checkbox" id="acc" name="services[]" value="Accelerator" style="margin-left: -220px; ">
  <label for="acc" style="margin-left: -210"> Accelerator <span class="price" style="margin-left: 96px; ">₹200 - ₹350</span></label></p>

<p style="margin-top: -20px;"><input type="checkbox" id="wheels" name="services[]" value="Wheels" style="margin-left: -220px; ">
  <label for="wheels" style="margin-left: -210"> Wheels <span class="price" style="margin-left: 124px; ">₹200</span></label></p>


</div>
<div class="md-form mb-4 pink-textarea active-pink-textarea">
  <textarea id="form18" class="md-textarea form-control" name="comments" rows="3" placeholder="Comments" maxlength="150" onkeypress='return valComm(event)'></textarea>
  <label for="form18"></label>
</div>
  </div>
  <div class="tab"><b>Contact Details:</b>
   <p style="margin-top: 15px;"><input placeholder="Name" name="name" maxlength="30" onkeypress='return val(event)'></p>
   <p style="margin-top: 15px;"><input placeholder="Phone Number" name="contact" maxlength="10" minlength="10" onkeypress='return onlyNumbers(event)'></p>
   <p style="margin-top: 15px;"><input placeholder="Address" name="address" maxlength="100" onkeypress='return valAdd(event)'></p>
   <div class="mb-3">
                          
                           <input id="datepicker" readonly="" placeholder="Select Date" name="date" width="300" />
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
   <p style="margin-top: 15px;"><input placeholder="Pincode" name="pincode" maxlength="6" minlength="6" onkeypress='return onlyNumbers(event)'></p>

  </div>
  <?php
  function randString($length,$charset='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789')
  {
       $str = '';
       $count = strlen($charset);
       while($length--)
       {
        $str .= $charset[mt_rand(0, $count-1)];

       }
       return $str;
  }
  $sid= randString(10);

  while(mysqli_num_rows(mysqli_query($con,"SELECT sid from service WHERE sid='".mysqli_real_escape_string($con, $sid)."'")) > 0 )  
  {
      $sid = randString(10);
      
  }
  ?>
  <input type="hidden" name="sid" value=<?php echo $sid; ?>>
  <?php
  session_start();
$username=$_SESSION['username'];
$sql="SELECT * from registration where username='$username'";
$results=mysqli_query($con,$sql);
 while($rows=mysqli_fetch_assoc($results))
 {
 
?>
<input type="hidden" name="cusid" value=<?php echo $rows['cusid']; ?>>
<?php
}
?>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" class="btn btn-dark" id="prevBtn" onclick="validateChecked();nextPrev(-1);">Previous</button>
      <button type="button" class="btn btn-success" style="width: 80px;" id="nextBtn" onclick="btnValser();validateCheck();nextPrev(1);">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    
  </div>
</form>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
    
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";

  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:

    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += "invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

</body>
</html>
<?php include 'userfooter.php' ?>

<?php require 'dbcon.php' ?>

