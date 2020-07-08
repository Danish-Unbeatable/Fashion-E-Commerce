<?php
include('db/db.php');
?>

<?php
session_start();

	if(isset($_POST['login']))
	{
		$useremail=$_POST['email'];
		$userpass=$_POST['pass'];
		if(!$conn)
		{
			die("connection error");
		}
		$sql="SELECT * FROM user WHERE  email='$useremail' AND password='$userpass' ";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($result);
		if($row['email']==$useremail && $row['password']==$userpass)
		{

			echo"<script>
				alert('login success');
				
			</script>";
			$_SESSION['name']=$useremail;
			
			header('location: '.$_SESSION['redirect']);
			
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fashion-SIGN IN</title>
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
				top: 15vh;
				background: #000;
				padding: 30px;
				border-radius: 10px;
				box-shadow: 0 0 10px 0 #000;
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
				<form class="form-container" action="sign.php" method="POST" enctype="multipart/form-data">
					<h4> LOG IN</h4>
						<div class="form-group">
						    <label for="exampleInputEmail1">Email address</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email" required> 
						    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					    </div>
						<div class="form-group">
						    <label for="exampleInputPassword1">Password</label>
						    <input type="password" class="form-control" id="exampleInputPassword1" name="pass" placeholder="Password" required>
						</div>
						<p><a href="reg.php">Not yet registered ? Register Here.</a> </p> 
						<center><button type="submit" class="btn btn-primary" name="login">LOG IN</button></center>
				</form>
			</section>
		</section>
	</section>

</body>
</html>