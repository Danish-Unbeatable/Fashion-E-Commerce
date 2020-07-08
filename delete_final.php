<?php
include('db/db.php');
if($_GET['Name']){
$name=$_GET['Name'];
$sql="DELETE FROM cart_details WHERE name='$name'";
if(mysqli_query($conn,$sql))
{
	header('location:view_orders.php');
}
else{
	echo "error";
}
}
?>