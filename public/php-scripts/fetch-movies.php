<?php
    include('initialize-db.php');

    $sql = "SELECT * FROM `movies`";
    $movies = $conn->query($sql) or die ($conn->error);
    $row = $movies->fetch_assoc();

    if (!empty($row)){

        do{ 
            echo'
            <div class="thumbnail-container '.$row['movies_category'].'" data-movie="'.$row['movies_id'].'" onclick="selectedMovie(this)">
                <img class="thumbnail" src="'.$row['movies_thumbnail'].'">
                <div class="thumbnail-description">
                    <div>
                        <p class="thumbnail-title">'.$row['movies_title'].'</p>
                        <p class="thumbnail-runtime-year">'.$row['movies_year'].'</p>
                        <div class="thumbnail-rating">
                            <span class="restriction">'.$row['movies_restriction'].'</span><i class="fas fa-star thumbnail-star"></i>
                            <p>'.$row['movies_rating'].'</p>
                        </div>
                    </div>
                    <div class="thumbnail-add-watchlist"><i class="bx bxs-heart"></i></div>
                </div>
            </div>
            '; 
        } while ($row = $movies->fetch_assoc());
    } else {
        echo '
        There are currently no artwork available in this category '; 
    }

    // $temp = ;
    
?>