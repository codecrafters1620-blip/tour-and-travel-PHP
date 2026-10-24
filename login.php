<?php include("connection.php");?>
<?php
session_start();
$bookpackageshow="";
$packageshow="";
$show="select * from addpackages limit 4";
$result=$conn->query($show);
while($row=$result->fetch()){
    $name=$row["package_name"];
    $imgshow=$row["uploadfile"];
    $packageshow=$packageshow."
    
    <div class='col-md-6'>
    <div class='filtr-item'>
        <img src='data/items/og/".$imgshow."' alt='portfolio image' />
        <div class='item-title'>
            <a href='#'>
                ".$row["package_name"]."
            </a>
            <p><span>12 tours</span><span>9 places</span></p>
        </div> <!-- /.item-title-->
    </div><!-- /.filtr-item -->
</div><!-- /.col -->
    
    
    
    
    ";    
    $bookpackageshow=$bookpackageshow."
    
    <div class='col-md-4 col-sm-6'>
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
if(isset($_POST["create"])){
echo "clicked";
}
?>
<!doctype html>
<html class="no-js" lang="en">
<?php
$email="";
$password="";
$login="select email,password from usersign";
$result=$conn->query($login);
while($row=$result->fetch())
{
    $email=$row["email"];
    $password=$row["password"];

}
if(isset($_POST["login"])){
    $emails=$_POST["email"];
    $passwords=$_POST["password"];
    if($emails==$email&&$passwords==$password){
        echo "<script>
        alert('Login Successful and select your package');
        window.location.href='http://localhost/TOUR%20AND%20TRAVEL/index1.php';
        </script>";
    }
    else{
        echo "<script>
        alert('password or email id invalid');
        </script>";
    }

}
$_SESSION["email"]=$email;

?>

<head>
    <style>
        
        body {
    /* Set a background image with an overlay */
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                url('assets/images/home/user.png'); /* Path to your image */
    background-size: cover; /* Ensures the image covers the entire background */
    background-position: center; /* Centers the image */
    background-repeat: no-repeat; /* Prevents the image from repeating */
    height: 100vh; /* Full height */
    margin: 0; /* Remove default margin */
    display: flex; /* Flexbox for centering */
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    font-family: 'Poppins', sans-serif; /* Use a modern font */
}

.marg {
    width: 140%; /* Use responsive width */
    max-width: 600px; /* Maximum width for larger screens */
    background-color: rgba(255, 255, 255, 0.9); /* Slight transparency for readability */
    border-radius: 15px; /* Rounded corners */
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3); /* Shadow effect */
    padding: 40px; /* Padding */
    margin-right:315px;
    font-size: 18px; /* Font size */
    box-sizing: border-box; /* Ensure padding is included in width */
    transition: transform 0.3s; /* Add transition for animation */
}

.marg:hover {
    transform: scale(1.02); /* Slightly scale up on hover */
}

.marg1 {
    font-size: 36px; /* Heading font size */
    text-align: center; /* Center heading text */
    color: white; /* Text color */
    margin-bottom: 20px; /* Space below heading */
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5); /* Text shadow for depth */
}

.form-group {
    margin-bottom: 20px; /* Space between form fields */
}

label {
    color: #333; /* Label color */
    font-weight: bold; /* Bold labels */
}

.form-control {
    border: 1px solid #ddd; /* Border color */
    border-radius: 5px; /* Rounded input fields */
    padding: 10px; /* Padding inside input fields */
    transition: border-color 0.3s; /* Transition for border color */
}

.form-control:focus {
    border-color: #007bff; /* Change border color on focus */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Shadow on focus */
    outline: none; /* Remove default outline */
}

.btn {
    background-color: #007bff; /* Primary button color */
    color: white; /* Button text color */
    padding: 10px; /* Padding */
    border-radius: 5px; /* Rounded button */
    border: none; /* Remove border */
    cursor: pointer; /* Pointer cursor */
    transition: background-color 0.3s, transform 0.3s; /* Transition for button */
    width: 100%; /* Full width button */
}

.btn:hover {
    background-color: #0056b3; /* Darker button color on hover */
    transform: translateY(-2px); /* Lift effect on hover */
}

a {
    display: block; /* Block display for the link */
    text-align: center; /* Center the link */
    margin-top: 10px; /* Space above link */
    color: #007bff; /* Link color */
    text-decoration: none; /* Remove underline */
    transition: color 0.3s; /* Transition for link color */
}

a:hover {
    color: #0056b3; /* Darker link color on hover */
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

<body class="sbody">


    <h1 class="marg1" style="color:blue;font-size:30px;"> Login Form </h1>
    <div class="marg">
        
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="color:white">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter email" name="email" required>
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" style="color:white" >Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
                    </div>
                    <br/>
                    <br/>

                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                    <a href="usersignup.php">Create your account</a>
                </form>
            
    </div>



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