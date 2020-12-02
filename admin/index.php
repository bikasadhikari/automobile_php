<html>

<head>
	<script type="text/javascript" src="../headers/jquery.js"></script>
	<title>Admin Login</title>
<style type="text/css">
	*{
		padding: 0;
		margin: 0;
		box-sizing: border-box;
	}
	body
	{
		background: #F0F3F4;
		position: relative;
	}
	.container .input input
	{
		width: 60%;
		height: 30px;
		font-family: serif;
		margin-top: 25px;
		font-size: 100%;
		padding-left: 8px;
		outline: none;

	}
	button {
		background-color: skyblue;
  transition-duration: 0.4s;
  border-color: skyblue;
  outline: none;
}

button:hover {
  background-color: #4CAF50; /* Green */
  color: black;
  border-color: #4CAF50;
}

</style>
	</head>
	<body>
		<nav style="height:11%;width:100%;background:#2E4053 ;">
			<img src="../logo.png" style="width: 7%;margin-top:-0.8%;position: absolute;">
		</nav>
		<br><br><br>
		<div class="container" style=" width: 400px;height:300px;background: white;overflow: auto;margin: 0 auto;border-radius: 10px;border: 1px solid #BDC3C7 ">
			<div style="font-size: 120%"><center><br>
         <h2><u>Admin</u></h2></center>
     </div>
     <center><div class="input" style="margin-top: 5%;">
     	
     	<p >
     		<input type="text" name="username" id="username" autocomplete="off" placeholder="Enter Username"></p>
     	<p><input type="password" name="password" id="password" placeholder="Enter Password"></p>
     	<p style="margin: 25px;"><button id="login" style="margin-top: 10px;width: 25%;height: 10%;font-size: 105%;border-radius: 5px;">Login</button>
     </div></center>

     <script type="text/javascript">
     	$(document).ready(function(){
     		$('#login').click(function(){
     			var username = $('#username').val();
     			var password = $('#password').val();
     			if((username == '') || (password == ''))
     			{
     				alert("Please enter Username and Password !");
     			}else
     			{
     			$.ajax({
     				url: 'adminlogin.php',
     				type: 'post',
     				data: {
     					username: username,
     					password: password,
     				},
     				success:function(response){
     					 if(response == '1'){
                        window.location = "adminindex.php";
                    }
                    else
                    {
                       alert("Invalid username and password!");
                    }
     				},
     				
     			});
     		}
     		
     		});
     	});
     </script>
		</div>
<footer style="position: fixed; height:40px;width:100%;background: #2E4053 ;bottom: 0px;">
		</footer>
		
	</body>
	
	</html>