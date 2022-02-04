<?php
    include('initialize-db.php');

    $vidID = $_POST['vidID'];
    $globalSeekData = mysqli_query($conn, "SELECT `party_media_seek` FROM party WHERE party_id = '$vidID'");
    $result = mysqli_fetch_assoc($globalSeekData);
    $seekStatus = $result['party_media_seek'];

    if ($seekStatus != '0'){
        echo '
            <script>
                video.currentTime = '.$seekStatus.';
            </script>
        ';
    }
    mysqli_close($conn);
    echo "seek done";

?>