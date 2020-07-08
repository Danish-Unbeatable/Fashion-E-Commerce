<?php
include('db/db.php');
?>
<?php
	if(!$conn)
	{
		die("connection error");
	}
	else
	{
		$id=0;
		$name='';
		$price='';
		$description='';
		$img='';

		$update=false;
		if(isset($_GET['edit']))
		{
			$id=$_GET['edit'];
			$update=true;
			$result=mysqli_query($conn, "SELECT * FROM trends where id='$id'");
			while($row=mysqli_fetch_array($result))
			{
				$img=$row['img'];
				$name=$row['product'];
				$price=$row['price'];
				$description=$row['des'];
			}
			
		}

		if(isset($_POST['update']))
		{
			$id=$_POST['id'];
			$name=$_POST['pname'];
			$price=$_POST['price'];
			$description=$_POST['desc'];
			$brand=$_POST['brand'];
			$avail=$_POST['availability'];
			//for image
			$file_name=$_FILES['image']['name'];
			$file_type=$_FILES['image']['type'];
			$file_size=$_FILES['image']['size'];
			$file_temp_loc=$_FILES['image']['tmp_name'];
			$destinationfile='new_images/'.$file_name;
			move_uploaded_file($file_temp_loc, $destinationfile);


			$sql = "UPDATE trends SET product='$name',price='$price',des='$description',brand='$brand',availability='$avail',
			 img='$destinationfile' WHERE id='$id'";
		
			if(mysqli_query($conn, $sql))
			{
				echo "<script>
				alert('updated successfully');
				</script>";
			}
			else{
				echo "error:" . $sql . "<br>" .mysqli_error($conn);
			}
		}
	}
?>
<?php
	include('db/db.php');
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
			header("location:form1.php");
		}
		else{
			echo "something is wrong";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin product form</title>
    <meta name="viewport" content="width=device-width,initial scale=1.0">
    <!--<link rel="stylesheet" href="ad1.css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" ></script>
    <style>
	    * {
	    margin: 0;
	    padding: 0;
		box-sizing: border-box;
		list-style: none;
		text-decoration: none;
		font-family: 'Comic Sans MS';
		}
		body
		{
			background: #f3f5f9;
		}
		.wrapper
		{
			display: flex;
			position: relative;
		}
		.wrapper .sidebar
		{
			position: fixed;
			width: 200px;
			height: 100%;
			background: black;
			padding:30px 0;
		}
		.wrapper .sidebar h2{
			color: #fff;
			text-transform: uppercase;
			text-align: center;
			margin-bottom: 30px;
		}
		.wrapper .sidebar ul li
		{
			padding: 15px;
			border-bottom: 1px solid rgba(0,0,0,0.05);
			border-top: 2px solid rgba(225,225,225,0.5);
		}
		.wrapper .sidebar ul li a
		{
			color: white;
			display: block;
		}
		.wrapper .sidebar ul li a .fa
		{
			width: 25px;

		}
		.wrapper .sidebar ul li:hover
		{
			background:#696969;
		}
		.wrapper .sidebar ul li:hover a
		{
			color: #fff;
		}
		.wrapper .sidebar .social-media
		{
			position: absolute;
			bottom: 0;
			left: 50%;
			transform: translate(-50%);
			display: flex;
		}
		.wrapper .sidebar .social-media a{
			display: block;
			width: 40px;
			background: #2F4F4F;
			height: 40px;
			line-height: 40px;
			text-align: center;
			margin: 0 5px;
			color: #fff;
			border-top-right-radius: 5px;
			border-top-left-radius: 5px;
		}
		.wrapper .main-content
		{
			width: 100%;
			margin-left: 250px;
		}
		.wrapper .image img
		{
			width:350px;
			height:550px;
			padding-top:  50px;
		}
		@media (max-width: 550px)
		{
	    .wrapper .sidebar
		{
			width: 130px;
		}
		.wrapper .sidebar .social-media a{
			display: block;
			width: 30px;
			height: 30px;
			margin: 0 4px;
			line-height: 30px;
			}
		.wrapper .main-content
		{
		width: 100%;
		margin-left: 150px;
		}
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<div class="sidebar">
			<h2>ADMIN</h2>
			<ul>
				<li><a href="form1.php"><i class="fa fa-circle"></i>Trends</a></li>
				<li><a href="form2.php"><i class="fa fa-circle"></i>Jewellary</a></li>
				<li><a href="view_orders.php"><i class="fa fa-circle"></i>Orders</a></li>
				
				<li><a href="#"><i class="fa fa-circle"></i>LogOut</a></li>
			</ul>
			<div class="social-media">
				<a href="#"><i class="fa fa-instagram"></i></a>
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
			</div>
		</div>
		<div class="main-content">
	       	<form action="form1.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $id;?>">

	        	<h3>TRENDS</h3>
	        	<div class="col-md-6">
		            <div class="form-group">
		                <label><b>Product Name</b></label>
		                <input type="text" name="pname"  value="<?php echo $name;?>" class="form-control" />
		            </div>
		            <div class="form-group">
		                <label><b>Price</b></label>
		                <input type="text" name="price" value="<?php echo $price;?>" class="form-control" />
		            </div>
		            <div class="form-group">
		                <label><b>Description</b></label>
		                <input type="text" name="desc" value="<?php echo $description;?>" class="form-control" />
		            </div>
		            <div class="form-group">
		                <label><b>Brand</b></label>
		                <select class="form-control" name="brand">
		                	<option>----Choose BRAND----</option>
							<option value="H&M">H&M</option>
							<option value="ALLEN SOLLY">ALLEN SOLLY</option>
							<option value="LEVIS">LEVIS</option>
							<option value="BIBA">BIBA</option>
							<option value="AND">AND</option>
							<option value="ZARA">ZARA</option>
							<option value="WESTSIDE">WESTSIDE</option>
		                </select>
		            </div>
		            <div class="form-group">
		            	<label><b>Size</b></label><br>
		            	<input type="checkbox" name="size[]" value="S">S
		            	<input type="checkbox" name="size[]" value="M">M
		            	<input type="checkbox" name="size[]" value="L">L
						<input type="checkbox" name="size[]" value="XL">XL


		            </div>
		            <div class="form-group">
		                <label><b>Availability</b></label>
		                <select class="form-control" name="availability">
							<option value="In Stock">In Stock</option>
							<option value="Not In Stock">Not In Stock</option>
						</select>
		            </div>
		            <div class="form-group">
		                <label><b>Image</b></label>
		                <input type="file"  name="image" value="<?php echo $img;?>" class="form-control" />  
		            </div>
		            <?php
		            	if($update==true):
		            ?>
					<div class="form-group">
		                <button type="submit"  name="update" class="btn btn-warning" required/>Update</button> 
		            </div>
		            <?php else: ?>

		            <div class="form-group">
		                <input type="submit" value="SUBMIT" name="submit" class="btn btn-warning" /> 
		            </div>
		            <?php endif; ?>
	        	</div>
	        	
	       	</form>
	       	<div class="container">
	       	<table class="table table-bordered table-striped table-condensed table-hover ">
	       	
		        <tr>
		            <th>ID</th>
		            <th>PRODUCT</th>
		            <th>PRICE</th>
		            <th>DESCRIPTION</th>
		            <th>BRAND</th>
		            <th>SIZE</th>
		            <th>AVAILABILITY</th>
		            <th>IMAGE</th>
		            <th>UPDATE</th>
		            <th>DELETE</th>
		        </tr>
		        <tr>
		        	<?php
                    $sql="SELECT * FROM trends ";
                    $result=mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)>0)
                    {
                        foreach($result as $row)
                    {
                	?>
			            <td><?php echo $row['id']?></td>
			            <td><?php echo $row['product']?></td>
			            <td> Rs.<?php echo $row['price']?></td>
			            <td><?php echo $row['des']?></td>
			            <td><?php echo $row['brand']?></td>
			            <td><?php echo $row['size']?></td>
			            
			            <td><?php echo $row['availability']?></td>
			            <td><img src="<?php echo $row['img']?>" height=100px  width=100px></td>
			            <td><a href="form1.php?edit=<?=$row['id']?>" class="btn btn-primary" /> UPDATE </a> </td>
			            <td><a href="del.php?id=<?=$row['id']?>" class="btn btn-danger" /> DELETE </a></td>
		        </tr>
			        <?php
			    		}}
			    	?>
	       	</table>
	       </div>
    	</div>	
				
		</div>
	</div>
</body>
</html>