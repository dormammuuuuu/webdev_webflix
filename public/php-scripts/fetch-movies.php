<?php
    include('initialize-db.php');

    @session_start();
    $uid = $_SESSION['id'];
    $sql = "SELECT * FROM `movies`";
    $movies = $conn->query($sql) or die ($conn->error);
    $row = $movies->fetch_assoc();
    $checked = "checked";
    $type = "movie";

    if (!empty($row)){

        do{ 
            $movieID = $row['movies_id'];
            $fave_query = "SELECT * FROM user_favorites WHERE user_id = $uid AND ms_type = '$type' AND favorite_id = $movieID";
            $fave = $conn->query($fave_query) or die ($conn->error);
            $fave_selected = $fave->fetch_assoc();
            echo'
            <div class="thumbnail-container '.$row['movies_category'].'" data-movie="'.$row['movies_id'].'" data-title="'.$row['movies_title'].'" id="movie'.$row['movies_id'].'">
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
                    <input type="checkbox" data-movie="'.$row['movies_id'].'" data-type="'.$type.'" class="thumbnail-add-watchlist"'; if (!empty($fave_selected)){ echo $checked; } echo'>
                    <label></label>
                </div>
            </div>
            '; 
        } while ($row = $movies->fetch_assoc());

        
        
        echo'
        <script>
            $(".thumbnail-container").click(function (e) { 
                let str = $(this).attr("data-movie");
                $("#displayData").load("../php-scripts/fetch-data.php",{
                    data: str,
                    fetch: "movie"
                });
            });

            $("input[type=checkbox]").click(function(e) {
                e.stopPropagation();
            })

            $("input[type=checkbox]").change(function(e) {
                let type = $(this).attr("data-type");
                let str = $(this).attr("data-movie");
                
                $("#add").load("../php-scripts/favorite.php",{
                    dataID: str,
                    type: type,
                })
            })
            
        </script>
        ';
    } else {
        echo '
        There are currently no movies available in this category '; 
    }

    

    // $temp = ;
    
?>

