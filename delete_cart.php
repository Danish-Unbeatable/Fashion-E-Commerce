<?php
include('db/db.php');
$id=$_GET['id'];
$sql="DELETE FROM cart WHERE id='$id'";
if(mysqli_query($conn,$sql))
{
	header('location:add_cart.php');
}
else
{
	echo"Data not deleted";
}
?>