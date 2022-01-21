<?php
    include('initialize-db.php');

    @session_start();
    $uid = $_SESSION['id'];
    $sql = "SELECT * FROM `coming_soon`";
    $coming_soon = $conn->query($sql) or die ($conn->error);
    $row = $coming_soon->fetch_assoc();
    $checked = "checked";
    $type = "coming-soon";

    if (!empty($row)){

        do{ 
            $soonID = $row['coming_soon_id'];
            $fave_query = "SELECT * FROM user_favorites WHERE user_id = $uid AND ms_type = '$type' AND favorite_id = $soonID";
            $fave = $conn->query($fave_query) or die ($conn->error);
            $fave_selected = $fave->fetch_assoc();
            echo'
            <div class="thumbnail-container '.$row['coming_soon_category'].'" data-soon="'.$row['coming_soon_id'].'" data-title="'.$row['coming_soon_title'].'" id="movie'.$row['coming_soon_id'].'">
                <img class="thumbnail" src="'.$row['coming_soon_thumbnail'].'">
                <div class="thumbnail-description">
                    <div>
                        <p class="thumbnail-title">'.$row['coming_soon_title'].'</p>
                        <p class="thumbnail-runtime-year">'.$row['coming_soon_year'].'</p>
                        <div class="thumbnail-rating">
                            <span class="restriction">'.$row['coming_soon_restriction'].'</span>
                            <p></p>
                        </div>
                    </div>
                    <input type="checkbox" data-soon="'.$row['coming_soon_id'].'" data-type="'.$type.'" class="thumbnail-add-watchlist"'; if (!empty($fave_selected)){ echo $checked; } echo'>
                    <label></label>
                </div>
            </div>
            '; 
        } while ($row = $coming_soon->fetch_assoc());

        
        
        echo'
        <script>
            $(".thumbnail-container").click(function (e) { 
                let str = $(this).attr("data-soon");
                $("#displayData").load("../php-scripts/fetch-data.php",{
                    data: str,
                    fetch: "coming-soon"
                });
            });

            $("input[type=checkbox]").click(function(e) {
                e.stopPropagation();
            })

            $("input[type=checkbox]").change(function(e) {
                let type = $(this).attr("data-type");
                let str = $(this).attr("data-soon");
                
                $("#add").load("../php-scripts/favorite.php",{
                    dataID: str,
                    type: type,
                })
            })
            
        </script>
        ';
    } else {
        echo '
        There are currently no coming_soon available in this category '; 
    }

    // $temp = ;
    
?>

