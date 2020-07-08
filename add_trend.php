<?php
	include('../db/db.php');
	if(isset($_POST['submit']))
	{

		$pname=$_POST['pname'];
		$price=$_POST['price'];
		$desc=$_POST['desc'];
		$brand=$_POST['brand'];
		$avail=$_POST['availability'];
		$size=$_POST['size'];

		$b=implode(",",$size);
		echo $b;


		//for image
		$file_name=$_FILES['image']['name'];
		$file_type=$_FILES['image']['type'];
		$file_size=$_FILES['image']['size'];
		$file_temp_loc=$_FILES['image']['tmp_name'];
		$destinationfile='new_images/'.$file_name;
		move_uploaded_file($file_temp_loc, $destinationfile);


		$sql = "INSERT INTO trends(product,price,des,brand,size,availability,img) VALUES 
		('$pname','$price','$desc','$brand','$b','$avail','$destinationfile')";
		if(mysqli_query($conn, $sql))
		{
			echo "Add Success";
			//header("location:form1.php");
		}
		else{
			echo "something is wrong";
		}
	}
?>