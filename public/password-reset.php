<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include('php-scripts/initialize-db.php');
    ?>

    <form action="password-reset-code.php" method="POST">
        <span class="form-labels"> Email</span>
        <input type="email" name="email">
        <div id="errorMsgDiv">
            <p id="errorMsgForgotPass"></p>
        </div>
        <input type="submit" name="reset-link" id="forgot-pass" value="Send Password Reset Link">
    </form>
</body>
</html>