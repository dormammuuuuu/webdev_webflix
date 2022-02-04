<?php
    include('initialize-db.php');

    $vidID = $_POST['vidID'];
    $status = $_POST['status'];

    $addParty = mysqli_query($conn, "UPDATE `party` SET `party_media_activity`= '$status' WHERE party_id = '$vidID'");
    mysqli_close($conn);
    echo "DONE";

?>