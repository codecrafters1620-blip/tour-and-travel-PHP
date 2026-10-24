<?php include("connection.php"); ?>
<?php
$bookpackageshow = "";
$packageshow = "";
$show = "SELECT * FROM addpackages LIMIT 4";
$result = $conn->query($show);
while ($row = $result->fetch()) {
    $name = $row["package_name"];
    $imgshow = $row["uploadfile"];
    $packageshow .= "
    <div class='col-md-6'>
        <div class='filtr-item'>
            <img src='data/items/og/" . $imgshow . "' alt='portfolio image' />
            <div class='item-title'>
                <a href='#'>" . $row["package_name"] . "</a>
                <p><span>12 tours</span><span>9 places</span></p>
            </div> <!-- /.item-title-->
        </div><!-- /.filtr-item -->
    </div><!-- /.col -->";

    $bookpackageshow .= "
    <div class='col-md-4 col-sm-6'>
        <div class='single-package-item'>
            <img src='data/items/og/" . $imgshow . "' alt='package-place'>
            <div class='single-package-item-txt'>
                <h3>" . $row["package_name"] . " <span class='pull-right'> Rs:  " . $row["package_price"] . "</span></h3>
                <div class='packages-para'>
                    <p>
                        <span>
                            <i class='fa fa-angle-right'></i> " . $row["package_duration"] . "
                        </span>
                    </p>
                    <p>
                        <span>
                            <i class='fa fa-angle-right'></i> transportation
                        </span>
                        <i class='fa fa-angle-right'></i> " . $row["package_features"] . "
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
                    <a href='book_package.php?id=" . $row["id"] . "' class='btn btn-success'> Book Now </a>
                </div>
                <!--/.about-btnn t-->
            </div>
            <!--/.single-package-item-txt-->
        </div>
        <!--/.single-package-item-->
    </div>";
}

if (isset($_POST["signup"])) {
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    if ($password != $confirmpassword) {
        echo "<script>
        alert('Passwords should match');
        </script>";
    } else {
        $insert = "INSERT INTO usersign (email, mobile, password, confirmpassword) VALUES ('" . $email . "','" . $mobile . "','" . $password . "','" . $confirmpassword . "')";
        $conn->query($insert);
        echo "<script>
        alert('Registered Successfully');
        window.location.href='http://localhost/TOUR%20AND%20TRAVEL/login2.php';
        </script>";
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <style>
        body {
            display: flex; /* Use flexbox for layout */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            height: 100vh; /* Full height of the viewport */
            margin: 0; /* Remove default margin */
            background-color: orange; /* Background color for the body */
        }

        .signup-container {
            background-color: white; /* White background for the form */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Shadow effect */
            padding: 40px; /* Padding */
            width: 400px; /* Fixed width */
        }

        h1 {
            text-align: center; /* Center heading */
            color: red; /* Color for the heading */
            margin-bottom: 20px; /* Space below the heading */
        }
    </style>
    <!-- META DATA -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Travel</title>
    <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png" />
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>

    <div class="signup-container">
        <h1>Signup Form</h1>
        <form action="usersignup.php" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1" style="color:red">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label for="mobile" style="color:red">Mobile No.</label>
                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile No." required>
            </div>
            <div class="form-group">
                <label for="password" style="color:red">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="confirmpassword" style="color:red">Confirm Password</label>
                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="signup">Signup</button>
            <a href="login.php">If you already created an account, click on login</a>
        </form>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
