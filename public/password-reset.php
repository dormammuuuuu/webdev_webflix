<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreamHub | Password Reset</title>
    <link rel="icon" href="assets/images/icon.ico">
    <link rel="stylesheet" href="styles/password_reset.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" type="text/CSS" href="styles/toast.css">
    <link rel="stylesheet" href="styles/fonts.css">
    <link rel="stylesheet" href="styles/bg.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
    
    <?php
        include('php-scripts/initialize-db.php');

        session_start();
        if(ISSET($_SESSION['id'])){
            header("location:home.php");
        }
        include('php-scripts/password-reset-code.php');
    ?>
    <nav>
        <div>
            <p><i class="brand fas fa-play-circle"></i></p>
        </div>
        <ul class="nav-menu">
            <li><a class="nav-link" href="index.php">Home</a></li>
            <li><a class="nav-link" href="index.php#about">About</a></li>
            <li><a class="nav-link" href="signup.php">Register</a></li>
        </ul>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
	<?php
		include("php-scripts/background.php");
	?>

    </div>
    

    <div class="form-container" id="pass-form">
        <form method="POST">
            <h2 class="form-labels"> Reset Password</h2>
            <p>Tell us the email address associated with your StreamHub account, and we’ll send you an email with a link to reset your password.</p>
            <input type="email" name="email">
            <div id="errorMsgDiv">
                <p id="errorMsgForgotPass"></p>
            </div>
            <input type="submit" name="reset-link" id="forgot-pass" value="Send Password Reset Link">
        </form>
    </div>
    <script src="script/toast.js"></script>
    <script src="script/navbar.js"></script>
</body>
</html>