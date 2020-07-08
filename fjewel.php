<?php
include('db/db.php');

session_start();
     $_SESSION['redirect']=$_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jewellary</title>
    <meta name="viewport" content="width=device-width,initial scale=1.0">
    <link rel="stylesheet" href="fstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" ></script>
    <style>
        .fashion-box {
             margin-top: 0px ;
        }
                     * {
                margin: 0;
                padding: 0;

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

            .navbar-brand img {
                width: 160px;
                 border-radius: 80%;
            }

            .navbar-brand {
                left: 50%;
                top: 2%;
                transform: translateX(-50%);
                position: absolute;
               
            }

            .header {
                background: #f5f6fc;
                margin-bottom: 80px;
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

            .banner-img {
                margin: 80px 115px;
                width: 45%;
            }

            .banner-img img {
                width: 100%;
                margin-bottom: -80px;
            }

            .banner {
                position: relative;
            }

            .banner-title {
                position: absolute;
                left: 50%;
                top: 20%;
            }

            .banner-title h1 {
                font-size: 55px;
                background: rgba(0, 0, 0, 0.75);
                color: white;
                line-height: 70px;
                padding: 0px 10px 0 10px;
            }

            /*--------fashion trends-----------*/
            .fashion-trends {
                padding: 100px 0;
            }

            .title-style h1 {
                padding: 40px 0;
            }

            .title-style {
                margin: 0 auto 80px;
                height: 120px;
                width: 80%;
                max-width: 700px;
                background: white;
                position: relative;
                box-shadow: 0 4px 5px 0 rgba(0, 0, 50, 0.5);
            }

            .title-style::after {
                content: " ";
                height: 100px;
                width: 200px;
                background-color: #f992a6;
                position: absolute;
                top: -10px;
                left: -10px;
                z-index: -1;
            }

            .title-style::before {
                content: " ";
                box-sizing: border-box;
                height: 100px;
                width: 200px;
                background-color: #f992a6;
                position: absolute;
                bottom: -10px;
                right: -10px;
                z-index: -1;
            }

            .trending-img {
                position: relative;
                margin-bottom: 15px;
            }

            .trending-img img {
                width: 100%;
            }

            .btn-buy {
                width: 150px;
                padding: 10px 0px;
                outline: none !important;
                border: 0px;
                border-radius: 2px;
                position: absolute;
                background: #fff;
                left: 50%;
                bottom: 0%;
                transform: translate(-50%, 0);
                opacity: 0;
                transition: .6s;
                z-index: 1;
            }

            .trending-img:hover .btn-buy {
                transform: translate(-50%, 50%);
                bottom: 50%;
                opacity: 1;
            }

            .overlay {
                height: 0;
                width: 100%;
                background: #333;
                position: absolute;
                top: 0;
                opacity: 0;
                transition: .5s;
            }

            .trending-img:hover .overlay {
                opacity: 0.5;
                height: 100%;
            }



            /*-------------offer--------------*/
            .offer {
                background-image: url(water.jpg);
                background-size: cover;
                background-position: center;
            }

            .row {
                margin: initial !important;
            }

            .sub {
                max-width: 500px;
                margin-top: 80px;
                padding: 60px;
                background-color: #ffffff8c;
                margin-bottom: 20px;
            }

            .sub a {
                width: 100px;
                display: block;
                color: #fff !important;
                background: #000;
                text-decoration: none !important;
                padding: 5px;
                text-align: center;
            }

            .offer img {
                width: 300px;
                height: 400px;
                margin: -100px;
                margin-top: 150px;
            }

            /****************fashion blog************/
            .fashion-blog {
                margin: 250px 0 150px 0;
            }

            .blog img {
                margin-top: 50px;
                height: 300px;
                width: 300px;
                display: inline-block;
            }

            .blog img img {
                height: 100%;
                width: 100%;
            }

            .fashion-blog h5 {
                font-weight: bold;
                margin-top: 20px;
            }

            /*----------fashion brands----------*/
            .fashion-brands {
                margin-bottom: 150px;
            }

            .brand-logo {
                width: 200px;
                height: 200px;
                background: #fff;
                border-radius: 50%;
                margin: 50px auto 30px;
                box-shadow: 0 2px 40px 0 rgba(110, 130, 208, 18);
            }

            .brand-logo img {
                width: 100px;
                margin: 50px auto;
            }

            .fashion-brands P {
                margin-top: 30px;
                font-weight: bold;
            }

            /*----------footer----------*/
            .footer {
                margin-top: 150px;
                background: #f5f6fc;
            }

            .payment,
            .insta-img,
            .app-download {
                margin: 50px auto;
            }

            .payment img {
                width: 300px;
                cursor: pointer;
            }

            .insta-img img {
                width: 75px;
                padding: 5px;
                cursor: pointer;
            }

            .app-download img {
                width: 300px;
            }

            .footer h5 {
                margin-bottom: 50px;
            }

            .footer h5::before {
                content: '';
                width: 70px;
                height: 3px;
                background: #4f74e8;
                top: 80px;
                position: absolute;
            }

            .footer-icons {
                text-align: right;
            }

            .footer-icons .fa {
                margin: 0 10px auto;
                font-size: 20px;
                cursor: pointer;
            }
            /*------product details------------*/
            .single-product img
            {
                width: 350px;
                height: 550px;
            }
            .new-arrival
            {
                background: green;
                width: 50px;
                color: #fff;
                font-size: 12px;
                font-weight: bold;
                margin-top: 20px;
            }
            .col-md-7 h2
            {
                color:#555;
            }
            .single-product .price
            {
                color: orange;
                font-size: 26px;
                font-weight: bold;
                padding-top: 20px;
            }
            .single-product input
            {
                border: 1px solid #ccc;
                font-weight: bold;
                height: 33px;
                text-align: center;
                width: 30px;
            }
            .single-product .btn-primary 
            {
                background: orange;
                color: #fff;
                font-size: 15px;
                margin-left: 20px;
                border: none;
                box-shadow: none;
            }
            /*----------product description--------*/
            .product-des h6
            {
                margin-top: 50px;
                color: orange;
            }
            ..product-des p
            {
                margin-top: 30px;
            }
            .product-des hr
            {
                margin-bottom: 50px;
            }
            .box
            {
                background: orange;
                color: #fff;
                padding:4px 10px;
                height: 40px;
                margin-bottom: 30px;
                margin-left: 10px;
                display: inline-flex; 
            }
            .box h2
            {
                font-size: 24px;
            }


            /*------------(responsiveness)for small device--------*/
            @media only screen and (max-width:900px) 
            {
                .banner-img {
                    margin: 40px auto;
                    width: 80%;
                }

                .banner-title {
                    transform: translate(-50%);
                    left: 50%;
                    top: 180px;
                }

                .banner-title h1 {
                    font-size: 16px;
                    padding: 5px;
                    line-height: 20px;
                }

                .title-style h1 {

                    font-size: 25px;
                }

                .offer img {

                    margin-top: 20px;
                    margin-bottom: 0px;
                }
                .footer-icons {
                text-align: center;
            }    
                .footer h5{
                    font-size: 15px;
                }
                .copyright
                {
                    text-align: center;
                }
                
            }
            .webview
            {
                display: block;
            }
            .mobview
            {
                display: none;
            }
            @media only screen and (max-width:500px) 
            {
                .webview
                {
                    display: none;
                }
                .mobview
                {
                    display: block;
                }
                .footer-icons {
                text-align: center;
            }    
                .footer h5{
                    font-size: 15px;
                }
                .copyright
                {
                    text-align: center;
                }
            }

    </style>
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
    </section>
     <!--fashion trends-->
    <section class="fashion-trends">
        <div class="container">
            <div class="fashion-box">
                <div class="title-style text-center" >
                <h1>JEWELLARY</h1>
                </div>
                <p class="text-center">
                    Brackets has some unique features like Quick Edit, Live Preview and others that you may not find in other
                    editors. Brackets is written in JavaScript, HTML and CSS. That means that most of you using Brackets
                    have the skills necessary to modify and extend the editor. In fact, we use Brackets every day to build
                    Brackets. To learn more about how to use the key features, read on. </p>
            </div>
            <div class="row">
                <?php
                    $sql="SELECT * FROM jewel order by rand()";
                    $result=mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)>0)
                    {
                        foreach($result as $row)
                    {
                ?>
                <div class="col-md-3">
                    <div class="trending-img">
                        <img src="<?php echo $row['img'];?>" >
                        <button type="button" class="btn-buy"><a href="buyjew.php?id=<?php echo $row['id'];?>">BUY NOW</a></button>
                        <div class="overlay"></div>
                    </div>
                </div>
                <?php
                    }}
                ?>
                <!--<div class="col-md-3">
                    <div class="trending-img">
                        <img src="neck1.jpg"/>
                        <button type="button" class="btn-buy">BUY NOW</button>
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="trending-img">
                        <img src="ering1.jpg"  />
                        <button type="button" class="btn-buy">BUY NOW</button>
                        <div class="overlay"></div>
                    </div>
                </div>
                 <div class="col-md-3">
                    <div class="trending-img">
                        <img src="ring1.jpg"/>
                        <button type="button" class="btn-buy">BUY NOW</button>
                        <div class="overlay"></div>
                    </div>
                </div>-->
            </div>
            <!--<div class="row">
                <div class="col-md-3">
                    <div class="trending-img">
                        <img src="ank2.jpg"/>
                        <button type="button" class="btn-buy">BUY NOW</button>
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="trending-img">
                        <img src="neck2.jpg"/>
                        <button type="button" class="btn-buy">BUY NOW</button>
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="trending-img">
                        <img src="ering2.jpg"/>
                        <button type="button" class="btn-buy">BUY NOW</button>
                        <div class="overlay"></div>
                    </div>
                </div>
                 <div class="col-md-3">
                    <div class="trending-img">
                        <img src="ring2.jpg"/>
                        <button type="button" class="btn-buy">BUY NOW</button>
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="trending-img">
                        <img src="ank3.jpg"/>
                        <button type="button" class="btn-buy">BUY NOW</button>
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="col-md-3">
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
                </div>
            </div>-->
        </div>
    </section> 
        <!-----------footer--------->
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                   <div class="payment">
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
</body>
</html>