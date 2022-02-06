<?php
    include('initialize-db.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    function send_password_reset($get_email, $token) {
        $mail = new PHPMailer(true);
        //$mail->SMTPDebug = 2;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->Username   = 'streamhubemail@gmail.com';                     //SMTP username
        $mail->Password   = 'streamhub12321';                               //SMTP password
        $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
        $mail->SMTPAutoTLS = false;

        $mail->Port       = 587; 


        $mail->setFrom('streamhubemail@gmail.com', 'StreamHub');
        $mail->addAddress($get_email);     //Add a recipient

        $mail->isHTML(true);
        $mail->Subject = "Reset Password Notification";

        $email_template = "
            <p>We received a request to reset your StreamHub password. You can directly change your password by clicking the link:<p>
            <a href='localhost/password-change.php?token=$token'>Click here</a>
            <p>If you didn't request a new password, ignore this email.</p>
        ";

        $mail->Body = $email_template;
        $mail->send();
    }
    if(isset($_POST['reset-link'])) {
        $email = $_POST['email'];
        $token = md5(rand());

        $check_email = "SELECT email FROM user WHERE email='$email' LIMIT 1";
        $check_email_run = mysqli_query($conn, $check_email);

        if(mysqli_num_rows($check_email_run) > 0) {
            $row = mysqli_fetch_array($check_email_run);
            $get_email = $row['email'];

            $update_token = "UPDATE user SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
            $update_token_run = mysqli_query($conn, $update_token);

            if($update_token_run) {
                send_password_reset($get_email, $token);
                $stat =  'We e-mailed you a password reset link';
            } else {
                $stat =  'Something went wrong';
            }
        } else {
            $stat =  'Email does not exist';
        }
        echo '
            <div id="toast-id">
                <div class="toast">
                <div class="toast-container">
                    <div class="toast-content">
                    <div class="toast-icon">
                        <i class="fas fa-exclamation"></i>
                    </div>
                    <p class="toast-message">'.$stat.'</p>
                    </div>
                    <div class="toast-dismiss">
                    <i class="fas fa-times"></i>
                    </div>
                </div>
                <div id="toast-progress"></div>
                </div>
            </div>
        ';
    }

    if(isset($_POST['password-update'])) {
        
    }
?>