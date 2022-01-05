<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "streamhub";

    $conn = mysqli_connect($server, $username, $password, $databaseName);
    

    if(mysqli_connect_errno()){
        exit();
    }
    
    $firstName = $lastName = $email = $password = $username = "";

?>