<?php
    include('initialize-db.php');
    $data = $_POST['data'];
    $fetch = $_POST['fetch'];
    
    if ($fetch == "series"){
        $query = "SELECT * from series where series_id = $data";
    } else if ($fetch == "movie"){
        $query = "SELECT * from movies where movies_id = $data";
    } else {
        $query = "SELECT * from coming_soon where coming_soon_id  = $data";
    }
    $run_query = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($run_query);
    
    if ($fetch == "series"){
        $title = $row['series_title'];
        $thumbnail = $row['series_thumbnail'];
        $year = $row['series_year'];
        $restriction = $row['series_restriction'];
        $rating = $row['series_rating'];
        $cast = $row['series_cast'];
        $category = $row['series_category'];
        $sypnosis = $row['series_sypnosis'];
        $stream_id = $row['series_id'];
    } else if ($fetch == "movie") {
        $title = $row['movies_title'];
        $thumbnail = $row['movies_thumbnail'];
        $year = $row['movies_year'];
        $restriction = $row['movies_restriction'];
        $rating = $row['movies_rating'];
        $cast = $row['movies_cast'];
        $category = $row['movies_category'];
        $sypnosis = $row['movies_sypnosis'];
        $stream_id = $row['movies_id'];
    } else {
        $title = $row['coming_soon_title'];
        $thumbnail = $row['coming_soon_thumbnail'];
        $year = $row['coming_soon_year'];
        $restriction = $row['coming_soon_restriction'];
        $rating = "";
        $cast = $row['coming_soon_cast'];
        $category = $row['coming_soon_category'];
        $sypnosis = $row['coming_soon_sypnosis'];
        $stream_id = "#";
    }

    $count = mysqli_num_rows($run_query);

    if ($count){
        echo'
        <div class="modal-preview">
            <div class="loading-wrapper">
                <div>
                    <div class="loader one"></div>
                    <div class="loader two"></div>
                    <div class="loader three"></div>
                </div>
            </div>
            <div class="modal-container">
                <div class="modal-thumb-play">
                    <img id="modal-movie-thumbnail" src="'.$thumbnail.'"class="modal-thumbnail" alt="">
                    '; if($fetch == "coming-soon"){ echo '
                        <button id="modal-soon">SOON</button>';
                        } else { 
                        echo'
                        <button id="modal-play">PLAY</button>';
                        } echo'
                </div>
                <div class="modal-description">
                    <div>
                        <h1 id="modal-title">'.$title.'</h1>
                        <div class="modal-line"></div>
                        <div class="modal-extra-description">
                            <p id="modal-year">'.$year.'</p>
                            <p id="modal-restriction">'.$restriction.'</p>
                            <p id="modal-runtime">1h 2m</p>
                            <p><i class="fas fa-star thumbnail-star"></i> <span id="modal-rating">'.$rating.'</span></p>
                        </div>
                        <div class="modal-cast">
                            <p>Cast: <span id="modal-cast" class="modal-cast-inner">'.$cast.'</span></p>
                        </div>
                        <div class="modal-genre">
                            <p>Genre: <span id="modal-genre" class="modal-genre-inner">'.$category.'</span></p>
                        </div>
                        <div class="modal-sypnosis">
                            <p><span id="modal-sypnosis" class="modal-sypnosis-inner">'.$sypnosis.'</span></p>
                        </div>
                    </div>
                    <div id="modal-list-container" class="watchlist-button">
                        <button id="add-to-watchlist">+ My List</button>
                    </div>
                    <span id="modal-close"><i class="bx bx-x"></i></span>
                </div>
            </div>
        </div>
        <script>
            $("#modal-close").on("click", function() {
                let modalPreview = $(".modal-preview");
                modalPreview.fadeOut();
                modalPreview.remove();
            })
            
            $("#modal-play").click(function() {
                window.location.href = "stream.php?watch='.$stream_id.'";
            })

            $("#add-to-watchlist").click(function(){
                $("").load("", )
            })
        </script>
        ';
    } else {
        echo 'PALPAK';
    }
?>