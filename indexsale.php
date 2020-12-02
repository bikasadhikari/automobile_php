

<?php include 'userheader.php' ?>
<?php
error_reporting(E_ALL & ~E_NOTICE);
$con=mysqli_connect('127.0.0.1','root','','throttleup');

$query="SELECT * from sales where display='yes'";
$result=mysqli_query($con,$query);


?>

<!DOCTYPE html>
<html>
<head>
<title>BUY</title>	
<link rel="stylesheet" type="text/css" href="indexsale1.css">

<script>



	function searchFun() {
		let input = document.getElementById('search').value;
		input = input.toLowerCase();
		let x = document.getElementsByClassName('block');
        

	

		for(i=0;i<x.length;i++){

		
			if(!x[i].innerHTML.toLowerCase().includes(input))
			{
				x[i].style.display="none";


			}
			else
			{	
				x[i].style.display="inline-block";

            }

         
   }
   

}


		

	
</script>
<script type="text/javascript">
	 function onlyAlphanum(e){
        var x=e.which||e.keycode;
        if((x>=97 && x<=122) || (x>=65 && x<=90) || x==32 || (x>=48 && x<=57))
            return true;
        else
            return false;
    }
   
    		  
</script>
</head>
<body onload="function1();">
	 
	  	<?php
session_start();	


?>
        
<input type="hidden" id="view">
	<form class="form-inline d-flex justify-content-center md-form form-sm active-purple active-purple-2 mt-2">
  <i class="fa fa-search" aria-hidden="true"></i>
  <input class="form-control form-control-sm ml-3 w-75" type="text" maxlength="15" onkeypress='return onlyAlphanum(event);' id="search" placeholder="Search"
    aria-label="Search" maxlength="15" onkeyup="searchFun()">
</form>
		 		

		
	<section>
		<ol id='list'>
			
			<?php
	while($rows=mysqli_fetch_assoc($result))
	{

		?>

<li class="block">
	<?php echo "<img src='".$rows['image']."' width='260' height='190' >"?><br>
		<input type="hidden" class="stock" id="stock" name="stock" value=<?php echo $rows['stock']; ?>>	
		<div class="stockmsg" id="stockmsg" style="width: 100%;position: absolute; height: 35px;top: 48%; background-color: rgba(0,0,0,0.5); font-size: 120%; color: white;">
			<?php
			if($rows['stock'] == 0)
			{
				echo "Out Of Stock";

			} 
			else
				echo "In Stock";
			?>
		</div> 
			<b class="row1"> <u>Company</u><!--<span style="padding:2px;"></span>-->: </b><?php echo $rows['company']; ?><br>
			<b class="row2"><u> Model</u><!--<span style="padding: 15px"></span>-->:  </b><?php echo $rows['model']; ?><br>
			<b class="row4"> <u>  Price</u><!--<span style="padding: 19px"></span>-->: </b>₹<?php echo $rows['price']; ?><br></a>
		
			
			
                <form action="buybtn.php" method="POST" id="btnform">
                	<input type="hidden" name="id" id="viewid" value=<?php
                    echo $rows['id']; ?> >
                	
                <input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>">
				<input type="submit" name="detailsbtn" id="btn" value=" Details " class="btn btn-primary" style="margin-bottom: 10px;margin-top: 10px; ">


			</form>	</li>
					<?php

	}
	?></ol>


	</section>





</body>
</html>
<br>
<?php include 'userfooter.php' ?>
