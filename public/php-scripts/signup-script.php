<?php 
    include('initialize-db.php');

    session_start();
    if(ISSET($_SESSION['id'])){
      header("location:home.php");
    }

    if(isset($_POST['submit'])){

        if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['confirm'])){

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $firstName = $_POST['firstname'];
            $lastName = $_POST['lastname'];
            $confirm = $_POST['confirm'];
            $token = md5(rand());
    
            $checkUsername = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `user` WHERE `userName` = '$username'"));
            $checkEmail = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '$email'"));

            if($checkUsername == 1 || $checkEmail == 1){
              if ($checkEmail == 1 && $checkUsername == 1){
                $message = "Username and Email is already taken";
                $username = "";
                $email = "";

              } elseif ($checkUsername == 1 && $checkEmail == 0){
                $message = "Username is already taken";
                $username = "";
              } else {
                $message = "Email is already taken";
                $email = "";
              }
            
            }else{
                if($confirm != $password) {
                  $message = "Password does not match";
                } else {
                    $query = "INSERT INTO `user`(`id`, `firstName`, `lastName`, `userName`, `email`, `avatar`, `password`, `verify_token`) VALUES (NULL,'$firstName','$lastName','$username','$email', 'default.png','$password', '$token')";
                    $cmd = mysqli_query($conn,$query) or die(mysqli_error($conn));    
                    if($cmd){
                      $firstName = $lastName = $email = $password = $username = "";
                      header ("location:login.php");
                    }else{
                      echo "Registration failed.";
                    }
                }
            }
        }else{
            $message = "All fields required";
        }
        echo '
                <div id="toast-id">
                  <div class="toast">
                    <div class="toast-container">
                      <div class="toast-content">
                        <div class="toast-icon">
                          <i class="fas fa-exclamation"></i>
                        </div>
                        <p class="toast-message">'.$message.'</p>
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
?>