<!DOCTYPE html>
<html>
    <head>
        <title> StreamHub | HOME </title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.3.1/swiper-bundle.min.css'>
        <link rel="stylesheet" type="text/CSS" href="styles/loader.css">
        <link rel="stylesheet" type="text/CSS" href="styles/sidebar.css">
        <link rel="stylesheet" type="text/CSS" href="styles/navbar.css">
        <link rel="stylesheet" type="text/CSS" href="styles/home_carousel.css">
        <link rel="stylesheet" type="text/CSS" href="styles/home.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>
        <?php
            include('php-scripts/initialize-db.php');
            
            session_start();
            if(!ISSET($_SESSION['id'])){
               header("location:index.html");
            }
            ?>
        <div class="sidebar">
            <div class="logo-details">
                <i class="icon fas fa-play-circle"></i>
                <div class="logo_name">StreamHub</div>
                <i class='bx bx-menu' id="btn" ></i>
            </div>
            <ul class="nav-list">
                <li id="movies-button">
                    <a href="#">
                    <i class='bx bx-movie'></i>
                    <span class="links_name">Movies</span>
                    </a>
                    <span class="tooltip">Movies</span>
                </li>
                <li id="series-button">
                    <a href="#">
                    <i class='bx bx-tv' ></i>
                    <span class="links_name">TV/Shows</span>
                    </a>
                    <span class="tooltip">TV/Shows</span>
                </li>
                <li id="list-button">
                    <a href="#">
                    <i class='bx bx-heart' ></i>
                    <span class="links_name">My List</span>
                    </a>
                    <span class="tooltip">My List</span>
                </li>
                <li>
                    <a href="#">
                    <i class='bx bxs-calendar-event'></i>
                    <span class="links_name">Coming Soon</span>
                    </a>
                    <span class="tooltip">Coming Soon</span>
                </li>
                <li>
                    <a href="account.php">
                    <i class='bx bx-cog' ></i>
                    <span class="links_name">Account Settings</span>
                    </a>
                    <span class="tooltip">Account Settings</span>
                </li>
                <li class="profile" id="logoutBtn">
                    <a href="php-scripts/logout.php">
                        <div class="profile-details">
                            <!--<img src="profile.jpg" alt="profileImg">-->
                            <div class="name_job">
                                <div class="name">Log out</div>
                            </div>
                        </div>
                        <i class='bx bx-log-out log_out'></i>
                    </a>
                </li>
            </ul>
        </div>
        <nav>
            <div>
                <p><i class="brand fas fa-play-circle"></i></p>
            </div>
            <ul class="nav-menu">
                <li><a class="nav-link" href="#">Movies</a></li>
                <li><a class="nav-link" href="#">TV/Shows</a></li>
                <li><a class="nav-link" href="#">My List</a></li>
                <li><a class="nav-link" href="#">Coming Soon</a></li>
                <li><a class="nav-link" href="account.php">Account Settings</a></li>
                <li><span class="nav-link log_out" >Logout</span></li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
        <section class="home-section">
            <!-- <div id="loader"></div> -->
            <div id="body_container">
            <div class="maincontainer">
                <div id="mainFlexBox">
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="swiper-image" style="background: url('./assets/images/banner1.jpg') no-repeat center top; background-size:cover;"></div>
                                <div class="overlay"></div>
                                <div class="content-wrapper">
                                    <div class="content">
                                        <h1>Blackpink: The Movie</h1>
                                        <p>Exclusive interviews and concert footage highlihgting the career of Korean pop group Blackpink, as the quartet celebrate five years in the business.</p>
                                        <a href="stream.php?watch=1" class="button">Watch now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="swiper-image" style="background: url('./assets/images/banner2.jpg') no-repeat right top; background-size:cover;"></div>
                                <div class="overlay"></div>
                                <div class="content-wrapper content-right">
                                    <div class="content">
                                        <h1>Shang-Chi</h1>
                                        <p>Martial-arts master Shang-Chi confronts the past he thought he left behind when he's drawn into the web of the mysterious Ten Rings organization.</p>
                                        <a href="stream.php?watch=2" class="button">Watch now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="swiper-image" style="background: url('./assets/images/banner4.jpg') no-repeat center top; background-size:cover;"></div>
                                <div class="overlay"></div>
                                <div class="content-wrapper">
                                    <div class="content">
                                        <h1>Free Guy</h1>
                                        <p>When a bank teller discovers he's actually a background player in an open-world video game, he decides to become the hero of his own story -- one that he can rewrite himself. In a world where there's no limits, he's determined to save the day his way before it's too late, and maybe find a little romance with the coder who conceived him.</p>
                                        <a href="stream.php?watch=3" class="button">Watch now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="swiper-image" style="background: url('	./assets/images/banner3.jpg') no-repeat right center; background-size:cover;"></div>
                                <div class="overlay"></div>
                                <div class="content-wrapper content-right">
                                    <div class="content">
                                        <h1>Army of  the Dead</h1>
                                        <p>After a zombie outbreak in Las Vegas, a group of mercenaries take the ultimate gamble and venture into the quarantine zone in hopes of pulling off an impossible heist.</p>
                                        <a href="stream.php?watch=4" class="button">Watch now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="swiper-image" style="background: url('	./assets/images/banner5.jpg') no-repeat right center; background-size:cover;"></div>
                                <div class="overlay"></div>
                                <div class="content-wrapper">
                                    <div class="content">
                                        <h1>Black Widow</h1>
                                        <p>Natasha Romanoff, aka Black Widow, confronts the darker parts of her ledger when a dangerous conspiracy with ties to her past arises. Pursued by a force that will stop at nothing to bring her down, Natasha must deal with her history as a spy, and the broken relationships left in her wake long before she became an Avenger.</p>
                                        <a href="stream.php?watch=5" class="button">Watch now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-nav-wrapper">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        <!-- If we need scrollbar -->
                        <div class="swiper-scrollbar"></div>
                    </div>
                    <div class="container">
                        <div class="search-label">
                            <div class="dropdown-container">
                                <h1>Movie List</h1>
                                <div class="select" tabindex="1">
                                    <input class="selectopt" name="categ_select" type="radio" value="All" id="genre0" checked>
                                    <label for="genre0" class="option">All</label>
                                    <input class="selectopt" name="categ_select" type="radio" value="Action" id="genre1" >
                                    <label for="genre1" class="option">Action</label>
                                    <input class="selectopt" name="categ_select" type="radio" value="Thriller" id="genre2">
                                    <label for="genre2" class="option">Thriller</label>
                                    <input class="selectopt" name="categ_select" type="radio" value="Horror" id="genre3">
                                    <label for="genre3" class="option">Horror</label>
                                    <input class="selectopt" name="categ_select" type="radio" value="Romance" id="genre4">
                                    <label for="genre4" class="option">Romance</label>
                                    <input class="selectopt" name="categ_select" type="radio" value="Comedy" id="genre5">
                                    <label for="genre5" class="option">Comedy</label>
                                    <input class="selectopt" name="categ_select" type="radio" value="Science-Fiction" id="genre6">
                                    <label for="genre6" class="option">Science Fiction</label>
                                    <input class="selectopt" name="categ_select" type="radio" value="Fiction" id="genre7">
                                    <label for="genre7" class="option">Fiction</label>
                                    <input class="selectopt" name="categ_select" type="radio" value="Crime" id="genre8">
                                    <label for="genre8" class="option">Crime</label>
                                    <input class="selectopt" name="categ_select" type="radio" value="Adventure" id="genre9">
                                    <label for="genre9" class="option">Adventure</label>
                                </div>
                            </div>
                            <div class="search">
                                <div id="search-container">
                                    <div>
                                        <i class="fa fa-search search-icon" ></i>
                                        <input type="text" placeholder="Search" name="search" id="searchBox" autocomplete="off">
                                        <i class="fas fa-times search-clear"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-list">
                            <div class="list" id="list-movies">
                                <?php 
                                    $load = @$_GET['load'] ?: "";
                                    if ($load == "series"){
                                        include('php-scripts/fetch-series.php');
                                        echo '<script> $(".dropdown-container h1").text("Series List") </script>';
                                    } else if ($load == "favorite"){
                                        include('php-scripts/fetch-favorites.php');
                                        echo '<script> $(".dropdown-container h1").text("Favorites") </script>';
                                    } else {
                                        include('php-scripts/fetch-movies.php');
                                        echo '<script> $(".dropdown-container h1").text("Movie List") </script>';
                                    }

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        
        <div id="add">
        </div>
        <div id="displayData">
        </div>
        
        <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.3.1/swiper-bundle.min.js'></script>
        <script src="script/sidebar.js"></script>
        <script src="script/homepage.js"></script>
        <script src="script/navbar.js"></script>
    </body>
</html>