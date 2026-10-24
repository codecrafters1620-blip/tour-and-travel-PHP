<?php include("connection.php");?>

<?php session_start();?>

<?php



if(isset($_SESSION["email"])){
    if($_SESSION["email"]==""){
        header("LOCATION:login.php");
    }
}else{
    header("LOCATION:login.php");

}
?>

<?php

if(isset($_SESSION["email"])){
    $emails=$_SESSION["email"];
}
$id=0;
if(isset($_GET["id"])){
    $id=$_GET["id"];
}
$name="";
$imgshow="";
$package_price="";
$package_duration="";
$bookpackageshow="";
$package_type="";
$packageshow="";
$show="select * from addpackages where id=".$id;
$result=$conn->query($show);
while($row=$result->fetch()){
    $name=$row["package_name"];
    $imgshow=$row["uploadfile"];
    $package_duration=$row["package_duration"];
    $package_price=$row["package_price"];
    $package_type=$row["package_type"];

     
    $bookpackageshow=$bookpackageshow."
    
    <div class='col-md-4 col-sm-6 marg'>
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
        </div>
        <!--/.single-package-item-txt-->
    </div>
    <!--/.single-package-item-->

</div>
    
    
    ";

}

if(isset($_POST["bookpackage"])){
    $package_name=$_POST["package_name"];
    $package_durations=$_POST["package_duration"];
    $package_rates=$_POST["package_rate"];
    $package_types=$_POST["package_type"];
    $uploadimg=$_POST["uploadimg"];
  
    $transactionid="tr".rand();
    

    $nameuser=$_POST["name"];
    $email=$_POST["emailid"];
    $mobileno=$_POST["mobileno"];
    $tourdate=$_POST["tourdate"];

    $insertqry="INSERT INTO `tbl_booking` (`uploadimg`, `name`, `emailid`, `mobileno`, `tourdate`, `package_name`, `package_rate`, `package_duration`, `package_type`) VALUES 
    ('".$uploadimg."','".$nameuser."','".$email."','".$mobileno."','".$tourdate."','".$package_name."','".$package_rates."','".$package_durations."','".$package_types."')";
    $conn->query($insertqry);
    echo "<script>
    alert('Waiting for confirmation');
    window.location.href='http://localhost/TOUR%20AND%20TRAVEL/bookedpackages.php';
    </script>";
}
?>
<!doctype html>
<html class="no-js" lang="en">
<?php

?>

<head>
    <style>
    .marg {
        margin-top: 30px;
        padding: 30px;
        border: 2px solid black;

    }
    .sho{
        position: relative;
        top:200px;
    }
    .back{
        background-color:grey;
    }
    </style>
    <!-- META DATA -->
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
    <header class="top-area back">
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
                                    <li class=""><a href="index.php">home</a></li>
                                    <li class=""><a href="index.php">Destination</a></li>
                                    <li class=""><a href="index.php">Packages </a></li>
                                    <li>
                                        <button class="book-btn">book now
                                        </button>
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
   
    <div class="container sho">
        <div class="row">
        <?php echo $bookpackageshow;?>

            <div class="col-md-5">
                <form class="marg" action="book_package.php" method="POST">
                    <h1
                        style="text-align:center; color:red; font-size:40px; color:white;padding:10px; font-family:timesnewroman; font-weight:bold; margin-bottom:20px; background-color:blue;">
                        Book Package </h1>
                        <input type="hidden" class="form-control" id="name" value="<?php echo $name;?>"name="package_name" placeholder="Name...." required>
                        <input type="hidden" class="form-control" id="name" value="<?php echo $package_price;?>"name="package_rate" placeholder="Name...." required>
                        <input type="hidden" class="form-control" id="name" value="<?php echo $package_duration;?>"name="package_duration" placeholder="Name...." required>
                        <input type="hidden" class="form-control" id="name" value="<?php echo $package_type;?>"name="package_type" placeholder="Name...." required>
                        <input type="hidden" class="form-control" id="name" value="<?php echo $imgshow;?>"name="uploadimg" placeholder="Name...." required>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name...." required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Email Id</label>
                            <input type="email" class="form-control" value="<?php echo $emails;?>" id="emailid" name="emailid" placeholder="Email Id....." required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Mobile No.</label>
                            <input type="text" class="form-control" id="mobileno" name="mobileno" placeholder="Mobile No.." required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4"> Tour Date:</label>
                            <input type="date" class="form-control" id="tourdate" name="tourdate" placeholder="Tour Date" required>
                        </div>
                    </div>


                    <input type="submit" class="btn btn-primary" name="bookpackage" value="Book and Pay">
                   
                   
                </form>


            </div>
            </div>

        </div>


    </div>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>



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
                                <p>Ramanjit Kaur  (Roll No.10722012509) (BCA 6th Sem)</p>

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
            <hr>
             
            <div id="scroll-Top">
                <i class="fa fa-angle-double-up return-to-top" id="scroll-top" data-toggle="tooltip"
                    data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
            </div>
            <!--/.scroll-Top-->
        </div><!-- /.container-->

    </footer>




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
    <script src="https://www.paypal.com/sdk/js?client-id=AfB_gEwJ7MrFrw8246dYWh8cvqD73CaVhL3TjUsHgzZbucP7JvGfPHNvHoci-pwBxcB9VujdQLmZHDcR"></script>
   </script>
   
</body>

</html>