<?php
    include('initialize-db.php');

    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $username = $_POST['username'];
    $confirm_password = $_POST['password'];
    session_start();
    $uid = (int) $_SESSION['id'];
    $query = mysqli_query($conn, "SELECT password FROM user WHERE id = $uid");
    $accountPassword = mysqli_fetch_assoc($query);
    $password = $accountPassword['password'];

    if ($confirm_password == $password){
        $query = mysqli_query ($conn, "UPDATE `user` SET `firstName`='$firstName',`lastName`='$lastName',`userName`='$username' WHERE id = '$uid'") or die (mysqli_error($conn));
        $query = mysqli_query ($conn, "SELECT * FROM user WHERE id = '$uid' ") or die (mysqli_error($conn));

        $account = mysqli_fetch_array ($query);

        echo'
            <div id="toast-id">
                <div class="toast">
                <div class="toast-container">
                    <div class="toast-content">
                    <div class="toast-icon">
                        <i class="fas fa-exclamation"></i>
                    </div>
                    <p class="toast-message">Account details were successfully updated.</p>
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
    } else {
        echo '
            <div id="toast-id">
                <div class="toast">
                <div class="toast-container">
                    <div class="toast-content">
                    <div class="toast-icon">
                        <i class="fas fa-exclamation"></i>
                    </div>
                    <p class="toast-message">The password you entered is incorrect</p>
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