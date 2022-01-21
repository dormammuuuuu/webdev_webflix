<?php
    include('initialize-db.php');

    @session_start();
    $uid = $_SESSION['id'];
    $sql = "SELECT * FROM `movies`";
    $movies = $conn->query($sql) or die ($conn->error);
    $row = $movies->fetch_assoc();
    $checked = "checked";
    $type = "movie";
    $counter = 0;

    if (!empty($row)){

        do{ 
            $movieID = $row['movies_id'];
            $fave_query = "SELECT * FROM user_favorites WHERE user_id = $uid AND ms_type = '$type' AND favorite_id = $movieID";
            $fave = $conn->query($fave_query) or die ($conn->error);
            $fave_selected = $fave->fetch_assoc();
            if(!empty($fave_selected)){
                $counter++;
                echo'
                <div class="thumbnail-container '.$row['movies_category'].'" data-movie="'.$row['movies_id'].'" data-type="'.$type.'" data-title="'.$row['movies_title'].'">
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
            }
        } while ($row = $movies->fetch_assoc());

        $sql = "SELECT * FROM `series`";
        $series = $conn->query($sql) or die ($conn->error);
        $row = $series->fetch_assoc();
        $type = "series";

        if (!empty($row)){

            do{ 
                $seriesID = $row['series_id'];
                $fave_query = "SELECT * FROM user_favorites WHERE user_id = $uid AND ms_type = '$type' AND favorite_id = $seriesID";
                $fave = $conn->query($fave_query) or die ($conn->error);
                $fave_selected = $fave->fetch_assoc();
                if (!empty($fave_selected)){
                    $counter++;
                    echo'
                    <div class="thumbnail-container '.$row['series_category'].'" data-movie="'.$row['series_id'].'" data-type="'.$type.'" data-title="'.$row['series_title'].'" >
                        <img class="thumbnail" src="'.$row['series_thumbnail'].'">
                        <div class="thumbnail-description">
                            <div>
                                <p class="thumbnail-title">'.$row['series_title'].'</p>
                                <p class="thumbnail-runtime-year">'.$row['series_year'].'</p>
                                <div class="thumbnail-rating">
                                    <span class="restriction">'.$row['series_restriction'].'</span><i class="fas fa-star thumbnail-star"></i>
                                    <p>'.$row['series_rating'].'</p>
                                </div>
                            </div>
                            <input type="checkbox" data-movie="'.$row['series_id'].'" data-type="'.$type.'"  class="thumbnail-add-watchlist" '; if (!empty($fave_selected)){ echo $checked; } echo'>
                            <label></label>
                        </div>
                    </div>
                    '; 
                }
            } while ($row = $series->fetch_assoc());
        }

        $sql = "SELECT * FROM `coming_soon`";
        $comingSoon = $conn->query($sql) or die ($conn->error);
        $row = $comingSoon->fetch_assoc();
        $type = "coming-soon";

        if (!empty($row)){

            do{ 
                $comingSoonID = $row['coming_soon_id'];
                $fave_query = "SELECT * FROM user_favorites WHERE user_id = $uid AND ms_type = '$type' AND favorite_id = $comingSoonID";
                $fave = $conn->query($fave_query) or die ($conn->error);
                $fave_selected = $fave->fetch_assoc();
                if (!empty($fave_selected)){
                    $counter++;
                    echo'
                    <div class="thumbnail-container '.$row['coming_soon_category'].'" data-movie="'.$row['coming_soon_id'].'" data-type="'.$type.'" data-title="'.$row['coming_soon_title'].'" >
                        <img class="thumbnail" src="'.$row['coming_soon_thumbnail'].'">
                        <div class="thumbnail-description">
                            <div>
                                <p class="thumbnail-title">'.$row['coming_soon_title'].'</p>
                                <p class="thumbnail-runtime-year">'.$row['coming_soon_year'].'</p>
                                <div class="thumbnail-rating">
                                    <span class="restriction">'.$row['coming_soon_restriction'].'
                                    <p></p>
                                </div>
                            </div>
                            <input type="checkbox" data-movie="'.$row['coming_soon_id'].'" data-type="'.$type.'"  class="thumbnail-add-watchlist" '; if (!empty($fave_selected)){ echo $checked; } echo'>
                            <label></label>
                        </div>
                    </div>
                    '; 
                }
            } while ($row = $comingSoon->fetch_assoc());
        }

        if(!$counter){
            echo '<p style="position:absolute; margin: auto; transform: translate(-50%, -50%);">There are no saved movies or series on your list.</p>';
        }

        echo'
        <script>
            $(".thumbnail-container").click(function (e) { 
                let str = $(this).attr("data-movie");
                let type = $(this).attr("data-type");
                $("#displayData").load("../php-scripts/fetch-data.php",{
                    data: str,
                    fetch: type
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

