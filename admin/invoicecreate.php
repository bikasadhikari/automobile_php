<?php
require '../dbcon.php';
if(isset($_GET['sid']))
{
   $sid=$_GET['sid'];
  $search="SELECT * from serbill where sid='$sid'"; 
  $res=mysqli_query($con,$search);
  if($rows=mysqli_num_rows($res) > 0)
  {
    header("location: servicereqs.php?value=1");
    session_start();
    $_SESSION['billexists'] = "<script>alert('Invoice for this Service ID already created !');</script>";
  }
} 
 ?>

<?php

$connect = new PDO('mysql:host=localhost;dbname=throttleup', 'root', '');
if(isset($_POST['create_invoice']))
{
 
  for($count=0; $count<$_POST["total_item"]; $count++)
      {
 
  $statement = $connect->prepare("
          INSERT INTO serbill 
          (sid,name,qty,price,amount,final_amt)
          VALUES (:sid,:item_name,:order_item_quantity,:order_item_price,:order_item_final_amount,'".$_POST['tot']."')
        ");

    $statement->execute(
      array(
        ':sid'=> $_POST['order_no'],
        ':item_name' => trim($_POST['item_name'][$count]),
        ':order_item_quantity' => trim($_POST['order_item_quantity'][$count]),
        ':order_item_price' => trim($_POST['order_item_price'][$count]),
        ':order_item_final_amount'  => trim($_POST['order_item_final_amount'][$count]),
      ));
    }
    $tot1=$_POST['tot'];
    $orderid=$_POST['order_no'];
    $update="UPDATE service set totcost='$tot1' where sid='$orderid'";
    mysqli_query($con,$update);
    session_start();
    $_SESSION['billed'] = "<script>alert('Bill Generated..');</script>";
    header("location: servicereqs.php?value=1");
 } 
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
     <script src="../headers/jquery.js"></script>
  <script src="../headers/popper.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="../headers/facss/all.css">
 <link rel="stylesheet" type="text/css" href="../headers/v4-shims.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <style>
     
    </style>
  </head>
  <body>
    <style>
      .box
      {
      width: 100%;
      max-width: 1390px;
      border-radius: 5px;
      border:1px solid #ccc;
      padding: 15px;
      margin: 0 auto;                
      margin-top:50px;
      box-sizing:border-box;
      }

      *{
      	background: white;
      }
    </style>

 
    <div class="container-fluid">
      
      <form method="post" id="invoice_form" action="invoicecreate.php">
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <td colspan="2" align="center"><h2 style="margin-top:10.5px">Create Invoice</h2></td>
            </tr>
            <tr>
                <td colspan="2">
                      Service ID<br/>
                      <input type="text" name="order_no" id="order_no" readonly="" class="form-control input-sm" style="width: 10vw" value="<?php echo $_GET['sid']; ?>" />
                    <br/>
                  <table id="invoice-item-table" class="table table-bordered">
                    <tr align="center">
                      <th width="7%">Sr-No.</th>
                      <th width="20%">Item Name</th>
                      <th width="5%">Quantity</th>
                      <th width="5%">Price</th>
                      <th width="12.5%" rowspan="2">Total</th>
                      <th width="3%" rowspan="2"></th>
                    </tr>
                    <tr>
                     
                    </tr>
                    <tr  align="center">
                      <td><span id="sr_no">1</span></td>
                      <td><input type="text" name="item_name[]" id="item_name1" class="form-control input-sm" /></td>
                      <td><input type="text" name="order_item_quantity[]" id="order_item_quantity1" data-srno="1" class="form-control input-sm order_item_quantity" /></td>
                      <td><input type="text" name="order_item_price[]" id="order_item_price1" data-srno="1" class="form-control input-sm number_only order_item_price" /></td>
                     
                   
                      <td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount1" data-srno="1" readonly class="form-control input-sm order_item_final_amount" /></td>
                      <td></td>
                    </tr>
                  </table>
                  <div align="right">
                    <button type="button" name="add_row" id="add_row" class="btn btn-success btn-xs">+</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td align="right"><b>Total</td>
                <td align="right"><b><span id="final_total_amt"></span></b></td>
                <input type="hidden" name="tot" id="tot">
              </tr>
              <tr>
                <td colspan="2"></td>
              </tr>
              <tr>
                <td colspan="2" align="center">
                  <input type="hidden" name="total_item" id="total_item" value="1" />
                  <input type="submit" name="create_invoice" id="create_invoice" class="btn btn-info" value="Create" />
                </td>
              </tr>
          </table>
        </div>
      </form>
      <script>
      $(document).ready(function(){
        var final_total_amt = $('#final_total_amt').text();
        var count = 1;
        
        $(document).on('click', '#add_row', function(){
          count++;
          $('#total_item').val(count);
          var html_code = '';
          html_code += '<tr id="row_id_'+count+'">';
          html_code += '<td  align="center"><span id="sr_no">'+count+'</span></td>';
          
          html_code += '<td  align="center"><input type="text" name="item_name[]" id="item_name'+count+'" class="form-control input-sm" /></td>';
          
          html_code += '<td align="center"><input type="text" name="order_item_quantity[]" id="order_item_quantity'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_quantity" /></td>';
          html_code += '<td align="center"><input type="text" name="order_item_price[]" id="order_item_price'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_price" /></td>';
          
          html_code += '<td align="center"><input type="text" name="order_item_final_amount[]" id="order_item_final_amount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_final_amount" /></td>';
          html_code += '<td align="center"><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></td>';
          html_code += '</tr>';
          $('#invoice-item-table').append(html_code);
        });
        
        $(document).on('click', '.remove_row', function(){
          var row_id = $(this).attr("id");
          var total_item_amount = $('#order_item_final_amount'+row_id).val();
          var final_amount = $('#final_total_amt').text();
          var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
          $('#final_total_amt').text(result_amount);
          $('#tot').val(result_amount);
          $('#row_id_'+row_id).remove();
          count--;
          $('#total_item').val(count);
        });

        function cal_final_total(count)
        {
          var final_item_total = 0;
          for(j=1; j<=count; j++)
          {
            var quantity = 0;
            var price = 0;
            var actual_amount = 0;
            var item_total = 0;
            quantity = $('#order_item_quantity'+j).val();
            if(quantity > 0)
            {
              price = $('#order_item_price'+j).val();
              if(price > 0)
              {
                actual_amount = parseFloat(quantity) * parseFloat(price);
     			item_total = parseFloat(actual_amount);
                final_item_total = parseFloat(final_item_total) + parseFloat(item_total);
                $('#order_item_final_amount'+j).val(item_total);
              }
            }
          }
          $('#final_total_amt').text(final_item_total);
          $('#tot').val(final_item_total);
        }

        $(document).on('blur', '.order_item_price', function(){
          cal_final_total(count);
        });

        $('#create_invoice').click(function(){

          for(var no=1; no<=count; no++)
          {
            if($.trim($('#item_name'+no).val()).length == 0)
            {
              alert("Please Enter Item Name !");
              $('#item_name'+no).focus();
              return false;
            }

            if($.trim($('#order_item_quantity'+no).val()).length == 0)
            {
              alert("Please Enter Quantity !");
              $('#order_item_quantity'+no).focus();
              return false;
            }

            if($.trim($('#order_item_price'+no).val()).length == 0)
            {
              alert("Please Enter Price !");
              $('#order_item_price'+no).focus();
              return false;
            }

          }

          $('#invoice_form').submit();

        });

      });
      </script>
