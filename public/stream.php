<?php
    include('php-scripts/initialize-db.php');

    session_start();
    if(!ISSET($_SESSION['id'])){
        header("location:index.html");
    }
    $movieID = $_GET['watch'];
    $episode = @$_GET['id'] ?: "";
    $season = @$_GET['season'] ?: 1;

    if ($episode){
        $query = "SELECT * FROM series_files where series_id = $episode and episode = $movieID and season = $season";
        $sql = "SELECT series_title as title FROM series where series_id = $episode";
        $sqlQuery = mysqli_query($conn,$sql);
        $data = $sqlQuery -> fetch_assoc();
        $title = $data['title'] . " : E" . $movieID;
    } else {
        $query = "SELECT * FROM movies where movies_id = $movieID";
        $sql = "SELECT movies_title as title FROM movies where movies_id = $movieID";
        $sqlQuery = mysqli_query($conn,$sql);
        $data = $sqlQuery -> fetch_assoc();
        $title = $data['title'];
    }
    $sql = mysqli_query($conn,$query);
    $details = mysqli_fetch_array($sql);
    if ($episode){
        $play = $details['episode_file'];
    } else {
        $play = $details['movies_file'];
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
    <link rel="stylesheet" href="styles/stream.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>  
</head>
<body>
    <div id="upper-container">
        <span id="back-arrow"><i class='bx bx-left-arrow-alt'></i></span>
        <h1><?php echo $title ?></h1>
    </div>
    <div id="movie-player">
        <video id="video" controls="false" preload="metadata" poster="img/poster.jpg">
                <source src="<?php echo $play?>" type="video/mp4">
                FILE NOT FOUND.
        </video>
    </div>
    <div id="playpause">
        <div id="left-previous">
            <i class='bx bxs-chevrons-left'></i> <span class="fp-label">10</span>
        </div>
        <button id="playpause-button"><i id="playpause-icon" class='bx bx-play'></i></button>
        <div id="right-forward">
           <span class="fp-label">10</span> <i class='bx bxs-chevrons-right'></i>
        </div>
    </div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
    <script src="script/stream.js"></script>
</body>
</html>