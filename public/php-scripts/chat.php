<?php
    include('initialize-db.php');

    @session_start();
    $uid = $_SESSION['id'];
    $vidID = $_POST['vidID'];

    $getMessages = mysqli_query($conn, "SELECT * from party_chat WHERE party_id = '$vidID'");
    $result = mysqli_fetch_assoc($getMessages);

    if (!$result){
        Echo '<p class="no-message">No messages available</p>';
    } else {
        do{
            if ($result['sender_id'] == $uid){
                echo'
                    <div class="sender">
                        <div>
                            <p class="name">You</p>
                            <p class="sender-messages">'.$result['message'].'</p>
                        </div>
                    </div>
                ';
            } else {
                $getUser = mysqli_query($conn, "SELECT * FROM user WHERE id = {$result['sender_id']}");
                $userResult = mysqli_fetch_assoc($getUser);
                echo '
                    <div class="received">
                        <img class="user-avatar" src="assets/images/user_avatar/'.$userResult['avatar'].'" alt="">
                        <div>
                            <p class="name">'.$userResult['firstName'].' '.$userResult['lastName'].'</p>
                            <p class="received-messages">'.$result['message'].'</p>
                        </div>
                    </div>
                ';
            }
        } while ($result = mysqli_fetch_assoc($getMessages));
    }
    mysqli_close($conn);


?>