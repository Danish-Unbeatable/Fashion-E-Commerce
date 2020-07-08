<?php
include('db/db.php');
session_start();
     $_SESSION['redirect']=$_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fashion Lifestyle</title>
    <meta name="viewport" content="width=device-width,initial scale=1.0">
    <link rel="stylesheet" href="fstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" ></script>
    
</head>
<body>
    <section class="header">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand" href="#"><img src="fashnlog1.jpg"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">FASHION</a>
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
        <div class="banner">
        <div class="banner-img">
            <img src="setup.jpg">
        </div>
         <div class="banner-title">
             <h1>Fashion Story</h1>
             <h1>Women's Lifestyle</h1>
        </div>
        </div>
    </section>
     <!--fashion trends-->
    <section class="fashion-trends">
        <div class="container">
            <div class="fashion-box">
                <div class="title-style text-center" >
                <h1>FASHION TRENDS</h1>
                </div>
                <p class="text-center">
                    Brackets has some unique features like Quick Edit, Live Preview and others that you may not find in other
                    editors. Brackets is written in JavaScript, HTML and CSS. That means that most of you using Brackets
                    have the skills necessary to modify and extend the editor. In fact, we use Brackets every day to build
                    Brackets. To learn more about how to use the key features, read on. </p>
            </div>
            <div class="row">
                <?php

                    $sql="SELECT * FROM trends order by id desc limit 3";
                    $result=mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)>0)
                    {
                        foreach($result as $row)
                    {
                ?>

                <div class="col-md-4">
                    <div class="trending-img">
                        <img src="<?php echo $row['img'];?>">
                        <button type="button" class="btn-buy"><a href="buy.php?id=<?php echo $row['id'];?>">BUY NOW</a></button>
                        <div class="overlay"></div>
                    </div>
                </div>
                <?php 
                   }} 
                ?>
               <!-- <div class="col-md-4">
                    <div class="trending-img">
                        <img src="ehnic1.jpg"/>
                        <button type="button" class="btn-buy"><a href="buy.html">BUY NOW</a></button>
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="trending-img">
                        <img src="crop2.jpg"/>
                        <button type="button" class="btn-buy"><a href="buy.html">BUY NOW</a></button>
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>-->
            <div class="row">
               <div class="col-md-12">
                    <center>
                    <a href="ftrend.php" id="more" class="btn btn-danger" >MORE</a>
                    </center>    
               </div>

            </div>
        </div>
    </section> 
    <!----------------offer-------------->
    <section class="offer">
        <div class="row">
            <div class="col-md-6 text-center">
                <img src="bog.jpg"/>
            </div>
            <div class="col-md-6">
               <div class="sub">
                   <h4>FUNSHION EXCLUSIVE</h4>
                   <p>Once you're ready to get out of this sample project and edit your own code, you can       use the dropdown in the left sidebar to switch folders. Right now, the dropdown says "Getting Started" - that's the folder containing the file you're looking at right now. </p>
                   <a href="#">Subscribe</a>
               </div>
            </div>
        </div>
    </section>
     <!--latest blog-->  
    <section class="fashion-blog">
        <div class="title-style text-center">
            <h1>LATEST FASHION BLOG </h1>
        </div>
        <div class="container">
            <div class=" row">
                <div class="col-md-4 text-center">
                    <div class="blog-img">
                        <img src="i4.jpg"/>
                        <h5>new style 50% off</h5>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="blog-img">
                        <img src="i5.jpg"/>
                        <h5>Buy 1 Get 1 Free</h5>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="blog-img">
                        <a href="fjewel.php"><img src="i6.jpg"/></a>
                        <h5>New Jewellary Collection</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!------fashion brands------>
    <section class="fashion-brands">
        <div class="title-style text-center">
            <h1> OUR FASHION BRANDS </h1>
        </div>
        <div class="container">
            <div class=" row">
                <div class="col-md-3 text-center">
                    <div class="brand-logo">
                         <img src="i1.jpg"/>
                        <p>EXCLUSIVE OFFER</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="brand-logo">
                        <img src="i3.png"/>
                        <p>Min. 40% off</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="brand-logo">
                        <img src="i4.png"/>
                        <p>FREE DELIVERY</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="brand-logo">
                        <img src="i3.png"/>
                        <p> UP TO 50% off</p>
                    </div>
                </div>  
            </div>
        </div>
    </section>
    <!-----------footer--------->
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                   <div class="payment" >
                    <h5>PAYMENT GATEWAYS</h5>
                    <img src="pay.png" class="img-fluid">
                </div>
                </div>
                <div class="col-md-4">
                    <div class="insta-img">
                        <h5>INSTAGRAM PICS</h5>
                        <img src="dani%20(1).jpg"/>
                        <img src="dani%20(2).jpg"/>
                        <img src="cropp.jpg"/>
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
</body>
</html>























































































