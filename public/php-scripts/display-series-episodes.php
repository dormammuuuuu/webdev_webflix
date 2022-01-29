<?php
    include('initialize-db.php');

    $seriesID = @$_POST['seriesID'] ?: $stream_id;
    $season = @$_POST['season'] ?: 1;
    $sql = "SELECT * FROM series_files WHERE series_id = $seriesID AND season = $season";
    $series = $conn->query($sql) or die ($conn->error);
    $result = $series->fetch_assoc();

    if (!empty($result)){
        do{ 
            echo'
                <div data-value="'.$result['episode'].'" class="episode-list">
                    <p>Episode '.$result['episode'].'</p>
                    <p><i class="bx bx-play" style="font-size: 2em;"></i></p>
                </div>
            '; 
        } while ($result = $series->fetch_assoc());
    }
    
    echo'
    <script>
        $(".episode-list").click(function(){
            let play = $(this).attr("data-value");
            window.location.href = "stream.php?watch=" + play + "&id='. $seriesID .'&season='.$season.'";
        })
    </script>    
    ';
    

?>