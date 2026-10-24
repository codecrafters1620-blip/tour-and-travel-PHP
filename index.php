<?php include("connection.php");?>
<?php

if(isset($_POST["send"])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $number=$_POST["number"];
    $message=$_POST["message"];
    
    $insert="INSERT INTO `contactus` (`name`, `email`, `number`, `messaage`) VALUES 
    ( '".$name."','".$email."','".$number."','".$message."')";
    $conn->query($insert);
    echo"<script>
    alert('send successfully');
    </script>";


}
$packageshow="";
$shows="select * from addmainpackage limit 8";
$results=$conn->query($shows);
while($rows=$results->fetch()){
    $names=$rows["package_name"];
    $imgshows=$rows["uploadfile"];
    $packageshow=$packageshow."
    
    <div class='col-md-6'>
    <div class='filtr-item'>
        <img src='data/items/og/".$imgshows."' alt='portfolio image' />
        <div class='item-title'>
            <a href='#'>
                ".$rows["package_name"]."
            </a>
             <a href='showpackages.php?name=".$rows["package_name"]."' class='btn btn-primary'>Read More</a></span></p>
            
        </div> <!-- /.item-title-->
    </div><!-- /.filtr-item -->
</div><!-- /.col -->
    
    
    
    
    "; 
}
$bookpackageshow="";

$show="select * from addpackages limit 8";
$result=$conn->query($show);
while($row=$result->fetch()){
    $name=$row["package_name"];
    $imgshow=$row["uploadfile"];
       
    $bookpackageshow=$bookpackageshow."
    
    <div class='col-md-3 col-sm-4'>
    <div class='single-package-item'>
        <img src='data/items/og/".$imgshow."' alt='package-place'>
        <div class='single-package-item-txt'>
            <h3>".$row["package_name"]." <span class='pull-right'> Rs:  ".$row["package_price"]."</span></h3>
            <div class='packages-para'>
                <p>
                    <span>
                        <i class='fa fa-angle-right'></i> ".$row["package_duration"]."
                    </span>

                </p>
                <p>
                    <span>
                        <i class='fa fa-angle-right'></i> transportation
                    </span>
                    <i class='fa fa-angle-right'></i> ".$row["package_features"]."
                </p>
            </div>
            <!--/.packages-para-->
            <div class='packages-review'>
                <p>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <span>2544 review</span>
                </p>
            </div>
            <!--/.packages-review-->
            <div class='about-btn'>
                <a href='book_package.php?id=".$row["id"]."' class='btn btn-success'> Book Now </a>
            </div>
            <!--/.about-btnn t-->
        </div>
        <!--/.single-package-item-txt-->
    </div>
    <!--/.single-package-item-->

</div>
    
    
    ";

}
?>
<!doctype html>
<html class="no-js" lang="en">
<?php

?>

<head>
    <!-- META DATA -->
    <script src="assets/cdn/jquery.min.js"></script>
    <script src="assets/cdn/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="assets/cdn/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="assets/cdn/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!--font-family-->
    <link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet" />

    <!-- TITLE OF SITE -->
    <title>Travel</title>

    <!-- favicon img -->
    <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png" />

    <!--font-awesome.min.css-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" />

    <!--animate.css-->
    <link rel="stylesheet" href="assets/css/animate.css" />

    <!--hover.css-->
    <link rel="stylesheet" href="assets/css/hover-min.css">

    <!--datepicker.css-->
    <link rel="stylesheet" href="assets/css/datepicker.css">

    <!--owl.carousel.css-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />

    <!-- range css-->
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css" />

    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <!-- bootsnav -->
    <link rel="stylesheet" href="assets/css/bootsnav.css" />

    <!--style.css-->
    <link rel="stylesheet" href="assets/css/style.css" />

    <!--responsive.css-->
    <link rel="stylesheet" href="assets/css/responsive.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
    <!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
			your browser</a> to improve your experience and security.</p>
		<![endif]-->

    <!-- main-menu Start -->
    <header class="top-area">
        <div class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="logo">
                            <a href="index.html">
                                tour<span>Nest</span>
                            </a>
                        </div><!-- /.logo-->
                    </div><!-- /.col-->
                    <div class="col-sm-10">
                        <div class="main-menu">

                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-collapse">
                                    <i class="fa fa-bars"></i>
                                </button><!-- / button-->
                            </div><!-- /.navbar-header-->
                            <div class="collapse navbar-collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="smooth-menu"><a href="#home">home</a></li>
                                    <li class="smooth-menu"><a href="#gallery">destination</a></li>
                                    <li class="smooth-menu"><a href="#pack">Packages </a></li>
                                    <li class="smooth-menu"><a href="#subs">contact us</a></li>
                                    <li><a href="bookedpackages.php">Your Packages </a></li>
                                    <li>
                                        <a href="login2.php">login</a>

                                    </li>
                                    <!--/.project-btn-->
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.main-menu-->
                    </div><!-- /.col-->
                </div><!-- /.row -->
                <div class="home-border"></div><!-- /.home-border-->
            </div><!-- /.container-->
        </div><!-- /.header-area -->

    </header><!-- /.top-area-->
    <!-- main-menu End -->


    <!--about-us start -->
    <section id="home" class="about-us">
        <div class="container">
            <div class="about-us-content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="single-about-us">
                            <div class="about-us-txt">
                                <h2>
                                    Explore the beauty of the world

                                </h2>

                                <!--/.about-btn-->
                            </div>
                            <!--/.about-us-txt-->
                        </div>
                        <!--/.single-about-us-->
                    </div>
                    <!--/.col-->
                    <div class="col-sm-0">
                        <div class="single-about-us">

                        </div>
                        <!--/.single-about-us-->
                    </div>
                    <!--/.col-->
                </div>
                <!--/.row-->
            </div>
            <!--/.about-us-content-->
        </div>
        <!--/.container-->

    </section>
    <!--/.about-us-->
    <!--about-us end -->

    <!--/.travel-box-->
    <!--travel-box end-->

    <!--service start-->
    <section id="service" class="service">
        <div class="container">

            <div class="service-counter text-center">
                <div class="col-md-4 col-sm-4">
                    <div class="single-service-box">
                        <div class="statistics-img">
                        </div>
                        <!--/.service-img-->
                        <div class="service-content">

                            <h2>
                                <a href="#">
                                </a>
                            </h2>
                        </div>
                        <!--/.service-content-->
                    </div>
                    <!--/.single-service-box-->
                </div>
                <!--/.col-->
                <div class="col-md-4 col-sm-4">
                    <div class="single-service-box">
                    <div class="service-item">
    <div class="service-img">
        <img src="assets/images/service/s1.png" alt="service-icon" />
    </div>
    <!--/.service-img-->
    <div class="service-content">
        <h2>
            <a href="#">
                Customized Travel Plans
            </a>
        </h2>
        <p>Tailor-made itineraries that suit your travel preferences.</p>
    </div>
    <!--/.service-content-->
</div>

<div class="service-item">
    <div class="service-img">
        <img src="assets/images/service/s3.png" alt="service-icon" />
    </div>
    <!--/.service-img-->
    <div class="service-content">
        <h2>
            <a href="#">
                Adventure Tours
            </a>
        </h2>
        <p>Experience thrilling adventures and outdoor activities.</p>
                            </div>
                            <!--/.service-content-->
                        </div>
                        <!--/.service-content-->
                    </div>
                    <!--/.single-service-box-->
                </div>
                <!--/.col-->





            </div>
            <!--/.statistics-counter-->
        </div>
        <!--/.container-->

    </section>
    <!--/.service-->

    <section id="gallery" class="gallery">
        <div class="container">
            <div class="gallery-details">
                <div class="gallary-header text-center">
                    <h2>
                        top Destination
                    </h2>
                    
                </div>
                <!--/.gallery-header-->
                <div class="gallery-box">
                    <div class="gallery-content">
                        <div class="filtr-container">
                            <div class="row">

                                <?php echo $packageshow;?>

                                <!-- /.col -->




                            </div><!-- /.row -->

                        </div><!-- /.filtr-container-->
                    </div><!-- /.gallery-content -->
                </div>
                <!--/.galley-box-->
            </div>
            <!--/.gallery-details-->
        </div>
        <!--/.container-->

    </section>
    <!--/.gallery-->
    <!--gallery end-->


    <!--discount-offer start-->

    <!--packages start-->
    <section id="pack" class="packages">
        <div class="container">
            <div class="gallary-header text-center">
                <h2>
                    special packages
                </h2>
                
            </div>
            <!--/.gallery-header-->
            <div class="packages-content">
                <div class="row">

                    <!--/.col-->



                    <?php echo $bookpackageshow;?>

                </div>
                <!--/.col-->


            </div>
            <!--/.row-->
        </div>
        <!--/.packages-content-->
        </div>
        <!--/.container-->

    </section>
    <!--/.packages-->
    <!--packages end-->






    <!--subscribe start-->
    <section id="subs" class="subscribe">
        <div class="container">
            <div class="subscribe-title text-center">
                <h2>
                    Contact US </h2>

            </div>
            <form action="index.php" method="POST">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="custom-input-group">

                            <input type="text" class="form-control" name="name" placeholder="Enter your Name" required>
                            <button class="appsLand-btn subscribe-btn"></button>
                            <div class="clearfix"></div>
                        </div>
                        <br />
                        <div class="custom-input-group">
                            <input type="email" class="form-control" name="email" placeholder="Enter your Email Here" required>
                            <button class="appsLand-btn subscribe-btn"></button>
                            <div class="clearfix"></div>
                        </div>
                        <br />
                        <div class="custom-input-group">
                            <input type="text" class="form-control" name="number"
                                placeholder="Enter your Phone no Here" required>
                            <button class="appsLand-btn subscribe-btn"></button>
                            <div class="clearfix"></div>
                        </div>
                        <br />
                        <div class="custom-input-group">
                            <textarea class="massage-bt" placeholder="Massage" name="message" rows="5" cols="80"
                                id="comment" name="Message" required></textarea>
                            <div class="clearfix"></div>
                        </div>
                        <div class="custom-input-group">
                            <button type="submit" class="appsLand-btn subscribe-btn" name="send"> Send Message</button>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </form>-
        </div>

    </section>
    <!--subscribe end-->

    <!-- footer-copyright start -->
    <footer class="footer-copyright">
        <div class="container">
            <div class="footer-content">
                <div class="row">

                    <div class="col-sm-3">
                        <div class="single-footer-item">
                            <div class="footer-logo">
                                <a href="index.html">
                                    tour<span>Nest</span>
                                </a>
                                <p>
                                    best travel agency
                                </p>
                            </div>
                        </div>
                        <!--/.single-footer-item-->
                    </div>
                    <!--/.col-->

                    <div class="col-sm-3">
                        <div class="single-footer-item">
                            <h2>link</h2>
                            <div class="single-footer-txt">
                                <p><a href="index.php">home</a></p>

                                <p><a href="#pack">special packages</a></p>



                            </div>
                            <!--/.single-footer-txt-->
                        </div>
                        <!--/.single-footer-item-->

                    </div>
                    <!--/.col-->

                    <div class="col-sm-3">
                        <div class="single-footer-item">
                            <h2>popular destination</h2>
                            <div class="single-footer-txt">
                                <p><a href="#">kullu manali</a></p>
                                <p><a href="#">jammu and kashmir</a></p>
                                <p><a href="#">mumbai</a></p>
                                <p><a href="#">delhi</a></p>
                                <p><a href="#">london</a></p>
                            </div>
                            <!--/.single-footer-txt-->
                        </div>
                        <!--/.single-footer-item-->
                    </div>
                    <!--/.col-->

                    <div class="col-sm-3">
                        <div class="single-footer-item text-center">
                            <h2 class="text-left">contacts</h2>
                            <div class="single-footer-txt text-left">
                                <p>+91-7986190670</p>
                                <p class="foot-email"><a href="#">abc@gmail.com</a></p>
                                <p>Susheela kaur (Roll No.10722012517) (BCA 6th Sem)</p>
                                <p>Ramanjit Kaur (Roll No.10722012509) (BCA 6th Sem)</p>

                                <p>Batala</p>
                                <p>Punjab </p>
                            </div>
                            <!--/.single-footer-txt-->
                        </div>
                        <!--/.single-footer-item-->
                    </div>
                    <!--/.col-->

                </div>
                <!--/.row-->

            </div>
            <!--/.footer-content-->
            <hr <!--/.foot-icons-->
            <div id="scroll-Top">
                <i class="fa fa-angle-double-up return-to-top" id="scroll-top" data-toggle="tooltip"
                    data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
            </div>
            <!--/.scroll-Top-->
        </div><!-- /.container-->

    </footer><!-- /.footer-copyright-->
    <!-- footer-copyright end -->




    <script src="assets/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <!--modernizr.min.js-->
    <script src="assets/cdn/modernizr.min.js"></script>


    <!--bootstrap.min.js-->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- bootsnav js -->
    <script src="assets/js/bootsnav.js"></script>

    <!-- jquery.filterizr.min.js -->
    <script src="assets/js/jquery.filterizr.min.js"></script>

    <script src="assets/cdn/jquery.easing.min.js"></script>

    <!--jquery-ui.min.js-->
    <script src="assets/js/jquery-ui.min.js"></script>

    <!-- counter js -->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>

    <!--owl.carousel.js-->
    <script src="assets/js/owl.carousel.min.js"></script>

    <!-- jquery.sticky.js -->
    <script src="assets/js/jquery.sticky.js"></script>

    <!--datepicker.js-->
    <script src="assets/js/datepicker.js"></script>

    <!--Custom JS-->
    <script src="assets/js/custom.js"></script>


</body>

</html>