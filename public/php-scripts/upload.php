<?php
// Include the database configuration file
   include ('initialize-db.php');
   @session_start();
   $uid = (int) $_SESSION['id'];

   $file = $_FILES['avatarInput']['name'];
   $path = '../assets/images/user_avatar/'.basename($file);
   $output = "";
   
   $query = "UPDATE user SET avatar = '$file' where id = $uid";
   $cmd = mysqli_query($conn,$query);

   if ($cmd) {
      move_uploaded_file($_FILES['avatarInput']['tmp_name'], $path);
      $output = "Submitted Successfully";
   } else {
      $output = $cmd;
   }

   echo'
      <div id="toast-id">
            <div class="toast">
            <div class="toast-container">
               <div class="toast-content">
               <div class="toast-icon">
                  <i class="fas fa-exclamation"></i>
               </div>
               <p class="toast-message">Avatar has been updated.</p>
               </div>
               <div class="toast-dismiss">
               <i class="fas fa-times"></i>
               </div>
            </div>
            <div id="toast-progress"></div>
            </div>
      </div>
      <script src="script/toast.js"></script>
   ';
?>