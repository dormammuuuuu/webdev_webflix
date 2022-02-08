<?php

    include('initialize-db.php');

    $userEmail = $_POST['userEmail'];
    $query = mysqli_query($conn, "SELECT * FROM user WHERE email = '$userEmail'");
    $result = mysqli_fetch_assoc($query);

    if (!$result){
        echo'
            <script>
                window.location.href = "signup.php?email='.$userEmail.'";
            </script>
        ';
    } else {
        echo'
            <script>
                window.location.href = "login.php?email='.$userEmail.'";
            </script>
        ';
    }


?>