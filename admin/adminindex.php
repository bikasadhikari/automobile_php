<?php require '../dbcon.php'; ?>
<?php
session_start();
if(isset($_SESSION['loginsuccess']) && ! empty($_SESSION['loginsuccess']))
{
  echo $_SESSION['loginsuccess'];
  unset($_SESSION['loginsuccess']);
}
if(!isset($_SESSION['adminuser'])){
    header('Location: index.php');
}
?>
<html>
<head>
   <script src="../headers/jquery.js"></script>
  <script src="../headers/popper.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="../headers/facss/all.css">
 <link rel="stylesheet" type="text/css" href="../headers/v4-shims.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  
	<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
      *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;

      }
      hr
      {
        border:1px solid #17202A;
      }
a{
  text-decoration: none;
  color: #AAB7B8;
}
   
.dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 1.5vw;
  color: #AAB7B8;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}
.btn{
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 1.5vw;
  color: #AAB7B8;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
 .dropdown-btn:hover {
  color: #f1f1f1;

}
.btn:hover {
  color: #f1f1f1;

}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 1.5vw; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

  
.active {
  background-color:   ;
  color: white;
}

.dropdown-container {
  display: none;
  background-color: #17202A;
  padding-left: 40px;
  font-family: sans-serif;


  

}


.fa-caret-down {
  float: right;
  padding-right: 8px;
}

 
.dropdown-btn {
  cursor: pointer;
 
  position: relative;
  transition: 0.5s;
}
body{
  background: #D7BDE2;
}

    </style>


</head>
<body>
 
<div style="width: 20vw;min-height: 100%; background: #212F3C ;position: absolute;">
  <div>
  </div>
  <div style="font-size: 120%;color: white;">

    <ul style="font-size: 160%;text-align: center;background: #17202A  ;height: 70px;display: flex;justify-content: center;align-items: center;list-style-type: none;">
      
      <li style="color:#EBEDEF"><i class="fa fa-home"></i> Admin</li>
    
    </ul>

    <ul style="line-height: 35px;">

      <hr>
      <li style="font-size: 120%;text-align: center;height: 6%;justify-content: center;display: flex;align-items: center"><i class="fa fa-cogs" style="font-size:1.4vw"></i><span style="padding-left: 2%">Manage</span></li>
        <hr>
        <div style="color:#AAB7B8;list-style-type: none;position: relative;margin-top: 10px;margin-bottom:10px;">
          <div>
         <a class="btn" href="adminindex.php"><i class="fa fa-user-o"></i> <span>Customers </span>
  
  </a>
        </div>
          <button class="dropdown-btn"><i class="fa fa-motorcycle"></i> <span>Bikes </span>
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container" style="";>
    <a href="addbikes.php" class="dropdown-btn" style="font-size: 1.1vw;">Add / Update</a>
   
   
  </div>
  <button class="dropdown-btn"><i class="fa fa-thumbs-o-up"></i> <span>Subscription </span>
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container" style="";>
    <a href="addsubs.php" class="dropdown-btn" style="font-size: 1.1vw;">Add / Update</a>
   
  </div>
<button class="dropdown-btn"><i class="fa fa-shopping-basket"></i> <span>Accessories </span>
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container" style="";>
    <a href="accessadd.php" class="dropdown-btn" style="font-size: 1.1vw;">Add / Update</a>
    
  </div>
  <button class="dropdown-btn"><i class="fa fa-book"></i> <span>Orders </span>
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container" style="";>
    <a href="bikeorders.php" class="dropdown-btn" style="font-size: 1.1vw;">Bikes</a>
    <a href="subscriptionorders.php" class="dropdown-btn" style="font-size: 1.1vw;">Subscriptions</a>
    <a href="accessorders.php" class="dropdown-btn" style="font-size: 1.1vw;">Accessories</a>
    
  </div>

      <div>
         <a href="servicereqs.php" class="btn"><i class="fa fa-cog"></i> <span>Service Requests</span>
  
  </a>
        </div>
     
       
      </div>
      
</ul>
<hr>
<div  style="margin-top: 10px;margin-bottom: 10px;">
 <!-- <div>
 <button class="btn"><i class="fa fa-user-circle"></i> <span>My Account </span>
    
  </button>
  </div>-->
  <div>
    <a href="logout.php" class="btn"><i class="fa fa-sign-out"></i> <span>Logout </span>
    
  </a>
    
  </div>

</div>
<hr>
</div>


<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>

</div>
<div style="padding-left: 25%;background:#D7BDE2 ;min-height: 100vh;position: inherit; ">
<div style="width:70%;min-height: 87vh;background: white;margin-top: 3%;position: absolute;border-radius: 15px;">
 
  <?php
  $sql="SELECT * from registration";
  $res=mysqli_query($con,$sql);

  ?>
  <center>
  <h2 style="margin: auto; justify-content: center;margin-top: 2vh;font-size: 2.2vw"><u>Customers</u></h2></center>
 <div class="table-responsive" style="width: 90%;margin-top:0vh;margin-left:5%;position: relative; ">

  <input type="" name="" id="myInput" onkeyup="searchFun()" style="float: right;width: 13vw;margin-bottom: 2vh;border: 1px solid black" placeholder="search..">
        <table class="table table-bordered" id="myTable">
          <tr>
            <th width="6%"><center>Cus ID</center></th>
            <th width="10%"><center>Username</center></th>
            <th width="15%"><center>Email_ID</center></th>
            <th width="9%"><center>Status</center></th>
            <th width="10%"><center>Action</center></th>
          </tr>
          <?php
          while($rows=mysqli_fetch_assoc($res))
          {
          ?>
          <tr id="<?php echo $rows['cusid']; ?>">
            <?php
            $date= $rows['regdate'];
   $myinput=$date; $sqldate=date('d-m-Y',strtotime($myinput));?>
            <td data-target="cusid"><center><?php echo $rows['cusid'];?></center></td>
            <td data-target="username"><center><?php echo $rows['username'];?></center></td>
            <td data-target="email"><center><?php echo $rows['email'];?></center></td>
            <td data-target="userstatus"><center><?php echo $rows['userstatus'];?></center></td>
            <td><center><a href="#" style="color:green" data-id="<?php echo $rows['cusid'];?>" data-role="update">Edit</a><span style="margin: 5px;"></span><a href="userdelete.php?cusid=<?php echo $rows['cusid']; ?>" id="dalete" class="confirm" style="color: red">Delete</a></center></td>
            <td style="display: none" data-target="name"><?php echo $rows['name'];?></td>
            <td style="display: none" data-target="lname"><?php echo $rows['lname'];?></td>
            <td style="display: none" data-target="contact"><?php echo $rows['contact'];?></td>
            <td style="display: none" data-target="address"><?php echo $rows['address'];?></td>
             <td style="display: none" data-target="address2"><?php echo $rows['address2'];?></td>
              <td style="display: none" data-target="state"><?php echo $rows['state'];?></td>
               <td style="display: none" data-target="city"><?php echo $rows['city'];?></td>
               <td style="display: none" data-target="pincode"><?php echo $rows['pincode'];?></td>
               <td style="display: none"  data-target="regdate"><center><?php echo $sqldate;?></td>

          </tr>
          <?php
        }
        ?>
        </table>
      </div>
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
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Details</h4>  
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div class="row">
          
          <input type="" id="fname" class="form-control" style="width: 42%;margin-left: 15px;" placeholder="First Name">
          
          <input type="" id="lname" class="form-control" style="width: 42%;margin-left: 48px;" placeholder="Last Name">
        </div>
          <div style="margin-top: 15px;">
          <input type="" id="contact" class="form-control" style="margin-top: 15px;" placeholder="Contact">
          </div>
          <input type="" id="email" class="form-control" readonly="" placeholder="Email-ID" style="margin-top: 15px;">
       
          <input type="" id="address" class="form-control" placeholder="Address Line 1" style="margin-top: 15px;">
          <input type="" id="address2" class="form-control" placeholder="Address Line 2" style="margin-top: 15px;">
          <div class="row" style="margin-top: 15px;">
          
          <input type="" id="city" class="form-control" placeholder="City" style="width: 25%;margin-left: 15px; ">
          
          <input type="" id="state" class="form-control" placeholder="State" style="width: 25%;margin-left: 35px;">
          <input type="" id="pincode" class="form-control" placeholder="Pincode" style="width: 25%;margin-left: 55px;"> 
          <input type="hidden" id="cusid" >
          <div style="margin-top: 15px;width: 100%;margin-left: 15px">
          <p>Status:
          <select class="form-control" id="userstatus" style="width: 25%; ">
            <option value="Active">Active</option>
             <option value="Blocked">Block</option>           
             </select>
            </p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="rows" style="">

       <a href="" id="save" style="font-size: 1.6vw;color: green;text-decoration: none;text-align: center;margin-right: 172px;border-radius: 3px;border:1px solid green" class=""> <span style="color: white">..</span>Update<span style="color: white">..</span> </a>
        
      </div>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','a[data-role=update]',function(){
      var id = $(this).data('id');
      var username = $('#'+id).children('td[data-target=username]').text();
      var email = $('#'+id).children('td[data-target=email]').text();
      var contact = $('#'+id).children('td[data-target=contact]').text();
      var fname = $('#'+id).children('td[data-target=name]').text();
       var lname = $('#'+id).children('td[data-target=lname]').text();
       var address = $('#'+id).children('td[data-target=address]').text();
       var address2 = $('#'+id).children('td[data-target=address2]').text();
       var state = $('#'+id).children('td[data-target=state]').text();
       var city = $('#'+id).children('td[data-target=city]').text();
       var pincode = $('#'+id).children('td[data-target=pincode]').text();
        var userstatus = $('#'+id).children('td[data-target=userstatus]').text();
       $('#cusid').val(id);
      $('#email').val(email);
      $('#fname').val(fname);
      $('#lname').val(lname);
      $('#contact').val(contact);
      $('#address').val(address);
      $('#address2').val(address2);
      $('#state').val(state);
      $('#city').val(city);
      $('#pincode').val(pincode);
      $('#userstatus').val(userstatus);
      $('#myModal').modal('toggle');
    })
  });

  $('#save').click(function(){
    var cusid = $('#cusid').val();
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var contact = $('#contact').val();
    var email = $('#email').val();
    var address = $('#address').val();
    var address2 = $('#address2').val();
    var city = $('#city').val();
    var state = $('#state').val();
    var pincode = $('#pincode').val();
    var userstatus = $('#userstatus').val();
    $.ajax({
      url: 'cusupdate.php',
      type: 'post',
      data:{
            cusid: cusid,
            fname: fname,
            lname: lname,
            contact: contact,
            email: email,
            address: address,
            address2: address2,
            state: state,
            city: city,
            pincode: pincode,
            userstatus: userstatus,
      },
      success:function(response){
        if(response == 2)
        {
          alert("Fields Cannot be Blank !");
        }
        else
          if(response == 3)

          {
            alert("Invalid Phone Number");
          }
        else
        if(response==1)
        {
          alert("User Successfully Updated");
          window.location = "adminindex.php";
        }
        else
          if(response ==0)
            alert("Update Failed");
      },
      
    });
    return false
  });
</script>
<script type="text/javascript">
  /*confirm("Is this your product?\n\n " + var);*/
    var elems = document.getElementsByClassName('confirm');
    var confirmIt = function (e) {
        if (!confirm('Are you sure? This User will be deleted Permanently !')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>
</script>
</body>
</html>
