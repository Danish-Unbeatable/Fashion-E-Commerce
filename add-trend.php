<?php
	include('../db/db.php');
	if(isset($_POST['submit']))
	{

		$pname=$_POST['pname'];
		$price=$_POST['price'];
		$desc=$_POST['desc'];
		//for image


		$sql = "INSERT INTO trends(product,price,des) VALUES ('$pname','$price','$desc')";
		if(mysqli_query($conn, $sql))
		{
			echo "Add Success";
			header("location:form1.php");
		}
		else{
			echo "something is wrong";
		}
	}
?>