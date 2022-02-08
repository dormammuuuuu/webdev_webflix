<?php 
    include('initialize-db.php');

    session_start();
    if(ISSET($_SESSION['id'])){
      header("location:home.php");
    }
      if(isset($_POST['submit'])){
      if(!empty($_POST['email']) && !empty($_POST['password'])){

          $email = $_POST['email'];
          $password = $_POST['password'];
          $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";

          $cmd = mysqli_query($conn,$query);
          $row = mysqli_fetch_array($cmd);
          $count = mysqli_num_rows($cmd);

          if($count == 1){
              session_start();
              $_SESSION['id'] = $row['id'];
              header("location:home.php");
          }else{
            $message = "The username/email or password you've entered is incorrect.";
            
          }

      }else{
          $message = "All fields required.";
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