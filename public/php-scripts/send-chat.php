<?php

    include ('initialize-db.php');

    @session_start();
    $uid = $_SESSION['id'];
    $message = $_POST['message'];
    $vidID = $_POST['vidID'];

    $query = mysqli_query($conn, "INSERT INTO `party_chat`(`id`, `party_id`, `message`, `sender_id`) VALUES (NULL, '$vidID','$message', $uid)");


    echo'
        <script>
            let height = 0;
            $(".sender, .received").each(function(i, value) {
                height += parseInt($(this).height());
            });
        
            $(".messages").animate({ scrollTop: height });
        </script>
    ';

?>