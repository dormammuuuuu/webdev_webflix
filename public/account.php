<!DOCTYPE html>
<html>

<head>
    <title> StreamHub | Account </title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/icon.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/CSS" href="styles/loader.css">
    <link rel="stylesheet" type="text/CSS" href="styles/sidebar.css">
    <link rel="stylesheet" type="text/CSS" href="styles/navbar.css">
    <link rel="stylesheet" type="text/CSS" href="styles/tabs.css">
    <link rel="stylesheet" type="text/CSS" href="styles/toast.css">
    <link rel="stylesheet" type="text/CSS" href="styles/account.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="styles/sidebar.css">
</head>

<body>
    <?php
    include('php-scripts/initialize-db.php');

    session_start();
    if (!isset($_SESSION['id'])) {
        header("location:index.html");
    } else {
        $id = (int) $_SESSION['id'];

        $query = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id' ") or die(mysqli_error($conn));
        $account = mysqli_fetch_array($query);
    }
    ?>
    <div id="body_container">
        <div class="sidebar">
            <div class="logo-details">
                <i class="icon fas fa-play-circle"></i>
                <div class="logo_name">StreamHub</div>
                <i class='bx bx-menu' id="btn"></i>
            </div>
            <ul class="nav-list">
                <li>
                    <a href="home.php">
                        <i class='bx bx-movie'></i>
                        <span class="links_name">Movies</span>
                    </a>
                    <span class="tooltip">Movies</span>
                </li>
                <li class="series-button">
                    <a href="#">
                        <i class='bx bx-tv'></i>
                        <span class="links_name">TV/Shows</span>
                    </a>
                    <span class="tooltip">TV/Shows</span>
                </li>
                <li class="favorite-button">
                    <a href="#">
                        <i class='bx bx-heart'></i>
                        <span class="links_name">My List</span>
                    </a>
                    <span class="tooltip">My List</span>
                </li>
                <li class="soon-button">
                    <a href="#">
                        <i class='bx bxs-calendar-event'></i>
                        <span class="links_name">Coming Soon</span>
                    </a>
                    <span class="tooltip">Coming Soon</span>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-cog'></i>
                        <span class="links_name">Account Settings</span>
                    </a>
                    <span class="tooltip">Account Settings</span>
                </li>
                <li class="profile logoutBtn">
                    
                    <div class="profile-details">
                        <div class="name_job">
                            <div class="name">Log out</div>
                        </div>
                    </div>
                    <i class='bx bx-log-out log_out'></i>
                    
                </li>
            </ul>
        </div>
        <nav>
            <div>
                <p><i class="brand fas fa-play-circle"></i></p>
            </div>
            <ul class="nav-menu">
                <li><a class="nav-link" href="home.php">Movies</a></li>
                <li class="series-button"><a class="nav-link" href="#">TV/Shows</a></li>
                <li class="list-button"><a class="nav-link" href="#">My List</a></li>
                <li class="soon-button"><a class="nav-link" href="#">Coming Soon</a></li>
                <li><a class="nav-link" href="account.php">Account Settings</a></li>
                <li><span class="nav-link log_out logoutBtn" >Logout</span></li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
        <section class="home-section">
            <div class="tabs">
                <input type="radio" id="tab1" name="tab-control" checked>
                <input type="radio" id="tab2" name="tab-control">
                <ul>
                    <li title="Account Details">
                        <label for="tab1" role="button">
                            <i class='bx bxs-user'></i>
                            <br><span>Account Details</span>
                        </label>
                    </li>
                    <li title="Security">
                        <label for="tab2" role="button">
                            <i class='bx bxs-lock'></i>
                            <br><span>Security</span>
                        </label>
                    </li>
                </ul>
                <div class="slider">
                    <div class="indicator"></div>
                </div>
                <div class="content">
                    <section>
                        <div class="account-details">
                            <form id="avatar-update" method="post" enctype="multipart/form-data" class="account-avatar">
                                <img id="avatar" src="<?php echo 'assets/images/user_avatar/'.$account['avatar'] ?: "assets/images/user_avatar/default.png" ?>" alt="Avatar">
                                <input type="file" name="avatarInput" accept="image/*" id="fileInput" onchange="imageChanged(this)" hidden />
                                <div class="avatar-buttons">
                                    <button id="changeAvatarBtn" onclick="openSystemDialog()"> Change Avatar </button>
                                    <input id="submit-avatar" type="submit" value="Save Avatar">
                                </div>
                                
                            </form>
                            <div class="account-information"> 
                                <span class="input-labels"> First Name </span>
                                <input type="text" id="first-name" class="input-boxes account" name="firstname" value="<?php echo $account['firstName'] ?>" disabled>
                                <span class="input-labels"> Last Name </span>
                                <input type="text" id="last-name" class="input-boxes account" name="lastname" value="<?php echo $account['lastName'] ?>" disabled>
                                <span class="input-labels"> Username </span>
                                <input type="text" id="user-name" class="input-boxes account" name="username" value="<?php echo $account['userName'] ?>" disabled>
                                <span class="input-labels"> Current Password </span>
                                <input id="ad-password" type="password" class="input-boxes account" name="currentpassword" disabled>
                                <div id="errorMsgDiv">
                                    <p id="errorMsg"></p>
                                </div>
                                <div class="edit-button-container"> 
                                    <button type="button" id="editBtn">EDIT ✏️ </button>
                                    <button id="save-account-details" disabled> <strong> SAVE CHANGES </strong> </button>
                                </div>
                                
                            </div>
                        </div>
                    </section>
                    <section>
                        <div class="account-security-container">
                            <h1>Change Password</h1>
                            <span class="input-labels"> Current Password </span>
                            <input type="password" id="old-password" class="input-boxes password" name="currentpassword" disabled>
                            <span class="input-labels"> New Password </span>
                            <input type="password" id="new-password" class="input-boxes password" name="newpassword" disabled>
                            <span class="input-labels"> Confirm Password </span>
                            <input type="password" id="confirm-password" class="input-boxes password" name="confirmpassword" disabled>
                            <div id="errorMsgDiv">
                                <p id="errorMsg2"></p>
                            </div>
                            <div class="edit-button-container">
                                <button type="button" id="editBtn2">EDIT ✏️ </button>
                                <button id="save-password" disabled> <strong> SAVE CHANGES </strong> </button>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div id="update-notif"></div>

        </section>

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="script/sidebar.js"></script>
        <script src="script/account.js"></script>
        <script src="script/navbar.js"></script>
        
</body>

</html>