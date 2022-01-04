<?php
	include("php-scripts/login.php");
?>
<DOCTYPE html>
<html>
	<head>
		<title> StreamHub | LOGIN </title>
			<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" type="text/CSS" href="styles/login.css">
			<link rel="stylesheet" type="text/CSS" href="styles/navbar.css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
			<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
			<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-auth.js"></script>
			<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-database.js"></script>
		</head>
	<body>
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
		<div class="container">
			<div class="flex-container">
				<div>
					<form method="post">
						<p id="mainheader"> STREAMHUB ACCOUNT LOGIN </p>
						<p id="subheader"> Welcome back! Log In with your Email or Phone Number </p> 
						<div class="phone-email">
							<button class="buttons"> Email </button>
							<button class="buttons"> Phone </button>
						</div>
						
							<span class="form-labels"> Email</span>
							<input type="email" class="user-input" name="email">
		
							<span class="form-labels"> Password</span>
							<input type="password" class="user-input" name="password">
						
						<div id="errorMsgDiv">
							<p id="errorMsgLogin"></p>
						</div>
						<input type="submit" name="submit" id="login" value="LOG IN">
						<a href="#" class="forgot-register"> Forgot password? </a>
						<a href="signup.php" class="forgot-register"> Register now </a>
					</form>
				</div>
				
				
				<div class="image-login">
					<div> <img src="assets/images/thumb.png" id="image"> </div>
					<div> <p id="tagline"> Watch. Enjoy. Binge. </p> </div>
				</div>

			</div>
		</div>

		<footer> <p id="footer"> © 2021 - 2022 StreamHub.com. All rights reserved. </p> </footer>
		<script src="script/firebase.js"></script>
		<script src="script/login.js"></script>
		<script src="script/register.js"></script>
		<script src="script/navbar.js"></script>
	</body>
</html>