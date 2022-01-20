<?php
    include('initialize-db.php');

    $old_password = $_POST['password'];
    $new_password = $_POST['newPassword'];
    $confirm_password = $_POST['confPassword'];
    session_start();
    $uid = (int) $_SESSION['id'];
    $query = mysqli_query($conn, "SELECT password FROM user WHERE id = $uid");
    $accountPassword = mysqli_fetch_assoc($query);
    $password = $accountPassword['password'];
    $status_message = "";

    if ($old_password == "" || $new_password == "" || $confirm_password == ""){
        $status_message = "All fields required!";
    } else {
        if ($old_password == $password){
            if ($confirm_password == $new_password){
                $query = mysqli_query ($conn, "UPDATE `user` SET `password`='$confirm_password' WHERE id = '$uid'") or die (mysqli_error($conn));
                $query = mysqli_query ($conn, "SELECT * FROM user WHERE id = '$uid' ") or die (mysqli_error($conn));
        
                $account = mysqli_fetch_array ($query);
        
                $status_message = "Your password has been changed.";
    
            } else {
                $status_message = "New password and confirm password doesn't match.";
            }
        } else {
            $status_message = "Your current password is incorrect.";
        }
    }
    
    echo '
        <div id="toast-id">
            <div class="toast">
            <div class="toast-container">
                <div class="toast-content">
                <div class="toast-icon">
                    <i class="fas fa-exclamation"></i>
                </div>
                <p class="toast-message">'.$status_message.'</p>
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


?>