<?php
    include('initialize-db.php');

    $vidID = $_POST['vidID'];
    $globalData = mysqli_query($conn, "UPDATE `party` SET `party_media_seek`= '0' WHERE party_id = '$vidID'");
        
    mysqli_close($conn);
    echo "seek done";

?>