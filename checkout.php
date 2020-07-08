<?php
include('db/db.php');
session_start();
if(isset($_POST['submit']))
{
	$sql="INSERT INTO cart_details(id, product_id, product_img, product_name, product_price, product_quant, name, mobile, address, email, status, total) SELECT * FROM cart where email='{$_SESSION['name']}'";
		if(mysqli_query($conn,$sql))
		{
			//header('location:add_cart.php');
		}
		else{
			//echo "error";
		}
}
?><?php

if(isset($_POST['grand'])){
$amount="";    
    $amount=$_POST['grand'];
    
    
    
}
?>
<html>
    <head>
        <title>Canteen Management Services</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.mon.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--get bootstrap dependencies-->
<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<!--font awesome dependencies-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"> </script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    
</style>
    </head>
    <body>
        <center>
        <h3><b>Thank you for purchasing with us!</b></h3>
        </center>
        
        <form method="post" action="paytmm/paytm/PaytmKit/pgRedirect.php">
            <center>
		<table class="table table-striped">
			<tbody>
				<tr>
					<th>S.No</th>
					<th>Label</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>1</td>
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>" >
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>CUSTID ::*</label></td>
					<td><input id="CUST_ID"class="form-control" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo  "CUST" . rand(10000,99999999)?>" ></td>
				</tr>
				<tr>
					<td>3</td>
					<td><label>INDUSTRY_TYPE_ID ::*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" class="form-control"value="Retail" ></td>
				</tr>
				<tr>
					<td>4</td>
					<td><label>CHANNEL ::*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12"class="form-control" name="CHANNEL_ID" autocomplete="off" value="WEB" >
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td><label>TXN AMOUNT::*</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text"class="form-control" name="TXN_AMOUNT"
						value="<?php echo $amount; ?>" >
					</td>
				</tr>
				
				<tr>
					<td></td>
					<td></td>
					<td><input value="CheckOut" type="submit" class="btn btn-danger"	onclick=""></td>
				</tr>
			</tbody>
		</table>
		</center>
	</form>
    </body>
</html>