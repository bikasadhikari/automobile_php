<html>
<?php include 'adminindex.php';?>
<head><title>Subscribe</title>

</head>
<body>
	<form action="subscribe.php" method="post" enctype="multipart/form-data">
		<div>
				Company:
				<input type="text" name="company">
			</div><br>
		
			    <div>Model:
			    <input type="text" name="model">
			</div><br>
			
				<div>Price:
				<input type="text" name="onemon"><br>
				<input type="text" name="threemon">
			<input type="text" name="sixmon"><br>
		<input type="text" name="twelvemon"><br>
		<input type="text" name="twofourmon"><br>
			</div>	<br>		
			<div>
				Image:
				<input type="file" name="image">
			</div><br>
			<div>
				Engine CC:
				<input type="text" name="enginecc">
			</div><br>
			
				
			<div>
				Category:
				
					<select name="category">
						<option value="Supersports">Supersports</option>
						<option value="Naked">Naked</option>
						<option value="Adventure">Adventure</option>
						<option value="Cruiser">Cruiser</option>
						<option value="other">Other</option>
					</select>
						</div><br>

					<input type="submit" name="submit" value="Submit" >	
		

	</form>
</body>
</html>