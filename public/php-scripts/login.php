<?php 
    include('initialize-db.php');

    if(isset($_POST['submit'])){
        if(!empty($_POST['email']) && !empty($_POST['password'])){

            $email = $_POST['email'];
            $password = $_POST['password'];
            echo $email;
            echo $password;
            $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";

            $cmd = mysqli_query($conn,$query);
            $row = mysqli_fetch_array($cmd);
            $count = mysqli_num_rows($cmd);

            if($count == 1){
                session_start();
                $_SESSION['id'] = $row['id'];
                header("location:home.php");
            }else{
               echo "Error";
            }

        }else{
            echo "all fields required!";
        }
    }
?>