<?php
include('db/db.php');
?>

<?php
	include('db/db.php');
	if(isset($_POST['signin']))
	{

		$name=$_POST['name'];
		$addr=$_POST['addr'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$cpass=$_POST['cpass'];
		$mob=$_POST['mob'];
		$sql = "INSERT INTO user(name,address,email,password,cpassword,mobile) VALUES 
		('$name','$addr','$email','$pass','$cpass','$mob')";
		if(mysqli_query($conn, $sql))
		{
			echo "<script>
				alert('Registration successful');
				</script>";
			header("location:reg.php");
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
    <title>Fashion-Registration</title>
    <meta name="viewport" content="width=device-width,initial scale=1.0">
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" ></script>
    <style >
		.bg
		{
			background-image:  url('bkg.jpg') ;
			width: 100%;
			height: 100vh;

		}
    	.form-container
			{
				position: absolute;
				top: 7vh;
				background: #000;
				padding: 30px;
				border-radius: 10px;
				box-shadow: 0 0 10px 0 #000;
				width: 450px;
			}
			label
			{
				color: white;
			}
			h4
			{
				text-align: center;
				font-family: 'Comic Sans MS';
				padding-bottom: 15px;
				color: white;
			}

			@media only screen and (max-width:550px)
			{
				.bg
				{
					background-size: 300%;
				}
			}
    </style>

</head>
<body>
	<section class="container-fluid bg">
		<section class="row justify-content-center">
			<section class="col-12 col-sm-6 col-md-3">
				<form class="form-container" action="reg.php" method="POST" enctype="multipart/form-data">
					<h4>CREATE AN ACCOUNT</h4>
				  <div class="form-group">
				    <label >Name</label>
				    <input type="text" class="form-control" name="name"  placeholder="Enter name" required>
				    
				  </div>
				  <div class="form-group">
				    <label >Address</label>
				    <input type="text" class="form-control" name="addr"  placeholder="Enter address" required>
				    
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
				    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" id="exampleInputPassword1" name="pass" placeholder="Password" required>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Confirm Password</label>
				    <input type="password" class="form-control" id="exampleInputPassword1" name="cpass" placeholder="Confirm Password" required>
				  </div>
				  <div class="form-group">
				    <label >Mobile No.</label>
				    <input type="number" class="form-control" id="exampleInputPassword1" name="mob" placeholder="Mobile No" required>
				  </div>
				  <center><button type="submit" class="btn btn-primary" value="SIGN IN" name="signin">SIGN IN</button></center>
				</form>
			</section>
		</section>
	</section>

</body>
</html>