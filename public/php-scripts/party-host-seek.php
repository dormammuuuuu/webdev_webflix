<?php
    include('initialize-db.php');

    $vidID = $_POST['vidID'];
    $seek = $_POST['seek'];
    $globalData = mysqli_query($conn, "UPDATE `party` SET `party_media_seek`= '$seek' WHERE party_id = '$vidID'");
    $result = mysqli_fetch_assoc($globalData);
    $status = $result['party_media_seek'];
    mysqli_close($conn);

    echo"done";

?>