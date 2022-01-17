<?php
    include('initialize-db.php');

    $sql = "SELECT * FROM `series`";
    $series = $conn->query($sql) or die ($conn->error);
    $row = $series->fetch_assoc();

    if (!empty($row)){

        do{ 
            echo'
            <div class="thumbnail-container '.$row['series_category'].'" data-movie="'.$row['series_id'].'" data-title="'.$row['series_title'].'" id="movie'.$row['series_id'].'">
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
                    <input type="checkbox" class="thumbnail-add-watchlist"><i class="bx bxs-heart"></i></input>
                </div>
            </div>
            '; 
        } while ($row = $series->fetch_assoc());
        echo'
        <script>
            $(".thumbnail-container").click(function (e) { 
                let str = $(this).attr("data-movie");
                $("#displayData").load("../php-scripts/fetch-data.php",{
                    data: str,
                    fetch: "series"
                });
            });

            $("input[type=checkbox]").click(function(e) {
                e.cancelBubble = true;
                e.stopPropagation();
            })
        </script>
        ';
    } else {
        echo '
        There are currently no series available in this category '; 
    }

    // $temp = ;
    
?>

