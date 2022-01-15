<?php
    include('php-scripts/initialize-db.php');
    $movieID = $_GET['watch'];

    $query = "SELECT * FROM movies where movies_id = $movieID";
    $sql = mysqli_query($conn,$query);
    $details = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $details['movies_title']." | StreamHub"; ?></title>
    <link rel="stylesheet" href="styles/stream.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>  
</head>
<body>
    <div id="upper-container">
        <span id="back-arrow"><i class='bx bx-left-arrow-alt'></i></span>
        <h1><?php echo $details['movies_title'] ?></h1>
    </div>
    <div id="movie-player">
        <video id="video" controls="false" preload="metadata" poster="img/poster.jpg">
                <source src="<?php echo $details['movies_file']?>" type="video/mp4">
                FILE NOT FOUND.
        </video>
    </div>
    <div id="playpause">
        <button id="playpause-button"><i id="playpause-icon" class='bx bx-play'></i></button>
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