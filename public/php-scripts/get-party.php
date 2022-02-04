<?php
    include('initialize-db.php');

    $partyID = $_POST['watchID'];
    $query = mysqli_query($conn, "SELECT * FROM party WHERE party_id = '$partyID'") or die($conn);
    $result = mysqli_fetch_assoc($query);
    $watchID = $result['party_media'];

    echo'
        <script>
            window.location.href = "http://localhost/party.php?watch='.$watchID.'&key='.$partyID.'";
        </script>
    ';
     
?>