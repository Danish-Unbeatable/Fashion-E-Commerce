<?php
include('db/db.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin product form</title>
    <meta name="viewport" content="width=device-width,initial scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" ></script>
    <style>
		h1
        {
        	margin-top: 30px;
        	margin-bottom: 30px;
        	font-family:"comic sanf ms";
        }
        h2{
        	font-family:" comic sanf ms";
        	text-align: center;
        	margin-top: 5px;
        
        }
 		  * {
			    margin: 0;
			    padding: 0;
			    font-family:" comic sanf ms";
        	
			}

			.right-menu li {
			    display: inline-block;
			    margin-top: 30px;
			}

			.right-menu li .fa {
			    font-size: 18px;
			    margin-right: 10px;
			    cursor: pointer;
			}
			.navbar-brand {
			    left: 50%;
			    top: 2%;
			    transform: translateX(-50%);
			    position: absolute;
			   
			}

			.header {
			    background: #f5f6fc;
			    margin-bottom: 30px;
			}

			.navbar {
			    padding: 0 35px !important;
			}

			.navbar-toggler {
			    border: none !important;
			    outline: none !important;
			    padding: 0 !important;
			    margin-top: 30px;
			}

			.navbar-toggler . fa {
			    font-size: 30px;
			    cursor: pointer;
			}
			.top
			{
				background-color: #f5f6fc;
			}
			.card{
				margin-top: 100px;
				background-color: #efefef;
			}
			hr{
				height:2px;
				background-color:black;
			}
			.btn-warning{
				text-align: center;
				color: white;


			}
			.btn-success{
				width: 70%;
			}
			.img{
				margin-bottom:10px; 
			}
			.fa-trash{
				color:  red;
				font-size: 20px;
			}
			.Continue{
				float: right;
			}
			.form-check-input{
				font-size: 15px;
				color: black;
			}
    </style>
</head>
<body>
	<section class="header">
        <nav class="navbar navbar-expand-lg navbar-light ">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="fashion.php">FASHION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ftrend.php">TRENDING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="fjewel.php">JEWELLARY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sign.php">SIGN IN</a>
                    </li>
                </ul>
                <ul class="right-menu ml-auto">
                    <li><a href="add_cart.php"><i class="fa fa-shopping-cart"></i></a></li>
					<li><i class="fa fa-facebook"></i></li>
                    <li><i class="fa fa-pinterest"></i></li>
                    <li><i class="fa fa-instagram"></i></li>
                    <li>
                   <div class="input-group mb-3">
                   <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2">
                   <div class="input-group-append">
                   <span class="input-group-text"><i class="fa fa-search"></i></span>
                   </div>
                   </div>
                    </li>
                    <li><?php
                        if(isset($_SESSION['name']))
                        {
                            $sql="SELECT * from user where email='{$_SESSION['name']}'";
                            $result=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($result)){
                          ?>  
                          <h5><i class="fa fa-user-circle-o"></i>
                        <?php echo $row['name']?></h5>
                          <?php
                        }
                    }
                    else{
                    ?>

                    <i class="fa fa-user-circle-o"></i>
                <?php
                }
                ?>
                    
                    </li>
                                    
                </ul>
            </div>
        </nav>
    </section>
	<div class="row">
	<div class="col-md-8">	
		<center><h1> My Cart </h1></center>
		<table class="table table-bordered table-hover text-center">
		        <tr class="top">
		            
		            <th>IMAGE</th>
		            <th> NAME</th>
		            <th>PRICE</th>
		            <th>QUANTITY</th>
		           	<th>SUBTOTAL</th>
		           	<th>DELETE</th>
		            
		        </tr>
		        <tr>
					<?php
                    $sql="SELECT * FROM cart where email='{$_SESSION['name']}'";
                    $result=mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)>0)
                    {
                        foreach($result as $row)
                    {
                	?>

			            
						<td><img src="<?php echo $row['product_img']?>" height=100px  width=100px></td>
			            <td><?php echo $row['product_name']?></td>
			            <td> Rs.<?php echo $row['product_price']?></td>
			            <td><?php echo $row['product_quan']?></td>
			            <td><?php echo $row['total']?></td>
			            <td><a href="delete_cart.php?id=<?php echo $row['id']?>" ><i class="fa fa-trash"></i></a></td>
		        </tr>
			        <?php
			    		}}
			    	?>
		    </table>
		    <a href="fashion.php" class="btn btn-danger Continue">Continue Shipping</a>
		    </div>
		    <div class="col-md-4">
		    	<div class="container">
		    		<center>
		    		<div class="card">
		    			<h2>Order Summary</h2><hr>
		    			<center>
		    				<div class="row">
		    					<div class="col-md-6">
		    						<h4>Order Id</h4>
		    				
		    					</div>
		    					<div class="col-md-6">
		    						<h4> IFSC<?php echo rand(100,200)?></h4>
		    			
		    					</div>
		    				</div>
		    				
		    				<div class="row">
		    					<div class="col-md-6">
		    						<h4>Total</h4>
		    						<?php
		    						$sql="SELECT SUM(total) as totall from cart where email='{$_SESSION['name']}'";
		    						$result=mysqli_query($conn,$sql);
		    						if(mysqli_num_rows($result)>0)
		    						{
		    							foreach ($result as $row) {
		    								# code...
		    							

		    						?>
		    				
		    					</div>
		    					<div class="col-md-6">
		    						<form action="checkout.php" method="post">
		    						<h4> &#8377;<?php echo $row['totall'];?></h4>
		    						<input type="hidden" name="grand" class="form-control" value="<?php echo $row['totall'];?>">
		    						<?php
		    					}}
		    						?>
		    						
		    					</div>
		    				</div>
		    				<button type="submit" name="submit" class="btn btn-success btn-lg">CHECKOUT</button><br><br>
		    				</form>
		    						
		    			<button class="btn btn-warning ">FREE SHIPPING</button>
		    			<p><b>We do not apply any shipping charges..</b></p>
		    			
		    			
		    			<p><b>your order will be delievered in <?php echo rand(1,30);?>days..</b></p>
		    			<img src="paytm.jpg" class="img  img-fluid">
		    			</center>
		    		</div>
		    		</center>
		    	</div>
		    </div>
		</div>
	
</body>

</html>
























































































