<?php include 'userheader.php' ?>
<?php require 'dbcon.php' ?>
<head>
	<script src="headers/jquery.js"></script>
	<script type="text/javascript" src="validation.js"></script>
</head>
<body onload='function1();'>

<br>
<form>
    <div class="container" id="table" style="box-shadow: 2px 2px 3px 2px #ccc ;">
    	<?php
    	session_start();
    	$username=$_SESSION['username'];
    	$sql="SELECT * from registration where username='$username'";
    	$result=mysqli_query($con,$sql);
    	$row=mysqli_fetch_assoc($result);
    	?>
    	<div style="margin:0px;">
    		<br>
    <h3 style="margin-top: 0px;"><u style=""><center><span style="">My Account</span></center></u></h3><br>
</div>
      <div class="table-responsive" style="padding: 5px;">
        <table border="0">
  
	<tr align="left">
  <td width="4.7%">First name <input type="" placeholder="" id="fname" name="fname" maxlength="30" class="form-control" style="width:150px;margin-bottom: 15px;" onkeypress="return onlyAlphabets(event);" value="<?php echo $row['name']; ?>"/></td>
	<td width="4.7%">Last name <input type="" placeholder="" maxlength="30" onkeypress="return onlyAlphabets(event);" id="lname" name="lname" class="form-control" style="width:150px;margin-bottom: 15px;" value="<?php echo $row['lname']; ?>"/></td>
	<td width="4.7%">Registration Date <input type="" name="regdate" placeholder="" readonly="" class="form-control" style="width:167px;margin-bottom: 15px;" value="<?php echo $row['regdate']; ?>"/ ></td>
	<td><span style="margin-left: 150px;" >Email-ID<div class="input-group mb-3" style="width:323px;margin-left: 150px;">
  <input type="text" class="form-control" placeholder="Email-ID.." maxlength="100" id="email" name="email" value="<?php echo $row['email']; ?>"/>
  <div class="input-group-append">
    <button class="btn btn-success" id="changeemail" name="changeemail"  type="button">Change</button>
  </div>
</div></td>
	<!--<td colspan="3"  width="15%">Email <input type="" name="email" id="email"  class="form-control" style="width:300px;margin-bottom: 15px;"  value="<?php echo $row['email']; ?>"/></td>-->
	
	</tr>


	<tr>
		<td colspan="3"  width="15%">Contact <input type="" name="" onkeypress="return onlyNumbers(event);" id="contact" class="form-control" style="width:576px;margin-bottom: 15px;" maxlength="10" minlength="10" value="<?php echo $row['contact']; ?>" /></td>
		<td colspan="3"  width="15%"><span style="margin-left: 150px;"><b>Change Password</b> <input type="password" name="curpassword" id="curpassword" class="form-control" placeholder="Current Password.." style="width:323px;margin-bottom: 15px;margin-left: 150px;"></span></td>
</tr>
<tr>
		<td colspan="3"  width="15%">Username <input type="" name="username" id="username" readonly="" class="form-control" style="width:576px;margin-bottom: 15px;" value="<?php echo $row['username']; ?>"/></td>
		<td colspan="3"  width="15%"><span style="margin-left: 150px;"><span style="visibility: hidden;">-</span><input type="Password" name="newpassword" maxlength="15" class="form-control" id="newpassword" placeholder="New Password.." style="width:323px;margin-bottom: 15px;margin-left: 150px;"></span></td>
		
</tr>
<tr>
		<!--<td colspan="3"  width="15%">Email <input type="" name="email" id="email"  class="form-control" style="width:576px;margin-bottom: 15px;"  value="<?php echo $row['email']; ?>"/></td>-->
		
</tr>
<tr>
		<td colspan="3"  width="15%">Address Line 1 <input type="" name="address1" maxlength="100" id="address1"  class="form-control" style="width:576px;margin-bottom: 15px;" value="<?php echo $row['address']; ?>"/></td>
		<td colspan="3"  width="15%"><span style="margin-left: 150px;"><span style="visibility: hidden;">-</span><input type="password" name="conpassword" id="conpassword" maxlength="15" class="form-control" placeholder="Confirm New Password.." style="width:323px;margin-bottom: 15px;margin-left: 150px;"></span></td>
		
</tr>
<tr>
		<td colspan="3"  width="15%">Address Line 2<input type="" name="address2" id="address2" maxlength="100" class="form-control" style="width:576px;margin-bottom: 15px;" value="<?php echo $row['address2']; ?>"/></td>
		<td width="15%"><span style="margin-left: 0px;"><input type="submit" name="changepass" id="changepass" value="Change Password"  class="btn btn-primary" style="width:150px;margin-bottom: 15px;margin-left: 235px;margin-top: 25px;"></td>
</tr>
<tr>
<td width="15%"><span style="margin-left: 0px;">State </span><input type="" maxlength="20" onkeypress="return onlyAlphabets(event);" name="state" id="state" class="form-control" style="width:150px;margin-bottom: 15px;margin-left: 0px;" value="<?php echo $row['state']; ?>"/></td>
	<td width="15%"><span style="margin-left: 0px;">City </span><input type="" name="city" maxlength="20" onkeypress="return onlyAlphabets(event);" id="city" class="form-control" style="width:150px;margin-bottom: 15px;margin-left: 0px;" value="<?php echo $row['city']; ?>"/></td>
	<td width="15%"><span style="margin-left: 15px;">Pincode </span><input type="" name="pincode" maxlength="6" id="pincode" onkeypress="return onlyNumbers(event);" class="form-control" style="width:150px;margin-bottom: 15px;margin-left: 15px;" value="<?php echo $row['pincode']; ?>"/></td>
</tr>
<tr>
<td width="15%"></td>
	<td width="15%"><span style="margin-left: 0px;"><input type="submit" name="update" id="update" value="Update"  class="btn btn-success" style="width:150px;margin-bottom: 25px;margin-left: 0px;margin-top: 25px;"></td>
	<td width="15%"></td>
</tr>
</table>
</div>

   </div>
</form>
<script type="text/javascript">
 
$(document).ready(function(){
$("#update").click(function(){
var fname = $("#fname").val();
var lname = $("#lname").val();
var email = $("#email").val();
var contact = $("#contact").val();
var address1 = $("#address1").val();
var address2 = $("#address2").val();
var state = $("#state").val();
var city = $("#city").val();
var pincode = $("#pincode").val();
// Returns successful data submission message when the entered information is stored in database.
//var dataString = 'name1='+ name + '&email1='+ email + '&password1='+ password + '&contact1='+ contact;
if(fname=='' && lname=='' && contact=='' && email==''&&address1==''&&state==''&&city==''&&pincode=='')
{
alert("Please Fill All Fields");
}
else
if(fname=='')
{
	alert('Please Enter First Name!');
	$("#fname").css('border-color','red');
	$("#fname").focus();
	$("#fname").css('box-shadow','none');
     
     $("#fname").css('border-color','red');
     $("#fname").keypress(function(){
    $("#fname").css("border-color", "#D5D8DC");
  });
}
else
if(lname=='')
{
	alert('Please Enter Last Name!');
	$("#lname").css('border-color','red');
	
     $("#lname").focus();
     $("#lname").css('box-shadow','none');
     
     $("#lname").css('border-color','red');
     $("#lname").keypress(function(){
    $("#lname").css("border-color", "#D5D8DC");
  });
  }  
else
if(contact=='')
{
	alert('Please Enter Contact Number!');
	$("#contact").css('border-color','red');
	
     $("#contact").focus();
     $("#contact").css('box-shadow','none');
     
     $("#contact").css('border-color','red');
     $("#contact").keypress(function(){
    $("#contact").css("border-color", "#D5D8DC");
  });
}
else

if(address1=='')
{
	alert('Please Enter Address!');
	$("#address1").css('border-color','red');
	
     $("#address1").focus();
     $("#address1").css('box-shadow','none');
     
     $("#address1").css('border-color','red');
     $("#address1").keypress(function(){
    $("#address1").css("border-color", "#D5D8DC");
  });
}
else

if(state=='')
{
	alert('Please Enter State!');
	
	$("#state").css('border-color','red');
	
     $("#state").focus();
     $("#state").css('box-shadow','none');
     
     $("#state").css('border-color','red');
     $("#state").keypress(function(){
    $("#state").css("border-color", "#D5D8DC");
  });
}
else
if(city=='')
{
	
	alert('Please Enter City!');
	$("#city").css('border-color','red');
	
     $("#city").focus();
     $("#city").css('box-shadow','none');
     
     $("#city").css('border-color','red');
     $("#city").keypress(function(){
    $("#city").css("border-color", "#D5D8DC");
  });
}
else
if(pincode=='')
{
	
	alert('Please Enter Pincode!');
	$("#pincode").css('border-color','red');
	
     $("#pincode").focus();
     $("#pincode").css('box-shadow','none');
     
     $("#pincode").css('border-color','red');
     $("#pincode").keypress(function(){
    $("#pincode").css("border-color", "#D5D8DC");
  });
}
else
  if(contact.length < 10)
  {
    alert("Invalid Phone Number !");
  }
  else
    if(pincode.length < 6)
    {
      alert("Invalid Pincode !");
    }
else
$.ajax({
url: 'myaccount.php',
type: 'post',

data:{
	fname1: fname,
	lname1: lname,
	contact1: contact,
	email1: email,
	address: address1,
	address2: address2,
	state1: state,
	city1: city,
	pincode1: pincode,
},
success: function(result){
	alert(result);
},

});
});
});
</script>
<script type="text/javascript">
	$(document).ready(function(){
$("#changeemail").click(function(){

var email = $("#email").val();
if(email == '')
{
alert('Enter Email-ID !');
$('#email').css('border-color','red');
$('#email').focus();
$('#email').css('box-shadow','none');
$('#email').keypress(function(){
$('#email').css('border-color','#D5D8DC');
});
}else
{
$.ajax({
url:'accemail.php',
type: 'post',
data:{
	email1 : email,
},
success: function(response){
	alert(response);
}
});
}
});
});
</script>
<script type="text/javascript">

	$(document).ready(function(){
    $('#changepass').click(function(){
     var curpass = $('#curpassword').val();
     var newpass = $('#newpassword').val();
     var conpass = $('#conpassword').val();
     
     	if(curpass=='')
     {
        alert("Enter Current Password..");
     }
     else
     	if(newpass=='')
     	{
     		alert("Enter New Password..");
     	}
     	else
     		if(newpass != conpass)
     {
     	alert("New Password and Confirm Password Should Be Equal !");
     }
     else
     	if(newpass==conpass)
     {
     	$.ajax({
          url: 'chngpass.php',
          type: 'POST',
          data: {
          	curpass1 : curpass,
          	newpass1: newpass,
          	conpass1: conpass,

          },
          success:function(response){
          	alert(response);
          },

     	});
     }

    });
	});
</script>

	</body>
	<?php include 'userfooter.php'?>