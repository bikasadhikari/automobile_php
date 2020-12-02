
<?php 
include 'adminheader.php';
require '../dbcon.php';
?>
<?php
if(isset($_SESSION['loginsuccess']) && ! empty($_SESSION['loginsuccess']))
{
  echo $_SESSION['loginsuccess'];
  unset($_SESSION['loginsuccess']);
}
if(!isset($_SESSION['adminuser'])){
    header('Location: index.php');
}
?>  

<head>
<style type="text/css">
	.button {
  background-color: #008CBA; 
  color: white;
  height: 6vh;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  border-color: #008CBA; 
}
.button:hover {
 background-color: white; 
  color: black; 
  border: 2px solid #008CBA;


}
.update a{
	color: green;

}

</style></head>
<div style="padding-left: 25%;background:#D7BDE2 ;height: 100vh;position: inherit;">
<div style="width:70%;height: 89vh;overflow-y: auto; background: white;margin-top: 3%;position: absolute;border-radius: 15px;">

  <center>
  <h2 style="margin: auto; justify-content: center;margin-top: 2vh;font-size: 2.2vw"><u>Manage Accessories</u></h2></center>
  


<?php
 if(isset($_GET['id']))
 {
  $id1=$_GET['id'];
  $sqls="SELECT * from accessories where id='$id1'";
  $ress=mysqli_query($con,$sqls);
  if($rowss=mysqli_fetch_assoc($ress))
{
  $img=$rowss['image'];
  $imgpath="../".$img."";
    ?>

    <form method="POST" action="accessupdate.php" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $rowss['id']; ?>">
  <div class="table-responsive" style="width: 63vw;margin-top:0px;margin-left:5%;position: relative;margin-top: 6vh;border: 1px solid #CCD1D1; ">
  <table class="table table-bordered" id="add" style="margin-top: 2vh;margin-bottom: 3vh;">
    <tr>
            <td width="20%">
                 Category<center><input type="text" class="form-control" name="category" readonly="" style="height:4.5vh " value="<?php echo $rowss['category']; ?>"/></center></td>
                   
            <td width="20%" style="">
              Brand<center><input type="text" class="form-control" name="brand" readonly="" required=""style="height:4.5vh " value="<?php echo $rowss['brand']; ?>"/></center></td>
            <td width="20%">
              Product Name<center><input type="text" class="form-control" required="" readonly="" name="name" style="height:4.5vh " value="<?php echo $rowss['name']; ?>"/></center></td>
              
                
              <td width="20%">
                price<center><input type="text" class="form-control" required="" name="price" style="height:4.5vh" value="<?php echo $rowss['price']; ?>"/></center></td>
                <input type="hidden" name="image1" value="<?php echo $rowss['image']; ?>">
          </tr>
          <tr>
            
              
              <td width="20%">

                Stock<center><input type="text" class="form-control" name="stock"  required="" style="height:4.5vh" value="<?php echo $rowss['stock']; ?>"/></center></td>
            
               <td colspan="2">Display<select name="display" class="form-control" required=""  style="height:5.1vh;font-size:0.9vw;width: 32vw" />
                <option value="<?php echo $rowss['display']; ?>">Selected <?php echo $rowss['display']; ?></option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
           
            
            </select>
          </td>
              
              
          </tr>
          <tr>
          
            
              
               
          </tr>
          <tr>
        <td width="20%" style=""> 
              Image<input type="file" class="form-control-file" name="image"  style="width: 15vw" /><span class="" style="font-size: 0.9vw;margin-top: auto;color: grey">(Leave this field if image is not to be updated)</span></td>
             <td width="20%"> <img src="<?php echo $imgpath; ?>" width="100"></td><tr>
              <tr>
            <td colspan="4"><center><a href="accessadd.php" style="color:green">Back..</a>
              <input type="submit" name="update" value="Update" class="button" style="width: 7vw;margin-left: 4% "></center></td>
           </tr>
      </table>
    </div>
  </form>
  <?php
}
}
else
{
  ?>
    <form method="POST" action="access.php" enctype="multipart/form-data">
  <div class="table-responsive" style="width: 63vw;margin-top:0px;margin-left:5%;position: relative;margin-top: 1vh;border: none; ">
  <table class="table table-bordered" id="add" style="">
          <tr>
          	<td width="20%">
            		Category<center><select name="category" class="form-control" style="height:5vh;font-size:1vw">
						<option value="Gear">Gear</option>
            <option value="Accessories">Accessories</option>
            <option value="Safety">Safety</option>
            <option value="Helmets">Helmets</option>
            <option value="Lubricants">Lubricants</option>
            <option value="others">Others</option>
					</select></center></td>
            <td width="20%" style="">
            	Brand<center><input type="text" class="form-control" required="" name="brand"  style="height:4.5vh "></center></td>
            <td width="20%">
            	Product Name<center><input type="text" class="form-control" name="name" required="" style="height:4.5vh "></center></td>
            	
            		
            	<td width="20%">
            		price<center><input type="text" class="form-control" name="price" required="" style="height:4.5vh"></center></td>
          </tr>
          <tr>
            <td colspan="3" width="20%" style="">
            	Image<input type="file" class="form-control-file" name="image" required="" style="width: 15vw"></td>
            	<td width="20%">
            		Stock<center><input type="text" class="form-control" name="stock" required="" style="height:4.5vh"></center></td>
            	
            	
          </tr>
         
          	<td colspan="4"><center><input type="submit" name="add" value="Add" class="button" style="width: 7vw">
          		<!--<input type="submit" name="update" value="Update" class="button" style="width: 7vw;margin-left: 4% ">--></center></td>
           </tr>
        
      </table>
<?php

?>
</div>
</form>

 <div class="table-responsive" style="width: 90%;margin-top:0vh;margin-left:5%;position: relative;overflow-y: auto;">
  <input type="" name="" id="myInput" onkeyup="searchFun()" style="float: right;width: 13vw;margin-bottom: 2vh;border: 1px solid black" placeholder="search.." style="">
        <table class="table table-bordered" id="myTable" style="font-size: 1.1vw">
        	<thead>
          <tr>
            <th width="6%"><center>Category</center></th>
            <th width="10%"><center>Brand</center></th>
            <th width="15%"><center>Product Name</center></th>
            <th width="9%"><center>Stock</center></th>
            <th width="10%"><center>Action</center></th>
          </tr>
          </thead>
         
          <tbody>
          	 <?php
          $sql="SELECT * from accessories";
          $res=mysqli_query($con,$sql);
          while($rows=mysqli_fetch_assoc($res))
          {
          ?>
          <tr>
          	<td><center><?php echo $rows['category']; ?></center></td>
          	<td><center><?php echo $rows['brand']; ?></center></td>
          	<td><center><?php echo $rows['name']; ?></center></td>
          	<td><center><?php echo $rows['stock']; ?></center></td>
          	
          	<td><center><span class="update"><a href="accessadd.php?id=<?php echo $rows['id']; ?>">View</a></span></center></td>
          	 
          </tr>
          <?php
      }
      }
      ?>
          </tbody>
         
  </div>
</table>
 <script>
       function searchFun()
       {
        let filter = document.getElementById('myInput').value.toUpperCase();
        let myTable = document.getElementById('myTable');
        let tr = myTable.getElementsByTagName('tr');

        for(i=0;i<tr.length;i++)
        {
          let td0 = tr[i].getElementsByTagName('td')[0];
          let td1 = tr[i].getElementsByTagName('td')[1];
          let td2 = tr[i].getElementsByTagName('td')[2];
          let td3 = tr[i].getElementsByTagName('td')[3];

          if(td1 || td2 || td0 || td3)
          {
            let textvalue1 = td1.textcontent || td1.innerHTML;
            let textvalue2 = td2.textcontent || td2.innerHTML;
            let textvalue3 = td0.textcontent || td0.innerHTML;
            let textvalue4 = td3.textcontent || td3.innerHTML;
            if(textvalue1.toUpperCase().indexOf(filter) > -1 || textvalue2.toUpperCase().indexOf(filter) > -1 || textvalue3.toUpperCase().indexOf(filter) > -1 || textvalue4.toUpperCase().indexOf(filter) > -1)
            {
              tr[i].style.display = "";
            }
            else{
              tr[i].style.display = "none";
            }
          }
        }
        }
      </script>
  </div>

  </div>


</body>
</html>
<?php
if(isset($_SESSION['bikeadd']) && ! empty($_SESSION['bikeadd']))
{
  echo $_SESSION['bikeadd'];
 unset($_SESSION['bikeadd']);
 
}
?>
<?php
if(isset($_SESSION['bikeaddfail']) && ! empty($_SESSION['bikeaddfail']))
{
  echo $_SESSION['bikeaddfail'];
 unset($_SESSION['bikeaddfail']);
 
}
?>
<?php
if(isset($_SESSION['saleupdate']) && ! empty($_SESSION['saleupdate']))
{
  echo $_SESSION['saleupdate'];
 unset($_SESSION['saleupdate']);
 
}
?>