<?php
$con=mysqli_connect('localhost','root','','throttleup');
$query="SELECT * from subscribe where display='yes'";
$result=mysqli_query($con,$query);
?>
<html>
<?php include 'userheader.php';?>
<head>
	 <link href="indexsubs.css" type="text/css" rel="stylesheet">
   <style type="text/css">

   </style>
<script type="text/javascript">
   function onlyAlphanum(e){
        var x=e.which||e.keycode;
        if((x>=97 && x<=122) || (x>=65 && x<=90) || x==32 || (x>=48 && x<=57))
            return true;
        else
            return false;
    }
</script>
 
  
<script>



	function searchFun() {
		let input = document.getElementById('search').value;
		input = input.toLowerCase();
		let x = document.getElementsByClassName('con');


	

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
</head>
<body onload="function1();">
	<br>
	<form class="form-inline d-flex justify-content-center md-form form-sm active-purple active-purple-2 mt-2">
  <i class="fa fa-search" aria-hidden="true"></i>
  <input class="form-control form-control-sm ml-3 w-75" type="text" maxlength="15" onkeypress='return onlyAlphanum(event);' id="search" placeholder="Search"
    aria-label="Search" onkeyup="searchFun()">
</form>
<section>

<?php
    while($rows=mysqli_fetch_assoc($result))
    {

        ?>
   <span class="con">     
 <div class="container">

                
        
        <div class="row">

            <div class="product-grid">
        
                <input type="hidden" name="id" value=<?php echo $rows['id'];?>>
                <a href="indexsubsbook.php?value=<?php echo $rows['id'];?>">
                    <img  width="260" height="200" src=<?php echo $rows['image']; ?> >
                </a>
                <div style="width: 100%; background: rgba(0,0,0,0.8);color: white;text-align: center;position: static;top: 50%;">
              <?php
                if($rows['stock'] == 0)
                {
                  echo "Not Available";
                }
                else
                {
                  echo "Available";
                }
              ?>
               </div>
                   <h5 class="title"><a class="hover" href="indexsubsbook.php?value=<?php echo $rows['id'];?>" ><i class="fa fa-building-o" style="font-size:17px;margin-left: 5px;"></i> <?php echo "Company:".$rows['company']; ?></span></a><br> 
                             <a class="hover" href="indexsubsbook.php?value=<?php echo $rows['id'];?>"><i class="fa fa-motorcycle" style="font-size:17px;margin-left: 5px"></i> <?php echo "Model:".$rows['model']; ?></a>
                        <div class="price"><i class="fa fa-money" style="font-size:17px;margin-left: 5px"></i> ₹<?php echo $rows['bikeprice'] * (18/100) / 12 ; ?>/mon</h5></div>
        </div>
    </div>
</span>
    <?php
}
?>     
     
</div>
 


</section>
<?php include 'userfooter.php';?>



</body>

</html>
