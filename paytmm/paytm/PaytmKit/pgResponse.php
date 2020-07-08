<?php
session_start();
include('../../../db/db.php');
?>
<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your applications MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
    //echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
    if ($_POST["STATUS"] == "TXN_SUCCESS") {
      //  echo "<center><center>" ;
        /*echo "<center><h1>Payment Details</h1><center>" ;
        echo "<h3>Order Id :".$_POST['ORDERID'] . "<br/>";
        echo "Amount :".$_POST['TXNAMOUNT'] . "<br/>";
        echo "Status :".$_POST['STATUS'] . "<br/>";
        echo "Date :".$_POST['TXNDATE'] . "<br/>";*/
                
            

                $result=mysqli_query($conn,"SELECT distinct name  FROM cart where email='{$_SESSION['name']}'; ");
                while($row=mysqli_fetch_array($result))
                {
                
                ?>
                <center>
                <div class="card">
                <h1>Thank You</h1>
                <h3>Hello <?php echo $row['name']?> Your payment process is successfully completed you can continue your shopping...</h3>
                <a href="delete_payment_cart.php" class="btn btn-danger">Continue Shipping</a>
        
                </div></center>
                
                
        <?php
        //Process your transaction here as success transaction.
        //Verify amount & order id received from Payment gateway with your application's order id and amount.
        //$conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");

        $sql="UPDATE cart_details SET status='Paid' where Email='{$_SESSION['name']}'";
            if(mysqli_query($conn,$sql))
            {

            }
            else
            {
                
            }
        
    
    }
    }
    else {
        echo "<b>Transaction status is failure</b>" . "<br/>";
        $sql="UPDATE cart_details SET status='Not Paid' where Email='{$_SESSION['name']}'";
            if(mysqli_query($conn,$sql))
            {

            }
            else
            {
                
            }
        
        
    }
    
            
    
}


else {
    echo "<b>Checksum mismatched.</b>";
    //Process transaction as suspicious.
}

?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <style>
            h1{
                color:green;
            }
            body{
                background-color:#efefef;
            }
            .card{
                background-color: #fffff;
                width: 1000px;
                margin-top: 250px;
            }
            .btn-danger{
                width: 300px;
                margin-left: 350px;
                margin-top: 20px;
                margin-bottom: 20px;
            }

        </style>
    </head>
</html>
