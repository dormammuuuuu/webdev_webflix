<?php
    include('initialize-db.php');

    $vidID = $_POST['vidID'];
    $globalData = mysqli_query($conn, "SELECT * FROM party WHERE party_id = '$vidID'");
    $result = mysqli_fetch_assoc($globalData);
    $status = $result['party_media_activity'];
    print $status;
    mysqli_close($conn);

    echo'<script>';
    if ($status == "play"){
        echo'video.play();';
    } else {
        echo'video.pause();';
    }
    echo'</script>';

?>