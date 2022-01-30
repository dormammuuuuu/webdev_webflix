<?php
    include('initialize-db.php');

    $dataID = $_POST['dataID'];
    $type = $_POST['type'];
    session_start();
    $uid = $_SESSION['id'];

    $sql = "SELECT * FROM user_favorites WHERE user_id = $uid AND ms_type = '$type' AND favorite_id = $dataID";
    $fetch = $conn->query($sql) or die ($conn->error);
    $dataFetched = $fetch->fetch_assoc();

    if(empty($dataFetched)){
        $sql = "INSERT INTO `user_favorites`(`user_id`, `favorite_id`, `ms_type`) VALUES ($uid,$dataID,'$type')";
        $fetch = $conn->query($sql) or die ($conn->error);
    } else {
        $sql = "DELETE FROM `user_favorites` WHERE user_id = $uid AND ms_type = '$type' AND favorite_id = $dataID";
        $fetch = $conn->query($sql) or die ($conn->error);
    }

    echo '
        <div id="toast-id">
        <div class="toast">
            <div class="toast-container">
            <div class="toast-content">
                <div class="toast-icon">
                <i class="fas fa-exclamation"></i>
                </div>
                <p class="toast-message">Successfully added to your list.</p>
            </div>
            <div class="toast-dismiss">
                <i class="fas fa-times"></i>
            </div>
            </div>
            <div id="toast-progress"></div>
        </div>
        </div>
    ';

?>