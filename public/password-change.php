<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreamHub | Change Password</title>
    <link rel="icon" href="assets/images/icon.ico">
    <link rel="stylesheet" href="styles/password_reset.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" type="text/CSS" href="styles/toast.css">
    <link rel="stylesheet" href="styles/fonts.css">
	<link rel="stylesheet" type="text/CSS" href="styles/bg.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include('php-scripts/initialize-db.php');

        $token = $_GET['token'];
		if (!$token || ISSET($_SESSION['id'])){
			header('location:home.php');
		}
        $check_token = "SELECT verify_token FROM user WHERE verify_token='$token' LIMIT 1";
		if (!$check_token){
			header('location:home.php');
		}
        $check_token_run = mysqli_query($conn, $check_token);
        $cmd = mysqli_query($conn, "SELECT email FROM user WHERE verify_token = '$token'");
        $user = mysqli_fetch_array($cmd);

        if(mysqli_num_rows($check_token_run) == 0) {
            header("Location:404.html");
        }
    ?>

	<nav>
        <div>
            <p><i class="brand fas fa-play-circle"></i></p>
        </div>
        <ul class="nav-menu">
            <li><a class="nav-link" href="index.html">Home</a></li>
            <li><a class="nav-link" href="index.html#about">About</a></li>
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
    <div class="form-container" >
        <form method="POST" id="password-submit">
            <h2>Enter a new password for:</h2>
            <p id="user-email"><?php echo $user['email'] ?: "" ?></p>
            <input type="hidden" id="token" name="token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];}?>">
            <p class="form-labels"> New password</p>
            <input id="password" type="password" name="new-pass">
            <p class="form-labels"> Confirm new password</p>
            <input id="confirm-password" type="password" name="confirm-new-pass">
            <div id="errorMsgDiv">
                <p id="errorMsgForgotPass"></p>
            </div>
            <input type="submit" name="password-update" value="Save new password">
        </form>
    </div>
	<div class="form-container" id='pass-form-success'>
		<h2>Password has been changed. You will be redirected at the log-in page.</h2>
		<a href="login.php">Click here if you're not redirected.</a>
	</div>
	<div id="success"></div>
    <script src="script/toast.js"></script>
    <script src="script/navbar.js"></script>
    <script src="script/password-change.js"></script>
</body>
</html>