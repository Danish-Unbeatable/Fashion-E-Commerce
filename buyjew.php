<?php
include('db/db.php');
?>

<?php 
ob_start();
session_start();
if (isset($_POST['submit']))
    {
        if($_SESSION['name'])
        {
            
                $product_id=$_POST['product_id'];
                $product_img=$_POST['img'];
                $product_name=$_POST['name'];
                $product_price=$_POST['price'];
                $product_quan=$_POST['quan'];
                
                $status=$_POST['status'];

                $total=$product_price*$product_quan;

                $sql2="SELECT * FROM user where email='{$_SESSION['name']}'";
                $result=mysqli_query($conn,$sql2);
                    if(mysqli_num_rows($result) > 0)
                        { 
                            foreach ($result as $row) 
                            {
                                $user_name=$row['name'];
                                $mobile=$row['mobile'];
                                $address=$row['address'];
                                $email=$row['email'];


                $sql3="SELECT * FROM cart where product_name='$product_name' and email='{$_SESSION['name']}' ";
                $result=mysqli_query($conn,$sql3);
                if(mysqli_num_rows($result) > 0)
                {
                    echo "<script>
                    alert('Already in Cart');
                    </script>";
                }
                else
                {
                    $sql="INSERT INTO cart 
                        (product_id,product_img,product_name,product_price,product_quan,name,mobile,address,email,status,total)VALUES
                        ('$product_id','$product_img','$product_name','$product_price','$product_quan','$user_name','$mobile','$address',
                        '$email','$status','$total')";
                        if(mysqli_query($conn,$sql))
                        {
                            echo"<script>
                            alert('Added Into Cart');
                            </script>";
                        }
                        else
                        {
                            echo "error:" . $sql . "<br>" .mysqli_error($conn);
                        }
                }
            }}
            
        }
        else
        {
             $_SESSION['redirect']=$_SERVER['REQUEST_URI'];
            header ("location:sign.php");
        }
        ob_end_flush();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fashion Lifestyle-jewellary details</title>
    <meta name="view
    port" content="width=device-width,initial scale=1.0">
    <link rel="stylesheet" href="fstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" ></script>
    <style type="text/css">
        .footer h5
        {
            font-size: 15px;
        }
    </style>

</head>
<body>
    <div class="webview">
    <section class="header">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand" href="#"><img src="fashnlog1.jpg"></a>
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
    <!------------product details-------->
    <section class="single-product">
        <div class="container">
            <div class="row">
                <?php 
                    if($_GET['id'])
                    {
                        $id=$_GET['id'];
                        $sql="SELECT * FROM jewel where id='$id'";
                        $result=mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result)>0)
                        {
                            foreach($result as $row)
                        {
                            $id=$row['id'];
                            $img=$row['img'];
                            $name=$row['jname'];
                            $price=$row['price'];
                ?>
                <div class="col-md-5">
                    <img src="<?php echo $row['img']?>" class="img-fluid" />
                </div>
                <div class="col-md-7">
                    <p class="new-arrival text-center">NEW</p>
                    <h2><?php echo $row['jname']?></h2>
                    <p><b>Product code : </b><?php echo rand(555,5200);?> IRSC2020</p>
                     <p class="price">Rs.<?php echo $row['price']?><!-- RS. 550.00--></p>
                    <p><b>Availability : </b><?php echo $row['availability']?> </p>
                    <p><b>Condition :</b> New</p>
                    <p><b><?php echo rand(3000,5000);?> ratings and <?php echo rand(0,10);?> reviews</b></p>
                    
                    <form action="" method="post">
                    <label>Quantity</label>
                    <input type="text" name="quan" value=""><br>

                    <input type="hidden" name="product_id" value="<?php echo $id?>"><br>
                    <input type="hidden" name="img" value="<?php echo $img?>"><br>
                    <input type="hidden" name="name" value="<?php echo $name?>"><br>
                    <input type="hidden" name="price" value="<?php echo $price?>"><br>
                    <input type="hidden" name="status" value="Not Paid"><br>

                    <?php
                       /* $sql="SELECT * FROM user where email='{$_SESSION['name']}'";
                        $result=mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result) > 0)
                        { 
                            foreach ($result as $row) 
                            {
                    ?>
                    <input type="text" name="user_name" value="<?php echo $row['name']?>"><br>
                    <input type="text" name="user_mobile" value="<?php echo $row['mobile']?>"><br>
                    <input type="text" name="user_email" value="<?php echo $row['email']?>"><br>
                    <input type="text" name="user_address" value="<?php echo $row['address']?>"><br>
                    
                    <?php }} */ ?>
                    <button type="submit" name="submit" class="btn btn-primary">Add to Cart</button><br>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!--------------product description---------------------->
    <section class="product-des">
            <div class="container">
                <h6>Product description</h6>
                <p><?php echo $row['des']?>
                <!--Welcome to Brackets, a modern open-source code editor that understands web design. It's a lightweight,
            yet powerful, code editor that blends visual tools into the editor so you get the right amount of help
            when you want it. Welcome to Brackets, a modern open-source code editor that understands web design. It's a lightweight,
            yet powerful, code editor that blends visual tools into the editor so you get the right amount of help
            when you want it.</p>
            <p>-->Welcome to Brackets, a modern open-source code editor that understands web design. It's a lightweight,
            yet powerful, code editor that blends visual tools into the editor so you get the right amount of help
            when you want it. Welcome to Brackets, a modern open-source code editor that understands web design. It's a lightweight,
            yet powerful, code editor that blends visual tools into the editor so you get the right amount of help
            when you want it.</p> 
            <?php 
            }}}
            ?>
            <hr>               
            </div>
            
            <div class="container">
                <div class="box">
                    <h2>Similar products</h2>
                </div>
            <div class="row">
                <?php
                    $sql="SELECT * FROM jewel order by rand() limit 4";
                    $result=mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)>0)
                    {
                        foreach($result as $row)
                    {
                ?>
                <div class="col-md-3">
                    <div class="trending-img">
                        <img src="<?php echo $row['img'];?>"/>
                        <button type="button" class="btn-buy"><a href="buyjew.php?id=<?php echo $row['id'];?>">BUY NOW</a></button>
                        <div class="overlay"></div>
                    </div>
                </div>
                <?php 
                   }} 
                ?>
                <!--<div class="col-md-3">
                    <div class="trending-img">
                        <img src="neck3.jpg"/>
                        <button type="button" class="btn-buy">BUY NOW</button>
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="trending-img">
                        <img src="ering3.jpg"/>
                        <button type="button" class="btn-buy">BUY NOW</button>
                        <div class="overlay"></div>
                    </div>
                </div>
                 <div class="col-md-3">
                    <div class="trending-img">
                        <img src="ring3.jpg"/>
                        <button type="button" class="btn-buy">BUY NOW</button>
                        <div class="overlay"></div>
                    </div>
                </div>-->
            </div>
        </div>
    </section>
     <!-----------footer--------->
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                   <div class="payment" id="pay">
                    <h5>PAYMENT GATEWAYS</h5>
                    <img src="pay.png" class="img-fluid">
                </div>
                </div>
                <div class="col-md-4">
                    <div class="insta-img">
                        <h5>INSTAGRAM PICS</h5>
                        <img src="dani%20(1).jpg"/>
                        <img src="dani%20(2).jpg"/>
                        <img src="crop.jpg"/>
                        <img src="face.jpg"/>
                        <img src="indoor.jpg"/>
                        <img src="red.jpg"/>
                        <img src="scoop.jpg"/>
                        <img src="side.jpg"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="app-download">
                        <h5>DOWNLOAD MOBILE APP</h5>
                     <img src="play.png" class="img-fluid">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <p class="copyright">Designed with <i class="fa fa-heart"></i> by vostro 15 3000</p>
                </div>
                <div class="col-md-4">
                   <div class="footer-icons">
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-instagram"></i>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-youtube-play"></i>
                    <i class="fa fa-linkedin"></i>
                </div>
                </div>
            </div>
        </div>
    </section>
    </div>

    














