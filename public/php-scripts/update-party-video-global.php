<?php
    include('initialize-db.php');
    $vidID = $_POST['vidID'];

    $addParty = mysqli_query($conn, "SELECT * from party WHERE party_id = '$vidID'");
    $addPartyResult = mysqli_fetch_assoc($addParty);

    $currentTime = (int) $addPartyResult['party_media_time'];
    mysqli_close($conn);
    echo '
        <script>
            video.currentTime = '.$currentTime.';
            video.play();
        </script>
    ';
?>