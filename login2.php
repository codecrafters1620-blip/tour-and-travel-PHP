<?php include("connection.php"); ?>
<?php
session_start();
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
            </div>
        </div>
    </div>";

    $bookpackageshow .= "
    <div class='col-md-4 col-sm-6'>
        <div class='single-package-item'>
            <img src='data/items/og/" . $imgshow . "' alt='package-place'>
            <div class='single-package-item-txt'>
                <h3>" . $row["package_name"] . " <span class='pull-right'> Rs:  " . $row["package_price"] . "</span></h3>
                <div class='packages-para'>
                    <p><span><i class='fa fa-angle-right'></i> " . $row["package_duration"] . "</span></p>
                    <p><span><i class='fa fa-angle-right'></i> transportation</span> <i class='fa fa-angle-right'></i> " . $row["package_features"] . "</p>
                </div>
                <div class='packages-review'>
                    <p><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><span>2544 review</span></p>
                </div>
                <div class='about-btn'>
                    <a href='book_package.php?id=" . $row["id"] . "' class='btn btn-success'> Book Now </a>
                </div>
            </div>
        </div>
    </div>";
}

if (isset($_POST["create"])) {
    echo "clicked";
}
$email = "";
if(isset($_POST["login"]))
{
    
    $emails = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT email,password from usersign where email = '$emails'";
    $result = $conn->query($sql);
    $row = $result->fetch();
    if($row)
    {
        if($row["password"] == $password){
            echo "<script>
            alert('Login Successful');
            window.location.href='http://localhost/TOUR%20AND%20TRAVEL/index1.php';
            </script>";
        } else {
            echo "<script>
            alert('password or email id invalid');
            </script>";
        }
    }
}
$_SESSION["email"]=$email;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Travel</title>
    <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png" />
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <style>
        body {
            background-image: url('assets/images/home/user.png'); /* Path to your image */
            background-size: cover; /* Ensures the image covers the entire background */
            background-position: center; /* Centers the image */
            background-repeat: no-repeat; /* Prevents the image from repeating */
            height: 100vh; /* Full height */
            margin: 0; /* Remove default margin */
            display: flex; /* Flexbox for centering */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent white for better readability */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Shadow effect */
            padding: 40px; /* Padding */
            width: 400px; /* Fixed width */
        }
        h1 {
            text-align: center; /* Center heading */
            color: #333; /* Dark color for text */
        }
        label {
            color: #333; /* Dark color for labels */
        }
        .form-control {
            margin-bottom: 20px; /* Space between fields */
        }
        .btn {
            width: 100%; /* Full width button */
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login Form</h1>
        <form action="login2.php" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="login" >Login</button>
            <a href="usersignup.php">Create your account</a>
            <button type="submit" class="btn btn-primary" name="Admin" style="margin-top: 10px;">
                <a href="admin/login.php" style="color:white; text-decoration: none;">Admin</a>
            </button>
        </form>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
