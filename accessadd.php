<!DOCTYPE html>
<html>
<head>


<?php require 'dbcon.php' ?>

<?php include 'adminindex.php';?>
<head><title>Accessories add</title>

</head>
<body>
	<form action="accessaddcon.php" method="post" enctype="multipart/form-data">
		<div>
			<div>
				Category:
				
					<select name="category">
						<option value="Gear">Gear</option>
						<option value="Accessories">Accessories</option>
						<option value="Safety">Safety</option>
						<option value="Helmets">Helmets</option>
						<option value="Lubricants">Lubricants</option>
						<option value="others">Others</option>
					</select>
						</div><br>
				Brand:
				<input type="text" name="brand">
			</div><br>
		
			    <div>Product name:
			    <input type="text" name="name">
			</div><br>
			
				<div>Price:
				<input type="text" name="price"><br>
				
			</div>	<br>		
			<div>
				
				Image:
				<input type="file" name="image">
			</div><br>
			<div>
				
			
				
			<br>

					<input type="submit" name="submit" value="Submit" >	
		

	</form>
</body>
</html>