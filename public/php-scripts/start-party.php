<?php
    include('initialize-db.php');
    
    $myuid = uniqid('strmhb');
    @session_start();
    $type = "movie";
    $uid = $_SESSION['id'];
    $addParty = mysqli_query($conn, "INSERT INTO `party`(`party_id`, `host_id`, `party_media`, `party_media_type`, `party_media_time`, `party_media_activity`) VALUES ('$myuid', {$_SESSION['id']}, $uid,'$type',0,'null')");

    echo ($myuid);
?>