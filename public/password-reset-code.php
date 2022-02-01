<?php
    include('php-scripts/initialize-db.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    function send_password_reset($get_email, $token) {
        $mail->isSMTP();
    }

    if(isset($_POST['reset-link'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $token = md5(rand());

        $check_email = "SELECT email FROM user WHERE email='$email' LIMIT 1";
        $check_email_run = mysqli_query($conn, $check_email);

        if(mysqli_num_rows($check_email_run) > 0) {
            $row = mysqli_fetch_array($check_email_run);
            $get_email = $row['email'];

            $update_token = "UPDATE users SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
            $update_token_run = mysqli_query($conn, $update_token);

            if($update_token_run) {
                send_password_reset($get_mail, $token);
                echo 'We e-mailed you a password reset link';
                exit(0);
            } else {
                echo 'Something went wrong';
                exit(0);
            }
        } else {
            echo 'Email does not exist';
            exit(0);
        }
    }
?>