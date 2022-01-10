<!DOCTYPE html>
<html>
    <head>
        <title> StreamHub | USER SETTING </title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/CSS" href="styles/loader.css">
        <link rel="stylesheet" type="text/CSS" href="styles/sidebar.css">
        <link rel="stylesheet" type="text/CSS" href="styles/navbar.css">
        <link rel="stylesheet" type="text/CSS" href="styles/tabs.css">
        <link rel="stylesheet" type="text/CSS" href="styles/toast.css">
        <link rel="stylesheet" type="text/CSS" href="styles/USERSETTING.css">

        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="styles/sidebar.css">
        <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-database.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-storage.js"></script>
    </head>
    <body>
        <?php
            include('php-scripts/initialize-db.php');
            
            session_start();
            if(!ISSET($_SESSION['id'])){
               header("location:index.html");
            } else{
                $id = (int) $_SESSION['id'];
  
                $query = mysqli_query ($conn, "SELECT * FROM user WHERE id = '$id' ") or die (mysqli_error($conn));
                $account = mysqli_fetch_array ($query);
            }
        ?>
        <div id="body_container">
        <div class="sidebar">
            <div class="logo-details">
                <i class="icon fas fa-play-circle"></i>
                <div class="logo_name">StreamHub</div>
                <i class='bx bx-menu' id="btn" ></i>
            </div>
            <ul class="nav-list">
                <li>
                    <a href="home.php">
                    <i class='bx bx-movie'></i>
                    <span class="links_name">Movies</span>
                    </a>
                    <span class="tooltip">Movies</span>
                </li>
                <li>
                    <a href="#">
                    <i class='bx bx-tv' ></i>
                    <span class="links_name">TV/Shows</span>
                    </a>
                    <span class="tooltip">TV/Shows</span>
                </li>
                <li>
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
                    <a href="#">
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
        <!-- <p style="margin:0px 0px 0px 50px; font-size: 3em; position: absolute;">
            <i style="color: #F86B86;" class="fas fa-play-circle"></i></p>
            
            <div class="navbar">
            <a href="home.html"> Home </a>
            <a href="#news"> Movies </a>
            <a href="#news"> Series </a>
            
             <div class="dropdown">
                <button class="dropbtn"> Genre 
                 </button>
            
                    <div class="dropdown-content">
                         <div class="row">
                                <div class="column">
                                    <a href="#">Action</a>
                                    <a href="#">Thriller</a>
                                    <a href="#">Horror</a>
                                </div>
                                <div class="column">
                                    <a href="#">Romance</a>
                                    <a href="#">Comedy</a>
                                    <a href="#">Science Fiction</a>
                                </div>
                                <div class="column">
                                    <a href="#">Fiction</a>
                                    <a href="#">Crime</a>
                                    <a href="#">Adventure</a>
                                </div>
                        </div>
                    </div>
            </div> 
            </div> -->
        <section class="home-section">
            <div class="tabs">
                <input type="radio" id="tab1" name="tab-control" checked>
                <input type="radio" id="tab2" name="tab-control">
                <input type="radio" id="tab3" name="tab-control">  
                <input type="radio" id="tab4" name="tab-control">
                <ul>
                    <li title="Account Details">
                        <label for="tab1" role="button">
                        <i class='bx bxs-user'></i>
                        <br><span>Account Details</span>
                        </label>
                    </li>
                    <li title="Security">
                        <label for="tab2" role="button">
                        <i class='bx bxs-lock' ></i>
                        <br><span>Security</span>
                        </label>
                    </li>
                    <li title="Coming soon...">
                        <label for="tab3" role="button">
                            <svg viewBox="0 0 24 24">
                                <path d="M3,4A2,2 0 0,0 1,6V17H3A3,3 0 0,0 6,20A3,3 0 0,0 9,17H15A3,3 0 0,0 18,20A3,3 0 0,0 21,17H23V12L20,8H17V4M10,6L14,10L10,14V11H4V9H10M17,9.5H19.5L21.47,12H17M6,15.5A1.5,1.5 0 0,1 7.5,17A1.5,1.5 0 0,1 6,18.5A1.5,1.5 0 0,1 4.5,17A1.5,1.5 0 0,1 6,15.5M18,15.5A1.5,1.5 0 0,1 19.5,17A1.5,1.5 0 0,1 18,18.5A1.5,1.5 0 0,1 16.5,17A1.5,1.5 0 0,1 18,15.5Z" />
                            </svg>
                            <br><span>Coming soon...</span>
                        </label>
                    </li>
                    <li title="Coming soon...">
                        <label for="tab4" role="button">
                            <svg viewBox="0 0 24 24">
                                <path d="M3,4A2,2 0 0,0 1,6V17H3A3,3 0 0,0 6,20A3,3 0 0,0 9,17H15A3,3 0 0,0 18,20A3,3 0 0,0 21,17H23V12L20,8H17V4M10,6L14,10L10,14V11H4V9H10M17,9.5H19.5L21.47,12H17M6,15.5A1.5,1.5 0 0,1 7.5,17A1.5,1.5 0 0,1 6,18.5A1.5,1.5 0 0,1 4.5,17A1.5,1.5 0 0,1 6,15.5M18,15.5A1.5,1.5 0 0,1 19.5,17A1.5,1.5 0 0,1 18,18.5A1.5,1.5 0 0,1 16.5,17A1.5,1.5 0 0,1 18,15.5Z" />
                            </svg>
                            <br><span>Coming soon...</span>
                        </label>
                    </li>
                </ul>
                <div class="slider">
                    <div class="indicator"></div>
                </div>
                <div class="content">
                    <section>
                        <div class="account-details">
                            <div class="account-avatar">
                                <img id="avatar" src="<?php echo $account['avatar'] ?>" alt="Avatar">
                                <input type="file" accept="image/*" id="upload" hidden/>
                                <label for="upload" id="changeAvatarBtn"> CHANGE AVATAR </label>
                            </div>
                            <div>
                                <span class="input-labels"> First Name </span> 
                                <input type="text" id="first-name" class="input-boxes" name="firstname" value="<?php echo $account['firstName']?>" disabled> 
                                <span class="input-labels"> Last Name </span> 
                                <input type="text" id="last-name" class="input-boxes" name="lastname" value="<?php echo $account['lastName']?>" disabled> 
                                <span class="input-labels"> Username </span> 
                                <input type="text" id="user-name" class="input-boxes" name="username" value="<?php echo $account['userName']?>"  disabled> 
                                <span class="input-labels"> Current Password </span> 
                                <input type="password" class="input-boxes" name="currentpassword" disabled> 
                                <div id="errorMsgDiv">
                                    <p id="errorMsg"></p>
                                </div>
                                <button id="save-account-details" disabled> <strong> SAVE CHANGES </strong> </button>
                                <button type="button" id="editBtn">EDIT   ✏️ </button>
                            </div>
                        </div>
                    </section>
                    <section>
                        <span class="input-labels"> Current Password </span> 
                        <input type="password" class="input-boxes" name="currentpassword" disabled> 
                        <span class="input-labels"> New Password </span> 
                        <input type="password" class="input-boxes" name="newpassword" disabled> 
                        <span class="input-labels"> Confirm Password </span> 
                        <input type="password" class="input-boxes" name="confirmpassword" disabled> 
                        <div id="errorMsgDiv">
                            <p id="errorMsg2"></p>
                        </div>
                        <button id="save2" disabled> <strong> SAVE CHANGES </strong> </button>
                        <button type="button" id="editBtn2">EDIT ✏️ </button>
                    </section>
                    <section>
                        <h2>Shipping</h2>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam nemo ducimus eius, magnam error quisquam sunt voluptate labore, excepturi numquam! Alias libero optio sed harum debitis! Veniam, quia in eum.
                    </section>
                    <section>
                        <h2>Returns</h2>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa dicta vero rerum? Eaque repudiandae architecto libero reprehenderit aliquam magnam ratione quidem? Nobis doloribus molestiae enim deserunt necessitatibus eaque quidem incidunt.
                    </section>
                </div>
            </div>
            
        </section>
        <div id="update-notif"></div>

        <script src="script/firebase.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="script/sidebar.js"></script>
        <script src="script/usersetting.js"></script>
    </body>
</html>