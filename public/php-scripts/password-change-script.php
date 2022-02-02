<?php
    include('initialize-db.php');

    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirmpass'];
    $token = $_POST['token'];
    $userEmail = $_POST['email'];
    if(!empty($token)) {
        if(!empty($new_password) && !empty($confirm_password)) {
            $check_token = "SELECT verify_token FROM user WHERE verify_token='$token' LIMIT 1";
            $check_token_run = mysqli_query($conn, $check_token);

            if(mysqli_num_rows($check_token_run) > 0) {
                if($new_password == $confirm_password) {
                    $update_password = "UPDATE user SET password='$new_password' WHERE verify_token='$token'";
                    $update_password_run = mysqli_query($conn, $update_password);
                    
                    if($update_password_run) {
                        $stat = 'Password has been updated!';
                        $newtoken = md5(rand());
                        $update_token_query = "UPDATE user SET verify_token='$newtoken' WHERE email='$userEmail'";
                        $update_token = mysqli_query($conn, $update_token_query);
                        echo'
                            <script>
                                $("#pass-form-success").show();
                                $("#password-submit").remove();
                                setTimeout(() => {
                                    window.location.href = "login.php";
                                }, 7000);
                            </script>
                            ';
                    } else {
                        $stat = 'Password did not update, Something went wrong.';
                    }
                } else {
                    $stat = 'Password does not match';
                }
            } else {
                $stat = 'Invalid token';
            }
        } else {
            $stat = 'Please input empty fields';
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
        <script src="script/toast.js"></script>
    ';
    }

?>