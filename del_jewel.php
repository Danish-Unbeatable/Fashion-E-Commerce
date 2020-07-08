<?php
	include('db/db.php');

	$id=$_GET['id'];
	$sql="DELETE FROM jewel WHERE id='$id'";
	if(mysqli_query($conn,$sql))
	{
		header('location:form2.php');
		echo "Delete Successful.";
	}
	else
	{
		echo "SORRY CAN'T DELETE.!!";
	}
?>