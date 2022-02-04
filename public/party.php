<?php
    include('php-scripts/initialize-db.php');

    session_start();
    if(!ISSET($_SESSION['id'])){
        header("location:index.html");
    }

    $uid = $_SESSION['id'];
    $movieID = $_GET['watch'];
    $type = 'movie';
    $hostUser = false;
    $query = "SELECT * FROM movies where movies_id = $movieID";
    $sql = "SELECT movies_title as title FROM movies where movies_id = $movieID";
    $sqlQuery = mysqli_query($conn,$sql);
    $data = $sqlQuery -> fetch_assoc();
    $title = $data['title'];

    $sql = mysqli_query($conn,$query);
    $details = mysqli_fetch_array($sql);
    $play = $details['movies_file'];

    $partyQuery = mysqli_query($conn,"SELECT * FROM party WHERE party_id = '{$_GET['key']}'");
    $partyQueryResult = mysqli_fetch_assoc($partyQuery);

    $partyHost = $partyQueryResult['host_id'];

    if($uid == $partyHost){
        $hostUser = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/icon.ico">
    <title><?php echo $title . " | StreamHub"; ?></title>
    <link rel="stylesheet" href="styles/party.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>  
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
    <div id="upper-container">
        <div style="display: flex; align-items: center;">
            <span id="back-arrow"><i class='bx bx-left-arrow-alt'></i></span>
            <h1 id="title"><?php echo $title ?></h1>
        </div>
        <div class="right-buttons">
            <div>
                <p id="party-button" title="Watch Together"><i class='bx bx-group'></i></p>
                <div id="start-button">
                    <p>Invite your friends to join your watch party!</p>
                    <div class="key-container">
                        <p id="key"><?php echo $_GET['key'] ?></p>
                        <p id="copy-btn"><i class='bx bx-copy-alt'></i></p>
                    </div>
                    <div class="users">
                        <p>Users</p>
                        <div class="user-count">
                            <i class='bx bxs-group'></i>
                            <p> 2</p>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <div class="user-container"> 
                            <img src="assets/images/user_avatar/virtue.png" class="user-avatar">
                            <p class="user-name">Raymond Mediodia Santos</p>
                        </div>
                        <div class="user-container"> 
                            <img src="assets/images/user_avatar/virtue.png" class="user-avatar">
                            <p class="user-name">Ramino Tampipi Panaligan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div id="movie-player">
        <video id="video" data-id="<?php echo $_GET['key']?>" controls="false" preload="metadata">
                <source src="<?php echo $play?>" type="video/mp4">
                FILE NOT FOUND.
        </video>
    </div>
    <?php
    if ($hostUser){
        echo'
        <div id="playpause">
            <div id="left-previous">
                <i class="bx bxs-chevrons-left"></i> <span class="fp-label">10</span>
            </div>
            <button id="playpause-button"><i id="playpause-icon" class="bx bx-play"></i></button>
            <div id="right-forward">
            <span class="fp-label">10</span> <i class="bx bxs-chevrons-right"></i>
            </div>
        </div>
        ';
    }
    
    ?>
    <div id="lower-container">
        <div class="volume-brightness-container">
            <span id="volume-button"><i id="volume-rocker" class='bx bx-volume-full'></i></span>
            <div class="volume">
                <i id="volume-rocker" class='bx bx-volume-full'></i>
                <div id="volume-slider"></div>
            </div>
            <div class="brightness">
                <i id="brightness-rocker" class='bx bxs-sun'></i>
                <div id="brightness-slider"></div>
            </div>
            <span id="brightness-button"><i id="brightness-rocker" class='bx bxs-sun'></i></span>
        </div>
        <div class="seekbar-time-container">
            <div id="custom-seekbar">
              <span></span>
            </div> 
            <p id="time">00:00</p>
        </div>
         <div>
             <span id="fullscreen-button"><i class='bx bx-fullscreen'></i></span>
         </div>
    </div>
    <div id="side-menu">
        <div class="side-header">
            <h1>Episodes</h1>
            <p id="hide-button"><i class="bx bx-x" ></i></p>
        </div>
    </div>
    
    <?php
        if (!$hostUser){
            echo'
            <div id="modal-container">
                <h2>You have successfully joined the Party!</h2>
                <button id="start-playback">START WATCHING</button>
            </div>';
    }
    ?>
    
    <div class="update"></div>
    <div class="updateplaypause"></div>
    <div class="updateseek"></div>
    
    <script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
    <?php
        if ($hostUser){
            echo '
                <script src="script/party-host.js"></script>
            ';
        } else {
            echo'
                <script src="script/party-global.js"></script>
            ';
        }
        
    ?>
    
</body>
</html>