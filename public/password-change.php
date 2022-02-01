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

        $token = $_GET['token'];
        $check_token = "SELECT verify_token FROM user WHERE verify_token='$token' LIMIT 1";
        $check_token_run = mysqli_query($conn, $check_token);

        if(mysqli_num_rows($check_token_run) == 0) {
            header("Location:404.html");
        }
    ?>

    <form action="password-reset-code.php" method="POST">
        <input type="hidden" name="token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];}?>">
        <span class="form-labels"> New password</span>
        <input type="password" name="new-pass">
        <span class="form-labels"> Confirm new password</span>
        <input type="password" name="confirm-new-pass">
        <div id="errorMsgDiv">
            <p id="errorMsgForgotPass"></p>
        </div>
        <input type="submit" name="password-update" value="Confirm">
    </form>
</body>
</html>