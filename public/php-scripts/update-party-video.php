<?php
    include('initialize-db.php');
    $vidTime = $_POST['vidTime'] ?: 0;
    $vidID = $_POST['vidID'];

    $addParty = mysqli_query($conn, "UPDATE `party` SET `party_media_time`= '$vidTime' WHERE party_id = '$vidID'");
    mysqli_close($conn);
    echo "DONE";
?>