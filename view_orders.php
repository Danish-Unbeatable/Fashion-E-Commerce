<?php
include('db/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin jewellary form</title>
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
		<div class="container">
			<h3>ORDERS</h3>
	        	
			<table class="table table-bordered table-striped table-condensed table-hover ">
				<tr>
					<th>NAME</th>
					<th>VIEW</th>
					<th>DELETE</th>
					
				</tr>
				<?php
				$sql="SELECT distinct name FROM cart_details ";
                    $result=mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)>0)
                    {
                    	
                        foreach($result as $row)
                        	
                    {
                 ?>
                 <tr>
                 	<td><?php echo $row['name']?></td>
                 	<td><a href="view_final.php?Name=<?php echo $row['name']?>" class="btn btn-primary">View</a></td>
			        <td><a href="delete_final.php?Name=<?php echo $row['name']?>" class="btn btn-danger">Delete</a></td>
			            
                 </tr>
                 <?php
                
             }}
             ?>
	       	</table>
		</div>
	</div>
</body>	