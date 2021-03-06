<!DOCTYPE HTML>
<meta charset="UTF-8" name="viewport" content="width=device-width,
  initial-scale=1.0">
<html>

<head>
    <title>StreamHub</title>
    <link rel="icon" href="assets/images/icon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/fonts.css">
    <link rel="stylesheet" href="styles/index.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat&amp;display=swap"
      rel="stylesheet'>
    <link rel="stylesheet" href="styles/slider.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>

    <nav class="navbar navbar-dark">
        <p style="margin: 0; margin-top: 30px; font-size: 3em;"><i style="color:
          #F86B86;" class="fas fa-play-circle"></i>
        </p>
        <li class="nav-item">
            <a class="nav-link nav-link-index" href="login.php">Sign In</a>
        </li>
    </nav>

    <div class="video-home">
        <video src="assets/video/trailer.mp4" autoplay loop muted></video>
    </div>

    <section id="land-page">
        <h1 data-aos="zoom-out-down" data-aos-delay="1000">StreamHub</h1>
        <div class="phrase-container">
            <p class="c-phrase" data-aos="zoom-in-left" data-aos-delay="1500">Watch. Enjoy. Binge.</p>
        </div>
        <form class="needs-validation" id="get-started" novalidate data-aos="flip-down" data-aos-delay="2500">
            <p>Ready to watch? Enter your email to start your membership.</p>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email-input" placeholder="name@example.com" required>
                <label for="floatingInput">Email address</label>

                <div id="input-feedback" class="invalid-feedback">
                    Email is required!
                </div>
            </div>
            <div class="col-12">
                <button class="" id="submit-button" type="submit">Get Started <svg
              id="angle-right" viewBox="0 0 6 12"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M.61 1.312l.78-.624L5.64 6l-4.25 5.312-.78-.624L4.36 6z"
                fill="white" fill-rule="evenodd"></path>
            </svg></button>
            </div>
        </form>
    </section>

    <section id="featured" data-aos="fade-up">
        <div class="app">
            <h1 class="featured-text">Trending Movies</h1>
            <div class="cardList">
                <button class="cardList__btn btn btn--left">
            <i style="color: #fff; font-size: 2.5em;" class="fas fa-angle-left"></i>
          </button>
                <div class="cards__wrapper">
                    <div class="card current--card">
                        <div class="card__image">
                            <img src="assets/images/1.jpeg" alt="" />
                        </div>
                    </div>
                    <div class="card next--card">
                        <div class="card__image">
                            <img src="assets/images/2.jpg" alt="" />
                        </div>
                    </div>
                    <div class="card next--next--card">
                        <div class="card__image">
                            <img src="assets/images/3.jpeg" alt="" />
                        </div>
                    </div>
                    <div class="card previous--card">
                        <div class="card__image">
                            <img src="assets/images/4.jpeg" alt="" />
                        </div>
                    </div>
                    <div class="card previous--previous--card">
                        <div class="card__image">
                            <img src="assets/images/5.jpg" alt="" />
                        </div>
                    </div>
                </div>
                <button class="cardList__btn btn btn--right">
            <i style="color: #fff; font-size: 2.5em;" class="fas
              fa-angle-right"></i>
          </button>
            </div>

            <div class="infoList">
                <div class="info__wrapper">
                    <div class="info current--info">
                        <h1 class="text name">Blackpink: The Movie</h1>
                        <h4 class="text location">Oh Yoon-dong</h4>
                        <p class="text description">August 4, 2021</p>
                    </div>

                    <div class="info next--info">
                        <h1 class="text name">Shang-Chi</h1>
                        <h4 class="text location">Marvel Studios</h4>
                        <p class="text description">September 3, 2021</p>
                    </div>

                    <div class="info next--next--info">
                        <h1 class="text name">Army of the Dead</h1>
                        <h4 class="text location">Zack Snyder</h4>
                        <p class="text description">May 21, 2021</p>
                    </div>

                    <div class="info previous--info">
                        <h1 class="text name">Black Widow</h1>
                        <h4 class="text location">Marvel Studios</h4>
                        <p class="text description">July 9, 2021</p>
                    </div>

                    <div class="info previous--previous--info">
                        <h1 class="text name">Free Guy</h1>
                        <h4 class="text location">Shawn Levy</h4>
                        <p class="text description">August 10, 2021</p>
                    </div>
                </div>
            </div>

            <div class="app__bg">
                <div class="app__bg__image current--image">
                    <img src="assets/images/1.jpeg" alt="" />
                </div>
                <div class="app__bg__image next--image">
                    <img src="assets/images/2.jpg" alt="" />
                </div>
                <div class="app__bg__image next--next--image">
                    <img class="img-feat" src="images/3.jpeg" alt="" />
                </div>
                <div class="app__bg__image previous--image">
                    <img src="assets/images/4.jpeg" alt="" />
                </div>
                <div class="app__bg__image previous--previous--image">
                    <img class="img-feat" src="assets/images/5.jpg" alt="" />
                </div>
            </div>
    </section>


    <div class="loading__wrapper">
        <div class="loader--text">Loading...</div>
        <div class="loader">
            <span></span>
        </div>
    </div>

    <section id="about" data-aos="fade-up" data-aos-offset="100">
        <p>StreamHub is the best streaming online website, where you can watch movies, documentary, drama, and series from different parts of the world online and completely free. The StreamHub offers the latest movies, drama, and series with the best quality
            for you. </br>Watch. Enjoy. Binge. with StreamHub.</p>
    </section>

    <section id="description">
        <h1 data-aos="zoom-in">A better viewing experience just for you</h1>
        <div class="card-container">
            <div class="card-1" data-aos="zoom-out-up" data-aos-delay="300">
                <div class="fab-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <p class="card-info">Create an account</p>
            </div>
            <div class="card-2" data-aos="zoom-out-up" data-aos-delay="500">
                <div class="fab-icon">
                    <i class="fas fa-user-friends"></i>
                </div>
                <p class="card-info">Watch together with your friends</p>
            </div>
            <div class="card-3" data-aos="zoom-out-up" data-aos-delay="700">
                <div class="fab-icon">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <p class="card-info">Ad-free uninterrupted experience</p>

            </div>
            <div class="card-4" data-aos="zoom-out-up" data-aos-delay="900">
                <div class="fab-icon">
                    <i class="fas fa-laptop"></i>
                </div>
                <p class="card-info">Watch anytime, everywhere</p>
            </div>
        </div>
    </section>

    <section class="accordion-container">
        <h1 data-aos="zoom-in">Frequently Asked Questions</h1>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item" data-aos="flip-down" data-aos-delay="200" data-aos-duration="1500">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
              What is StreamHub?
            </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        StreamHub is a streaming service that offers a wide variety of award-winning TV shows, movies, anime, documentaries, and more on thousands of videos to watch.
                    </div>
                </div>
            </div>
            <div class="accordion-item" data-aos="flip-down" data-aos-delay="400" data-aos-duration="1500">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              How can we access StreamHub?
            </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        You can access StreamHub by creating an account. Sign in to your StreamHub account and watch instantly on the web. Enjoy thousands of videos. StreamHub will surely make you Watch. Enjoy. Binge.
                    </div>
                </div>
            </div>
            <div class="accordion-item" data-aos="flip-down" data-aos-delay="600" data-aos-duration="1500">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              What videos does StreamHub has to offer?
            </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        StreamHub has an extensive library of feature films, documentaries, TV shows, anime, and more. Watch as much as you want, anytime you want.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <p id="footer"> ?? 2021 - 2022 StreamHub.com. All rights reserved. </p>
    </footer>
    <div class="update"></div>
    <script src="script/index.js"></script>
    <script>
        AOS.init();
    </script>
    <script src='https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.3/gsap.min.js'></script>
    <script src="script/slider-script.js"></script>
</body>

</html>