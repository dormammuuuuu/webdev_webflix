<?php
    include('initialize-db.php');
    $data = $_POST['data'];
    $query = "SELECT * from movies where movies_id = $data";
    $run_query = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($run_query);
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
                    <img id="modal-movie-thumbnail" src="'.$row['movies_thumbnail'].'"class="modal-thumbnail" alt="">
                    <button id="modal-play">PLAY</button>
                </div>
                <div class="modal-description">
                    <div>
                        <h1 id="modal-title">'.$row['movies_title'].'</h1>
                        <div class="modal-line"></div>
                        <div class="modal-extra-description">
                            <p id="modal-year">'.$row['movies_year'].'</p>
                            <p id="modal-restriction">'.$row['movies_restriction'].'</p>
                            <p id="modal-runtime">1h 2m</p>
                            <p><i class="fas fa-star thumbnail-star"></i> <span id="modal-rating">'.$row['movies_rating'].'</span></p>
                        </div>
                        <div class="modal-cast">
                            <p>Cast: <span id="modal-cast" class="modal-cast-inner">'.$row['movies_cast'].'</span></p>
                        </div>
                        <div class="modal-genre">
                            <p>Genre: <span id="modal-genre" class="modal-genre-inner">'.$row['movies_category'].'</span></p>
                        </div>
                        <div class="modal-sypnosis">
                            <p><span id="modal-sypnosis" class="modal-sypnosis-inner">'.$row['movies_sypnosis'].'</span></p>
                        </div>
                    </div>
                    <div class="watchlist-button">
                        <button>+ My List</button>
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

        </script>
        ';
    } else {
        echo 'PALPAK';
    }
?>