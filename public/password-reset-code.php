<?php
    include('php-scripts/initialize-db.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'php-scripts/vendor/autoload.php';

    function send_password_reset($get_email, $token) {
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 2;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->Username   = 'streamhubemail@gmail.com';                     //SMTP username
        $mail->Password   = 'streamhub12321';                               //SMTP password
        $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
        $mail->SMTPAutoTLS = false;

        $mail->Port       = 587;                                    


        $mail->setFrom('streamhubemail@gmail.com', 'Mailer');
        $mail->addAddress($get_email);     //Add a recipient

        $mail->isHTML(true);
        $mail->Subject = "Reset Password Notification";

        $email_template = "
            <p>Test<p>
            <a href='localhost/password-change.php?token=$token&email=$get_email'>Click here</a>
        ";

        $mail->Body = $email_template;
        $mail->send();
    }

    if(isset($_POST['reset-link'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
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