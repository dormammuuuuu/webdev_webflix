<?php
    include('initialize-db.php');

    $season = $_POST['seasonID'];
    $seriesID = $_POST['id'];
    $sql = "SELECT * FROM series_files WHERE series_id = $seriesID AND season = $season";
    $series = $conn->query($sql) or die ($conn->error);
    $result = $series->fetch_assoc();

    if (!empty($result)){
        do{ 
            echo'
                <div data-value="'.$result['episode'].'" data-season="'.$season.'" class="episode-list">
                    <p>Episode '.$result['episode'].'</p>
                    <p><i class="bx bx-play" style="font-size: 1.5em;"></i></p>
                </div>
            '; 
        } while ($result = $series->fetch_assoc());
    }
    
    echo'
    <script>
        $(".episode-list").click(function(){
            let play = $(this).attr("data-value");
            let season = $(this).attr("data-season");
            window.location.href = "stream.php?watch=" + play + "&id='. $seriesID .'&season=" + season;
        })
    </script>    
    ';

?>