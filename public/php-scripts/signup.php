<?php 
    include('initialize-db.php');

    if(isset($_POST['submit'])){

        if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])){

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $firstName = $_POST['firstname'];
            $lastName = $_POST['lastname'];

            echo $username;
            echo $email;
            echo $password;
            echo $firstName;
            echo $lastName;
    
            $checkUsername = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `user` WHERE `userName` = '$username'"));
            $checkEmail = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '$email'"));

            if($checkUsername == 1 || $checkEmail == 1){
                echo '
                EMAIL AND USERNAME ALREADY TAKEN
              ';
              if ($checkEmail == 1 && $checkUsername == 1){
                echo '
                  USERNAME AND EMAIL ALREADY TAKEN
                ';
              } elseif ($checkUsername == 1 && $checkEmail == 0){
                echo '
                USERNAME ALREADY TAKEN
                ';
              } else {
                echo '
                  EMAIL IS ALREADY TAKEN
                ';
              }
            
            }else{
                
                $query = "INSERT INTO `user`(`id`, `firstName`, `lastName`, `userName`, `email`, `avatar`, `password`) VALUES (NULL,'$firstName','$lastName','$username','$email', 'NONE','$password')";

                $cmd = mysqli_query($conn,$query) or die(mysqli_error($conn));
                
    
                if($cmd){
                   // echo " Registration Succcesful !";
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