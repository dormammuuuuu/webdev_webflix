<?php 
    include('initialize-db.php');

    session_start();
    if(ISSET($_SESSION['id'])){
      header("location:home.php");
    }

    if(isset($_POST['submit'])){

        if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])){

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $firstName = $_POST['firstname'];
            $lastName = $_POST['lastname'];
    
            $checkUsername = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `user` WHERE `userName` = '$username'"));
            $checkEmail = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '$email'"));

            if($checkUsername == 1 || $checkEmail == 1){
                echo '
                <div id="toast-id">
                  <div class="toast">
                    <div class="toast-container">
                      <div class="toast-content">
                        <div class="toast-icon">
                          <i class="fas fa-exclamation"></i>
                        </div>
                        <p class="toast-message"></p>
                      </div>
                      <div class="toast-dismiss">
                        <i class="fas fa-times"></i>
                      </div>
                    </div>
                    <div id="toast-progress"></div>
                  </div>
                </div>
                ';

              if ($checkEmail == 1 && $checkUsername == 1){
                echo '
                <script>
                  $(function () {
                    $(".toast-message").text("Username and Email is already taken.");
                  });
                </script>
                
                ';
                $username = "";
                $email = "";

              } elseif ($checkUsername == 1 && $checkEmail == 0){
                echo '
                <script>
                  $(function () {
                    $(".toast-message").text("Username is already taken");
                  });
                </script>
               
                ';
                $username = "";
              } else {
                echo '
                <script>
                  $(function () {
                    $(".toast-message").text("Email is already taken");
                  });
                </script>
              
                ';
                $email = "";
              }
            
            }else{
                
                $query = "INSERT INTO `user`(`id`, `firstName`, `lastName`, `userName`, `email`, `avatar`, `password`) VALUES (NULL,'$firstName','$lastName','$username','$email', 'NONE','$password')";
                $cmd = mysqli_query($conn,$query) or die(mysqli_error($conn));    
                if($cmd){
                   $firstName = $lastName = $email = $password = $username = "";

                   header ("location:login.php");
                }else{
                   echo " Registration not Succcesful";
                }
            }
        }else{
            echo "all fields required!";
        }
    }
?>